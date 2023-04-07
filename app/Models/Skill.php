<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\UserSkill;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Skill extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $primaryKey = 'skill_id';

    protected $fillable = [
        'skill_name',
        'status',
    ];

    public function mission() : BelongsToMany{
        return $this->belongsToMany(Mission::class,'mission_skills','skill_id','mission_id');
    }

    public function userSkill() {
        return $this->hasMany(UserSkill::class,'skill_id', 'skill_id');
    }
}
