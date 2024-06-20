<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisJaminanModel extends Model
{
    use HasFactory;
    protected $table = 'tb_jenis_jaminan';
    protected $primaryKey = 'id_jaminan';
    protected $fillable = ['nama_jaminan'];
}
