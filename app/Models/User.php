<?php

namespace App\Models;

<<<<<<< HEAD
// use Illuminate\Contracts\Auth\MustVerifyEmail;
=======
use Illuminate\Contracts\Auth\MustVerifyEmail;
>>>>>>> aa3445f (projects done)
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
<<<<<<< HEAD
     * @var array<int, string>
     */
    protected $guarded = [];
=======
     * @var string[]
     */
    protected $guarded = [
        
    ];
>>>>>>> aa3445f (projects done)

    /**
     * The attributes that should be hidden for serialization.
     *
<<<<<<< HEAD
     * @var array<int, string>
=======
     * @var array
>>>>>>> aa3445f (projects done)
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
<<<<<<< HEAD
     * @var array<string, string>
=======
     * @var array
>>>>>>> aa3445f (projects done)
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
<<<<<<< HEAD
=======
    
>>>>>>> aa3445f (projects done)
}
