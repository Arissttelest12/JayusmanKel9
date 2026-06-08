<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StokKeluar extends Model
{
    use \App\Traits\HasAuditTrail;
    protected $table = 'stok_keluar';
    protected $primaryKey = 'id_stok_keluar';
    protected $fillable = ['id_cabang', 'id_barang', 'id_user', 'jumlah', 'tanggal_keluar', 'alasan'];
    protected $casts = [
        'tanggal_keluar' => 'date',
    ];

    public function cabang()
    {
        return $this->belongsTo(Cabang::class, 'id_cabang', 'id_cabang');
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang', 'id_barang');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
