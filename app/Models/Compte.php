<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Compte extends Model
{
    protected $fillable=[
        'name',
        'numero',
        'adresse',
        'Role',
        'email',
        'password'

    ];
    use HasFactory, SoftDeletes;
}
