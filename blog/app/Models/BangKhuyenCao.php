<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BangKhuyenCao extends Model
{
    use HasFactory;

    protected $table = 'bang_khuyen_cao';
    protected $primaryKey = ['idkhuyencao', 'idcanbo'];
    public $incrementing = false;
    protected $fillable = ['idkhuyencao', 'noidung', 'thoigian', 'idcanbo'];
}
