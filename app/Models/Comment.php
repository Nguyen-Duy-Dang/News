<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments';
    public $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'id','comment', 'id_users','id_news'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Quan hệ với model Post
    public function post()
    {
        return $this->belongsTo(News::class);
    }
}
