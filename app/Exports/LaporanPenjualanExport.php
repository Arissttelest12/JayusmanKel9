<?php

namespace App\Exports;

use App\Models\Transaksi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\Auth;

class LaporanPenjualanExport implements FromCollection, WithHeadings
{
    protected $from;
    protected $to;

    public function __construct($from = null, $to = null)
    {
        $this->from = $from;
        $this->to = $to;
    }

    public function collection()
    {
        $query = Transaksi::with(['cabang','kasir'])->select('id_transaksi','id_cabang','id_kasir','tanggal_transaksi','total_harga');
        if (Auth::user()->hasRole(['manager','Manager'])) {
            $query->where('id_cabang', Auth::user()->id_cabang);
        }
        if ($this->from) $query->whereDate('tanggal_transaksi', '>=', $this->from);
        if ($this->to) $query->whereDate('tanggal_transaksi', '<=', $this->to);
        return $query->get()->map(function($t){
            return [
                'ID' => $t->id_transaksi,
                'Cabang' => $t->cabang?->nama_cabang ?? '-',
                'Kasir' => $t->kasir?->name ?? '-',
                'Tanggal' => $t->tanggal_transaksi,
                'Total' => $t->total_harga,
            ];
        });
    }

    public function headings(): array
    {
        return ['ID','Cabang','Kasir','Tanggal','Total Harga'];
    }
}
