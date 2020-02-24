<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
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
        'projectUuid',
        'assigneeUuid',
        'reporterUuid',
        'name',
        'description',
        'uiSequence'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class, 'projectUuid', 'uuid');
    }
    // user-task: one to many (mandatory to optional)
    // project-task: one to many (mandatory to optional)
    // column-task: one to many (mandatory to optional)
    // task-attachment: one to many (mandatory to optional)
    // task-comment: one to many (mandatory to optional)
}
