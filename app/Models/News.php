<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $table = 'news';
    public $primaryKey = 'MaTT';
    public $timestamps = false;
    protected $fillable = [
        'MaTT', 'TenTT', 'HinhAnh', 'NgayTao', 'MoTa', 'MaDM'
    ];
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
