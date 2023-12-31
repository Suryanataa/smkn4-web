<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KonsentrasiKeahlian extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'konsentrasi_keahlian';

    protected $primaryKey = 'id';

    protected $fillable = ['slug', 'nama', 'deskripsi', 'icon', 'gambar', 'id_program'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function program()
    {
        return $this->belongsTo(ProgramKeahlian::class, 'id_program');
    }

    public function galeri()
    {
        return $this->hasMany(Galeri::class, 'id_konsentrasi');
    }
}
