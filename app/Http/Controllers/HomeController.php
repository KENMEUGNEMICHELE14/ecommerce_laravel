<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // produits en vedette / derniers produits — adapte la query selon tes besoins
        $featured = Produit::where('stock', '>', 0)->orderBy('created_at', 'desc')->take(6)->get();
        $latest   = Produit::orderBy('created_at', 'desc')->take(8)->get();

        return view('home', compact('featured', 'latest'));
    }
}
