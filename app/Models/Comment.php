<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $primaryKey = 'comment_id';

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function mission() {
        return $this->belongsTo(Mission::class, 'mission_id');
    }
}
