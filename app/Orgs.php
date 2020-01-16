<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Orgs extends Model
{
    public $timestamps = false;

    public function users()
    {
        return $this->belongsToMany(User::class, 'orgs_user', 'orgUuid', 'userUuid', 'uuid', 'uuid');
    }
}
