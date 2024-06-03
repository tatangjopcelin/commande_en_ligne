<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\hasMany;


class Table extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable=[
        'numero',
        'nbr_place',
    ];
    public function commande():hasMany{
        return $this->hasMany(Commande::class);
    }
}
