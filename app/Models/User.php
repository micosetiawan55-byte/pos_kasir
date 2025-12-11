<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}

// cara memasukan data kasir kalau pakai mysql di terminal 

// 1. php artisan tinker

// 2. \App\Models\User::create([
//     'name' => 'Admin',
//     'email' => 'admin@example.com',
//     'password' => bcrypt('admin123'),
// ]);
