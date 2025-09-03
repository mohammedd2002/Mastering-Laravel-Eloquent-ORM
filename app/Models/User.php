<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Observers\UserObserver;
use Illuminate\Support\Facades\Log;
use Database\Factories\AdminFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Foundation\Auth\User as Authenticatable;

#[ObservedBy([UserObserver::class])]
class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, SoftDeletes;
    //  HasUlids;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     * 
     * 
     */

    protected $table = 'users';
    public $timestamps = true;

    protected $guarded = [];

    // protected $attributes = [
    //     'is_admin' => 1,
    // ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // protected static function newFactory()
    // {
    //     return AdminFactory::new();
    // }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    // public function phone(){
    //     return $this->hasOne(Phone::class);
    // }

    // public function serial(){
    //     return $this->hasOneThrough(Serial::class, Phone::class);
    // }

    public function comments()
    {
        return $this->hasManyThrough(Comment::class, Post::class);
    }

    // protected static function booted(): void
    // {

    //     static::creating(function (User $user) {
    //         Log::info('Creating a new user: ' . $user->name);
    //     });

    //     static::created(function (User $user) {
    //         Log::info('Created a new user: ' . $user->name);
    //     });
    // }
}
