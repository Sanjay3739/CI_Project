<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MissionDocument extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $primaryKey = 'mission_document_id';
    protected $dates = ['deleted_at'];
    
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
