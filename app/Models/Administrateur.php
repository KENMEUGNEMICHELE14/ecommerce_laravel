<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrateur extends Model
{
    use HasFactory;

    protected $fillable = ['utilisateur_id'];

    // belongsTo pour dire que la table Client possede une clé étrangere qui est dans la table Utilisateur
    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class);
    }
}