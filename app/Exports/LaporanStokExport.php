<?php

namespace App\Exports;

use App\Models\StokBarang;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class LaporanStokExport
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
        $query = StokBarang::with('barang')->select('id_stok','id_cabang','id_barang','jumlah_stok');
        if (Auth::user()->hasRole(['manager','Manager'])) {
            $query->where('id_cabang', Auth::user()->id_cabang);
        }
        return $query->get()->map(function($s){
            return [
                'id_stok' => $s->id_stok,
                'id_cabang' => $s->id_cabang,
                'kode_barang' => $s->barang?->kode_barang,
                'nama_barang' => $s->barang?->nama_barang,
                'jumlah_stok' => $s->jumlah_stok,
            ];
        });
    }

    public function headings(): array
    {
        return ['ID Stok','ID Cabang','Kode Barang','Nama Barang','Jumlah Stok'];
    }
}
