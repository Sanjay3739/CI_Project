<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mission;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Skill;

class MissionSkill extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $primaryKey = 'mission_skill_id';
    protected $fillable = [
        'mission_id',
        'skill_id',

    ];

    public function mission() {
        return $this->hasOne(Mission::class, 'mission_id ' ,'mission_id');
    }

    public function skill(){
        return $this->hasOne(Skill::class, 'skill_id' ,'skill_id');
    }
}
