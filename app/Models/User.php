<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $username = 'username';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    public const USER_ROLES = [
        'root'      => [ 'id' => 0, 'display' => 'Moderator'],
        'admin'     => [ 'id' => 1, 'display' => 'Administrator'],
        'registrar' => [ 'id' => 3, 'display' => 'Registrar'],
        'faculty'   => [ 'id' => 4, 'display' => 'Faculty'],
        'student'   => [ 'id' => 5, 'display' => 'Student'],
    ];
    public function get_user_role ($roles) 
    {
        $rollls = [];
        if (is_array($roles)) {
            foreach ($roles as $r) 
            {
                if (array_key_exists($r, $this::USER_ROLES)) 
                {
                    if ($this->role == $this::USER_ROLES[$r]['id'])
                    {
                        return true;
                    }
                }
            }
        }
        else 
        {
            if (array_key_exists($roles, $this::USER_ROLES)) 
            {
                if ($this->role == $this::USER_ROLES[$roles]['id'])
                {
                    return true;
                }
            }
        }
        return false;
    }
    public function get_user_data ()
    {
        $UserInformation = NULL;
        if ($this->role == 0 || $this->role == 1)
        {
            $UserInformation = \App\AdminInformation::where('user_id', $this->id)->first();
        }
        else if ($this->role == 3)
        {
            $UserInformation = \App\RegistrarInformation::where('user_id', $this->id)->first();
        }
        else if ($this->role == 4)
        {
            $UserInformation = \App\FacultyInformation::where('user_id', $this->id)->first();
        }
        else if ($this->role == 5)
        {
            $UserInformation = \App\StudentInformation::where('user_id', $this->id)->first();
        }
        return $UserInformation;
    }
    public function get_user_role_display ()
    {
        $role_name = '';
        foreach ($this::USER_ROLES as $data)
        {
            if ($this->role == $data['id']) 
            {
                $role_name = $data['display'];
                break;
            }
        }
        return $role_name;
    }
}
