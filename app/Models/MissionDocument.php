<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MissionDocument extends Model
{
    use HasFactory;
    protected $primaryKey = 'mission_document_id';
    protected $fillable = [
    'document_name',
    'mission_id',
    'document_type',
    'document_path',
    ];

    public function mission() {
        return $this->belongTo(Mission::class, 'mission_id');
    }
}
