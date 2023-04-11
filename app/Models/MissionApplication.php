<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MissionApplication extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'mission_applications';
    protected $primaryKey = 'mission_application_id';
    protected $fillable = [
        'user_id',
        'mission_id',
        'applied_at',
        'approval_status'
    ];

    public function mission() {
        return $this->hasOne(Mission::class, 'mission_id' ,'mission_id');
    }

    public function user() {
        return $this->hasOne(user::class, 'user_id' , 'user_id');
    }
}
