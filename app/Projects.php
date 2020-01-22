<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    protected $table = 'projects';
    public $timestamps = false;

    public function users()
    {
        return $this->belongsToMany(User::class, 'project_User', 'projectUuid', 'userUuid', 'uuid', 'uuid');
    }
}
