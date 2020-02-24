<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Column extends Model
{
    protected $primary = 'uuid';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    public function project()
    {
        return $this->belongsTo(Project::class, 'projectUuid', 'uuid');
    }
}
