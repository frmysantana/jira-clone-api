<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;

class User extends Model
{
    // use Notifiable;

    
    protected $primary = 'uuid';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName', 
        'lastName',
        'email', 
        'profileImg',
        'headerImg',
        'jobTitle',
        'department',
        'organization',
        'location'
    ];
    
    public function orgs()
    {
        return $this->belongsToMany(Org::class, 'orgs_user', 'userUuid', 'orgUuid', 'uuid', 'uuid');
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_User', 'userUuid', 'projectUuid', 'uuid', 'uuid');
    }
}
