<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'email',
        'password',
        'firstname',
        'lastname',
        'cpf',
        'rg',
        'birth_date',
        'phone',
        'cellphone'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function address() {
        return $this->hasOne(UserAddress::class);
    }
}
