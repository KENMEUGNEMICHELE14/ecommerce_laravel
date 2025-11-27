<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        // Récupère tous les produits publiés paginés
        $produits = Produit::where('published', true)
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        // Meilleures ventes (6 produits publiés)
        $featured = Produit::where('published', true)
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->get()
            ->map(function($p) {
                $p->primary_image = !empty($p->images) && is_array($p->images) && count($p->images) > 0 
                    ? Storage::url($p->images[0]) 
                    : asset('images/placeholder.png');
                return $p;
            });

        // Nouveautés (8 produits publiés)
        $latest = Produit::where('published', true)
            ->orderBy('created_at', 'desc')
            ->limit(8)
            ->get()
            ->map(function($p) {
                $p->primary_image = !empty($p->images) && is_array($p->images) && count($p->images) > 0 
                    ? Storage::url($p->images[0]) 
                    : asset('images/placeholder.png');
                return $p;
            });

        return view('home', compact('produits', 'featured', 'latest'));
    }
}
