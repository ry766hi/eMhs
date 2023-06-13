<?php
//MENGAKSES DATA MAHASISWA
namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';
    protected $primaryKey = 'nim';
    protected $fillable = [
        'nim',
        'nama',
        'gender',
        'prodi',
        'minat'
    ];
}