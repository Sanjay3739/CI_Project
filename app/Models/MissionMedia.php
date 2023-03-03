<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MissionMedia extends Model
{
    use HasFactory;
    protected $primaryKey = 'mission_media_id';
    protected $fillable = [
        'media_name',
        'mission_id',
        'media_type',
        'media_path',
        'default',
        ];
    

    public function mission() {
        return $this->belongsTo(Mission::class,'mission_id');
    }
}
