<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';
    protected $primaryKey = 'id_barang';
    protected $fillable = ['id_kategori', 'kode_barang', 'nama_barang', 'harga_beli', 'harga_jual', 'satuan'];
    protected $casts = [
        'harga_beli' => 'decimal:2',
        'harga_jual' => 'decimal:2',
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriBarang::class, 'id_kategori', 'id_kategori');
    }

    public function stokBarang()
    {
        return $this->hasMany(StokBarang::class, 'id_barang');
    }

    public function detailTransaksi()
    {
        return $this->hasMany(DetailTransaksi::class, 'id_barang');
    }

    public function stokMasuk()
    {
        return $this->hasMany(StokMasuk::class, 'id_barang');
    }

    public function stokKeluar()
    {
        return $this->hasMany(StokKeluar::class, 'id_barang');
    }
}
