<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Users extends Eloquent
{
    protected $table = 'users_tbl';
    protected $primaryKey = 'id_users';
    protected $fillable = [
        'id_users',
        'username',
        'password',
        'first_name',
        'last_name',
        'address',
        'number',
        'status',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
