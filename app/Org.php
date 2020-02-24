<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Org extends Model
{
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
        'ownerUuid',
        'name'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'orgs_user', 'orgUuid', 'userUuid', 'uuid', 'uuid');
    }

    public function projects()
    {
        // arg(1): owned model
        // arg(2): foreign key name on the owned model
        // arg(3): local key name on this model

        return $this->hasMany(Project::class, 'orgUuid', 'uuid');
    }
}
