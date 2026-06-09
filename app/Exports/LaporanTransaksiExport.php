<?php

namespace App\Exports;

use App\Models\Transaksi;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class LaporanTransaksiExport
{
    protected $from;
    protected $to;

    public function __construct($from = null, $to = null)
    {
        $this->from = $from;
        $this->to = $to;
    }

    public function collection(): Collection
    {
        $query = Transaksi::select('id_transaksi','id_cabang','id_kasir','tanggal_transaksi','total_harga');
        if (Auth::user()->hasRole(['manager','Manager'])) {
            $query->where('id_cabang', Auth::user()->id_cabang);
        }
        if ($this->from) $query->whereDate('tanggal_transaksi', '>=', $this->from);
        if ($this->to) $query->whereDate('tanggal_transaksi', '<=', $this->to);
        return $query->get();
    }

    public function headings(): array
    {
        return ['ID','Cabang','Kasir','Tanggal','Total Harga'];
    }
}
