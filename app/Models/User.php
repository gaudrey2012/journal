<?php

namespace App\Models;

use App\Models\Actualites;
use App\Models\Categories;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const USER_ROLE = 'USER';
    const ADMIN_ROLE = 'ADMIN';

    public function categorie()
    {
        return $this->hasMany(Categories::class);
    }
    public function actualites()
    {
        return $this->hasMany(Actualites::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'role',
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

    public function dateFormatted(){
        return date_format($this->created_at, 'd-M-y');
    }

    public function isSuperAdmin()
    {
        return $this->role ==='ADMIN';
    }
}
