<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compte extends Model
{
    protected $fillable=[
        'name',
        'login',
        'password',
        'Role'
    ];
    use HasFactory;
}
