<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;

class User extends Model
{
    // use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'firstName', 'lastName', 'email', '',
    // ];

    public $timestamps = false;

    public function orgs()
    {
        return $this->belongsToMany(Orgs::class, 'orgs_user', 'userUuid', 'orgUuid', 'uuid', 'uuid');
    }

    public function projects()
    {
        return $this->belongsToMany(Projects::class, 'project_User', 'userUuid', 'projectUuid', 'uuid', 'uuid');
    }
}
