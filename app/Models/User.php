<?php

namespace App\Models;

use App\Mail\NewUserWelcomeEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Profile;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Mail;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'user_name',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($user){
            $user->profile()->create([
                'user_id'=>$user->id,
                'title'=>$user->user_name,
                ]);

                // Mail::to($user->email)->send(new NewUserWelcomeEmail());

        });
    }
    public function posts ()
    {

        return $this->hasMany(Post::class)->orderBy('created_at','DESC');
    }

    public function following(){

        return $this->belongsToMany(Profile::class);


    }

    public function profile(){

        return $this->hasOne(Profile::class);
    }

}
