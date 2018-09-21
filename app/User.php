<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //protected $appends = ['avatar'];


    public function getAvatarAttribute(){
        return 'https://www.gravatar.com/avatar/'. md5($this->email). '?s=4&d=mm';
    }


    public function avatar(){


        return 'https://www.gravatar.com/avatar/'. md5($this->email). '?s=4&d=mm';

    }


}
