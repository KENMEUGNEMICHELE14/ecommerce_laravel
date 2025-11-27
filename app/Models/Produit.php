<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Produit extends Model
{
    use HasFactory;

    protected $table = 'produits';

    protected $fillable = [
        'nom',
        'description',
        'prix',
        'stock',
        'categorie_id',
        'images',
    ];

    protected $casts = [
        'images' => 'array', // stocke plusieurs chemins d'image en JSON
        'prix' => 'decimal:2',
        'stock' => 'integer',
    ];

    // Retourne les URLs publiques des images (storage/app/public)
    public function getImageUrlsAttribute()
    {
        if (! $this->images || ! is_array($this->images)) {
            return [];
        }

        return collect($this->images)->map(function ($path) {
            // si c'est déjà une URL complète, la garder
            if (preg_match('#^https?://#i', $path)) {
                return $path;
            }
            // sinon chercher dans le disque public
            return Storage::disk('public')->exists($path) ? Storage::url($path) : asset('images/images_index/default-product.jpg');
        })->toArray();
    }

    // URL de la première image (ou image par défaut)
    public function getPrimaryImageAttribute()
    {
        return $this->image_urls[0] ?? asset('images/images_index/default-product.jpg');
    }

    // Relation vers la catégorie
    public function categorie()
    {
        return $this->belongsTo(\App\Models\Categorie::class, 'categorie_id');
    }
}
