<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VungTrong extends Model
{
    use HasFactory;

    protected $table = 'sde.vung_trong';
    protected $primaryKey = ['iddiachinh', 'idvungtrong'];
    public $incrementing = false;
    protected $keyType = 'integer';
    public $timestamps = false;

    protected $fillable = [
        'iddiachinh',
        'idvungtrong',
        'dientichtrong',
        'giongcay',
        'tuoicay',
        'giaidoansinhtruong',
        'ngaytrong',
        'loaidat',
    ];
}
