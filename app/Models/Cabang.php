<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cabang extends Model
{
    protected $table = 'cabang';
    protected $primaryKey = 'id_cabang';
    protected $fillable = ['nama_cabang', 'kota', 'alamat'];

    public function users()
    {
        return $this->hasMany(User::class, 'id_cabang');
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_cabang');
    }

    public function stokBarang()
    {
        return $this->hasMany(StokBarang::class, 'id_cabang');
    }

    public function stokMasuk()
    {
        return $this->hasMany(StokMasuk::class, 'id_cabang');
    }

    public function stokKeluar()
    {
        return $this->hasMany(StokKeluar::class, 'id_cabang');
    }
}
