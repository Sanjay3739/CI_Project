<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mission;
use App\Models\Skill;

class MissionSkill extends Model
{
    use HasFactory;
    protected $primaryKey = 'mission_skill_id';
    protected $fillable = [
        'mission_id',
        'skill_id',

    ];

    public function mission() {
        return $this->belongsToMany(Mission::class, 'mission_id ' ,'mission_id');
    }

    public function skill(){
        return $this->hasOne(Skill::class, 'skill_id' ,'skill_id');
    }
}
