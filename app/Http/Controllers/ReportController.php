<?php

namespace App\Http\Controllers;

use App\Exports\LaporanPenjualanExport;
use App\Exports\LaporanStokExport;
use App\Exports\LaporanTransaksiExport;
use App\Models\Transaksi;
use App\Models\StokBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

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
            $query = Transaksi::with('detailTransaksi');
            if (Auth::user()->hasRole(['manager','Manager'])) {
                $query->where('id_cabang', Auth::user()->id_cabang);
            }
            if ($from) $query->whereDate('tanggal_transaksi', '>=', $from);
            if ($to) $query->whereDate('tanggal_transaksi', '<=', $to);
            $data = $query->get();
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
        $pdf = Pdf::loadView('reports.pdf', $view);
        return $pdf->download("laporan_{$type}.pdf");
    }

    public function exportExcel(Request $request, $type)
    {
        $from = $request->input('from');
        $to = $request->input('to');

        if ($type === 'penjualan') {
            return Excel::download(new LaporanPenjualanExport($from, $to), "laporan_penjualan.xlsx");
        } elseif ($type === 'stok') {
            return Excel::download(new LaporanStokExport($from, $to), "laporan_stok.xlsx");
        }
        return Excel::download(new LaporanTransaksiExport($from, $to), "laporan_transaksi.xlsx");
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
