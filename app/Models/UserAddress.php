<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    use HasFactory;

    protected $table = 'users_address';

    protected $fillable = [
        'zipcode',
        'address',
        'number',
        'complement',
        'district',
        'city',
        'state',
        'user_id',
    ];
}
