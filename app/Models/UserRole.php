<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    const Roles = [
        ['id' => 1, 'department_name' => 'Admin'],
        ['id' => 2, 'department_name' => 'Moderator'],
        ['id' => 3, 'department_name' => 'Registrar'],
        ['id' => 4, 'department_name' => 'Faculty'],
        ['id' => 5, 'department_name' => 'Student'],
    ];
}
