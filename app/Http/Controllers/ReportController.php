<?php

namespace App\Http\Controllers;

use App\Exports\LaporanPenjualanExport;
use App\Exports\LaporanStokExport;
use App\Exports\LaporanTransaksiExport;
use App\Models\Transaksi;
use App\Models\StokBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\StreamedResponse;

class ReportController extends Controller
{
    public function index()
    {
        return view('reports.index');
    }

    public function view(Request $request, $type)
    {
        $from = $request->input('from');
        $to = $request->input('to');
        $queryParams = compact('from', 'to');

        if ($type === 'penjualan') {
            $query = Transaksi::with(['detailTransaksi','cabang','kasir']);
            if (Auth::user()->hasRole(['manager','Manager'])) {
                $query->where('id_cabang', Auth::user()->id_cabang);
            }
            if ($from) $query->whereDate('tanggal_transaksi', '>=', $from);
            if ($to) $query->whereDate('tanggal_transaksi', '<=', $to);
            $data = $query->get()->map(function($t){
                return (object)[
                    'id_transaksi' => $t->id_transaksi,
                    'id_cabang' => $t->id_cabang,
                    'cabang_name' => $t->cabang?->nama_cabang ?? '-',
                    'id_kasir' => $t->id_kasir,
                    'kasir_name' => $t->kasir?->name ?? '-',
                    'tanggal_transaksi' => $t->tanggal_transaksi,
                    'total_harga' => $t->total_harga,
                ];
            });
        } elseif ($type === 'stok') {
            $query = StokBarang::with('barang');
            if (Auth::user()->hasRole(['manager','Manager'])) {
                $query->where('id_cabang', Auth::user()->id_cabang);
            }
            $data = $query->get();
        } else { // transaksi
            $query = Transaksi::with(['cabang','kasir']);
            if (Auth::user()->hasRole(['manager','Manager'])) {
                $query->where('id_cabang', Auth::user()->id_cabang);
            }
            if ($from) $query->whereDate('tanggal_transaksi', '>=', $from);
            if ($to) $query->whereDate('tanggal_transaksi', '<=', $to);
            $data = $query->get();
        }

        return view('reports.view', compact('type', 'data', 'queryParams'));
    }

    public function exportPdf(Request $request, $type)
    {
        $from = $request->input('from');
        $to = $request->input('to');

        $view = $this->viewDataForExport($type, $from, $to);
        $html = view('reports.pdf', $view)->render();
        if (class_exists('\Dompdf\Dompdf')) {
            $dompdf = new \Dompdf\Dompdf(['isHtml5ParserEnabled' => true]);
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'portrait');
            $dompdf->render();
            return response($dompdf->output(), 200, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => "attachment; filename=\"laporan_{$type}.pdf\"",
            ]);
        }
        // fallback: return rendered HTML if Dompdf not installed
        return response($html);
    }

    public function exportExcel(Request $request, $type)
    {
        $from = $request->input('from');
        $to = $request->input('to');

        // Stream CSV export (compatible without external packages)
        if ($type === 'penjualan') {
            $export = new LaporanPenjualanExport($from, $to);
            $rows = $export->collection();
            $filename = "laporan_penjualan.csv";
        } elseif ($type === 'stok') {
            $export = new LaporanStokExport($from, $to);
            $rows = $export->collection();
            $filename = "laporan_stok.csv";
        } else {
            $export = new LaporanTransaksiExport($from, $to);
            $rows = $export->collection();
            $filename = "laporan_transaksi.csv";
        }

        $callback = function() use ($rows) {
            $out = fopen('php://output', 'w');
            // write UTF-8 BOM for Excel compatibility
            fwrite($out, "\xEF\xBB\xBF");
            if ($rows->isEmpty()) {
                fputcsv($out, ['No data']);
                fclose($out);
                return;
            }
            // use first row keys as header
            $first = $rows->first();
            if (is_array($first)) {
                fputcsv($out, array_keys($first));
                foreach ($rows as $r) {
                    fputcsv($out, array_values($r));
                }
            } elseif (is_object($first)) {
                $keys = array_keys((array)$first);
                fputcsv($out, $keys);
                foreach ($rows as $r) {
                    fputcsv($out, array_values((array)$r));
                }
            } else {
                foreach ($rows as $r) {
                    fputcsv($out, [$r]);
                }
            }
            fclose($out);
        };

        return response()->stream($callback, 200, [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => "attachment; filename=\"{$filename}\"",
        ]);
    }

    protected function viewDataForExport($type, $from, $to)
    {
        $request = new Request(['from' => $from, 'to' => $to]);
        $resp = $this->view($request, $type);
        // view returns a Response with rendered view; extract data from view variables
        $data = $resp->getData();
        return ['type' => $type, 'data' => $data['data'] ?? collect(), 'queryParams' => $data['queryParams'] ?? []];
    }
}
