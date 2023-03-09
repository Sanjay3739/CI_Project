<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Mission_skill extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table='mission_skill';
    protected $primaryKey = 'mission_skill_id';
    protected $fillable = [
        'mission_id',
        'skill_id',
    ];
}












// <?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class MissionSkill extends Model
// {
//     use HasFactory;
//     protected $primaryKey = 'mission_skill_id';

//     public function mission()
//     {
//         return $this->hasMany(Mission::class, 'mission_id');
//     }

//     public function skill()
//     {
//         return $this->hasOne(Skill::class, 'skill_id');
//     }
// }
