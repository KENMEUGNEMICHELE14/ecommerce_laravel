<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\User;
use App\Models\Produit;

class DashboardController extends Controller
{
    public function index()
    {
        // Compteurs simples
        $usersCount = User::count();
        $ordersCount = Commande::count();
        $revenue = Commande::sum('montant_total') ?? 0;
        $productsCount = Produit::where('published', true)->count();
        
        // Commandes récentes
        $recentOrders = Commande::with('user')->latest()->take(7)->get();

        // Ventes par jour (30 derniers jours) - utilise montant_total
        $salesRows = Commande::where('created_at', '>=', now()->subDays(29))
            ->selectRaw("DATE(created_at) as date, COALESCE(SUM(montant_total),0) as total")
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->pluck('total', 'date')
            ->toArray();

        $labels = [];
        $salesData = [];
        for ($i = 29; $i >= 0; $i--) {
            $d = now()->subDays($i);
            $key = $d->format('Y-m-d');
            $labels[] = $d->format('d/m');
            $salesData[] = isset($salesRows[$key]) ? (float)$salesRows[$key] : 0;
        }

        return view('dashboard', compact(
            'usersCount', 'ordersCount', 'revenue', 'productsCount', 'recentOrders',
            'labels', 'salesData'
        ));
    }

    public function settings()
    {
        return redirect()->route('dashboard');
    }
}



