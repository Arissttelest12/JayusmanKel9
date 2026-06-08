<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StokBarang extends Model
{
    use \App\Traits\HasAuditTrail;
    protected $table = 'stok_barang';
    protected $primaryKey = 'id_stok';
    protected $fillable = ['id_cabang', 'id_barang', 'jumlah_stok'];

    public function cabang()
    {
        return $this->belongsTo(Cabang::class, 'id_cabang', 'id_cabang');
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang', 'id_barang');
    }
}
