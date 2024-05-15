<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\belongsToMany;


class Utilisateur extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'nom',
        'numero',
        'adresse',
        'role_utilisateur',
        'password',
    ];

    public function produit():belongsToMany{
        return $this->belongsToMany(Produit::class, 'Commande');
    }

}