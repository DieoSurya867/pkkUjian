<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'kategoris';
    protected $guarded = ['id'];

    public function artikel()
    {
        return $this->hasMany(Artikel::class);
    }
    public function barang()
    {
        return $this->hasMany(Barang::class);
    }
}
