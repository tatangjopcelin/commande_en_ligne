<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\belongsTo;


class Commande extends Model
{
    use HasFactory, SoftDeletes;

    protected $table='commandes';
    protected $fillable=[
        'produit_id',
        'utilisateur_id',
        'table_id',
        'date_commande',
    ];
    public function utilisateur():belongsTo{
        return $this->belongsTo(Utilisateur::class);
    }
    public function produit():belongsTo{
        return $this->belongsTo(Produit::class);
    }
    public function table():belongsTo{
        return $this->belongsTo(Table::class);
    }



}
