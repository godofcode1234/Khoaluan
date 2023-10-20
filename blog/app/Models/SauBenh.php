<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SauBenh extends Model
{
    use HasFactory;

    protected $table = 'sau_benh';
    protected $primaryKey = ['idsaubenh', 'idvungtrong'];
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'idsaubenh',
        'idvungtrong',
        'tensaubenh',
        'mucdogayhai',
        'thoigianphathien',
        'hinhanh',
        'mota',
        'phuongphap',
    ];
}
