<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
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
        'orgUuid',
        'name',
        'icon'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'project_User', 'projectUuid', 'userUuid', 'uuid', 'uuid');
    }

    public function org()
    {
        return $this->belongsTo(Org::class, 'orgUuid', 'uuid');
    }

    /**
     * Get the task columns (categories such as 'TODO' etc.) for this project
     * 
     */
    public function columns()
    {
        return $this->hasMany(Column::class, 'projectUuid', 'uuid');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class, 'projectUuid', 'uuid');
    }

}
