<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\hasMany;


class Produit extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable=[
        'type_produit',
        'nom_produit',
        'prix_produit',
        'quantite_stock',
       // 'image_produit'
    ];
    public function utilisateur():belongsToMany{
        return $this->belongsToMany(Utilisateur::class, 'Commande');
    }

}
