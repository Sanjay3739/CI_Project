<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoryMedia extends Model
{
    use HasFactory;
    protected $table = 'story_media';
    protected $primaryKey = 'story_media_id';
    protected $fillable = [
        'story_id',
        'type',
        'path',
    ];

    public function getImagePath()
    {
        return asset('storage/' . $this->image);
    }
}
