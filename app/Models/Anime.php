<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anime extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'judul', 'id_jenis', 'desk', 'foto', 'penulis'];
    public $timestamp   = true;

    public function deleteImage()
    {
        if ($this->foto && file_exists(public_path('storage/anime' . $this->photo))) {
            return unlink(public_path('storage/anime' . $this->photo));
        }
    }

    public function jenis()
    {
        return $this->belongsTo(Jenis::class, 'id_jenis');
    }
}
