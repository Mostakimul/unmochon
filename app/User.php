<?php

namespace App;

use App\Mail\WelcomeMail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'country', 'job', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    protected static function boot()
    {
        parent::boot();

        static::created(function ($user) {
//            $user->profile()->create([
//                'title' => $user->username,
//            ]);
            if($user->hasVerifiedEmail())
            Mail::to($user->email)->send(new WelcomeMail());
        });
    }


    public function profile()
    {
    return $this->hasOne(Profile::class);
    }
    public function posts()
    {
    return $this->hasMany(post::class, 'user_id');
    }
    public function editprofile()
    {
        return $this->hasOne(EditProfile::class);
    }

}
