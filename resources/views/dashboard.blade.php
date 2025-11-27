<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard — BébéConfort</title>
    <link rel="stylesheet" href="{{ asset('css/style_index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/king.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
    body { margin: 0; padding: 0; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; }
    .dashboard-container { display: flex; min-height: 100vh; }
    
    /* SIDEBAR - Fixée à gauche */
    .dashboard-sidebar {
        width: 280px;
        background: #f5f5f5;
        padding: 24px 0;
        position: fixed;
        left: 0;
        top: 0;
        height: 100vh;
        overflow-y: auto;
        box-shadow: 2px 0 8px rgba(0,0,0,.06);
        z-index: 100;
    }
    .dashboard-sidebar nav { padding: 0 12px; }
    .sidebar-link {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 14px 16px;
        color: #333;
        border-radius: 8px;
        text-decoration: none;
        margin-bottom: 8px;
        font-size: 14px;
        font-weight: 500;
        transition: all 0.2s;
    }
    .sidebar-link:hover { background: #ffefe5; color: #51200b; }
    .sidebar-link.active { background: #2268ff; color: #fff; }
    .sidebar-link i { width: 18px; text-align: center; font-size: 16px; }

    /* MAIN WRAPPER - Décalé de la largeur de la sidebar */
    .dashboard-main-wrapper {
        margin-left: 280px;
        width: calc(100% - 280px);
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    /* TOP NAV */
    .top-nav { 
        padding: 16px 32px;
        border-bottom: 1px solid #eee;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: #fff;
        position: sticky;
        top: 0;
        z-index: 50;
    }
    .top-nav .logo { 
        font-weight: 700;
        font-size: 20px;
        color: #51200b;
        text-decoration: none;
        letter-spacing: 0.5px;
    }
    .top-nav-right { 
        display: flex;
        align-items: center;
        gap: 24px;
    }
    .small-muted { 
        color: #777;
        font-size: 14px;
        white-space: nowrap;
    }
    .btn-logout {
        background: none;
        border: none;
        color: #777;
        cursor: pointer;
        font-size: 18px;
        padding: 8px;
        transition: color 0.2s;
    }
    .btn-logout:hover {
        color: #2268ff;
    }

    /* MAIN CONTENT */
    .dashboard-main {
        flex: 1;
        padding: 32px;
        background: #fafafa;
        overflow-x: hidden;
    }
    .dashboard-main h2 { 
        margin: 0 0 32px 0;
        color: #222;
        font-size: 32px;
        font-weight: 700;
    }

    /* STATS CARDS - Fix du problème de texte coupé */
    .card-row { 
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 20px;
        margin-bottom: 32px;
    }
    .stat-card {
        background: #fff;
        padding: 24px;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0,0,0,.06);
        min-height: 120px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
    .stat-card h3 { 
        margin: 0 0 8px 0;
        color: #666;
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.8px;
    }
    .stat-card p { 
        margin: 8px 0;
        font-size: 32px;
        color: #2268ff;
        font-weight: 700;
        line-height: 1.2;
        white-space: nowrap;
        overflow: visible;
    }
    .stat-card-label { 
        margin: 8px 0 0;
        font-size: 13px;
        color: #999;
        line-height: 1.4;
    }

    /* SECTION */
    .section {
        background: #fff;
        padding: 24px;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0,0,0,.06);
        margin-bottom: 24px;
    }
    .section h3 { 
        margin: 0 0 24px 0;
        color: #222;
        font-size: 18px;
        font-weight: 700;
    }

    /* CHARTS WRAPPER */
    .charts-wrapper { 
        display: grid;
        grid-template-columns: 1fr 340px;
        gap: 24px;
        margin-bottom: 24px;
    }
    .chart-container { 
        background: #fff;
        padding: 24px;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0,0,0,.06);
    }
    .chart-container h3 { 
        margin: 0 0 24px 0;
        color: #222;
        font-size: 18px;
        font-weight: 700;
    }
    .chart-empty { 
        height: 260px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #999;
        font-size: 14px;
    }

    /* PERFORMANCE BOX */
    .perf-box { 
        background: #fff;
        padding: 24px;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0,0,0,.06);
    }
    .perf-box h3 { 
        margin: 0 0 20px 0;
        color: #222;
        font-size: 18px;
        font-weight: 700;
    }
    .perf-item { 
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 14px 0;
        border-bottom: 1px solid #f0f0f0;
        font-size: 14px;
    }
    .perf-item:last-child { border-bottom: none; }
    .perf-label { 
        color: #666;
        font-weight: 500;
    }
    .perf-value { 
        color: #2268ff;
        font-weight: 700;
        font-size: 16px;
    }

    /* TABLE */
    table.dashboard-table { 
        width: 100%;
        border-collapse: collapse;
    }
    table.dashboard-table th, 
    table.dashboard-table td { 
        padding: 16px;
        border-bottom: 1px solid #f0f0f0;
        text-align: left;
        font-size: 14px;
    }
    table.dashboard-table th { 
        background: #fafafa;
        font-weight: 600;
        color: #555;
        white-space: nowrap;
    }
    table.dashboard-table td { 
        color: #333;
    }
    table.dashboard-table tr:hover { 
        background: #fafafa;
    }

    /* RESPONSIVE */
    @media (max-width: 1400px) {
        .charts-wrapper { 
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 1200px) {
        .dashboard-sidebar { width: 240px; }
        .dashboard-main-wrapper { 
            margin-left: 240px;
            width: calc(100% - 240px);
        }
        .dashboard-main { padding: 24px; }
        .card-row { 
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 16px;
        }
        .stat-card p { font-size: 28px; }
    }

    @media (max-width: 768px) {
        .dashboard-sidebar { 
            width: 100%;
            height: auto;
            position: relative;
            box-shadow: none;
            border-bottom: 1px solid #eee;
        }
        .dashboard-main-wrapper { 
            margin-left: 0;
            width: 100%;
        }
        .dashboard-main { 
            padding: 16px;
        }
        .dashboard-main h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .card-row { 
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }
        .stat-card {
            padding: 16px;
            min-height: 100px;
        }
        .stat-card p { 
            font-size: 24px;
        }
        .top-nav {
            padding: 12px 16px;
        }
        .top-nav .logo {
            font-size: 16px;
        }
        .small-muted {
            font-size: 12px;
        }
    }

    @media (max-width: 480px) {
        .card-row { 
            grid-template-columns: 1fr;
        }
    }
</style>
</head>
<body>

<div class="dashboard-container">
    <!-- SIDEBAR -->
    <aside class="dashboard-sidebar">
        <nav>
            <a href="{{ route('dashboard') }}" class="sidebar-link active">
                <i class="fa fa-tachometer-alt"></i>
                <span>Tableau de bord</span>
            </a>
            <a href="{{ route('produits.index') }}" class="sidebar-link">
                <i class="fa fa-box"></i>
                <span>Produits</span>
            </a>
            <a href="{{ url('commandes') }}" class="sidebar-link">
                <i class="fa fa-shopping-basket"></i>
                <span>Commandes</span>
            </a>
            <a href="{{ url('utilisateurs') }}" class="sidebar-link">
                <i class="fa fa-users"></i>
                <span>Clients</span>
            </a>
            <a href="{{ url('rapports') }}" class="sidebar-link">
                <i class="fa fa-chart-line"></i>
                <span>Rapports</span>
            </a>
        </nav>
    </aside>

    <!-- MAIN CONTENT -->
    <div class="dashboard-main-wrapper">
        <header class="top-nav">
            <div class="logo">BÉBÉCONFORT</div>
            <div class="top-nav-right">
                <div class="small-muted">Bonjour, <strong>{{ auth()->user()->name ?? 'Admin' }}</strong></div>
                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                    @csrf
                       <style>
.btn-logout {
    background: none;
    border: none;
    color: #222;
    cursor: pointer;
}

.btn-logout:hover {
    color: #2268ff;
}
</style>

<button type="submit" class="btn-logout">
    <i class="fa fa-sign-out-alt"></i>
</button>

                </form>
            </div>
        </header>

        <main class="dashboard-main">
            <h2>Tableau de bord</h2>

            <!-- STATS CARDS -->
            <div class="card-row">
                <div class="stat-card">
                    <h3>Utilisateurs</h3>
                    <p>{{ number_format($usersCount ?? 0) }}</p>
                    <div class="stat-card-label">Total inscrit</div>
                </div>
                <div class="stat-card">
                    <h3>Commandes</h3>
                    <p>{{ number_format($ordersCount ?? 0) }}</p>
                    <div class="stat-card-label">Commandes totales</div>
                </div>
                <div class="stat-card">
                    <h3>Revenu</h3>
                    <p>{{ number_format($revenue ?? 0, 2, ',', ' ') }} €</p>
                    <div class="stat-card-label">CA estimé</div>
                </div>
                <div class="stat-card">
                    <h3>Produits</h3>
                    <p>{{ number_format($productsCount ?? 0) }}</p>
                    <div class="stat-card-label">Articles en catalogue</div>
                </div>
            </div>

            <!-- CHARTS & PERFORMANCE -->
            <div class="charts-wrapper">
                <div class="chart-container">
                    <h3>Ventes (30 jours)</h3>
                    @if(isset($recentOrders) && $recentOrders->count() > 0)
                        <canvas id="salesChart" style="max-height: 260px;"></canvas>
                    @else
                        <div class="chart-empty">
                            <div style="text-align: center;">
                                <div style="font-size: 48px; margin-bottom: 12px;"><i class="fa fa-chart-line" style="color: #ddd;"></i></div>
                                Aucune vente
                            </div>
                        </div>
                    @endif
                </div>
                <div class="perf-box">
                    <h3>Performance</h3>
                    <div class="perf-item">
                        <span class="perf-label">Taux de conversion</span>
                        <span class="perf-value">2.4%</span>
                    </div>
                    <div class="perf-item">
                        <span class="perf-label">Panier moyen</span>
                        <span class="perf-value">45,60 €</span>
                    </div>
                    <div class="perf-item">
                        <span class="perf-label">Visites aujourd'hui</span>
                        <span class="perf-value">1 244</span>
                    </div>
                </div>
            </div>

            <!-- RECENT ORDERS -->
            <div class="section">
                <h3>Commandes récentes</h3>
                @if(isset($recentOrders) && $recentOrders->count() > 0)
                    <div style="overflow:auto">
                        <table class="dashboard-table">
                            <thead>
                                <tr>
                                    <th>Commande</th>
                                    <th>Client</th>
                                    <th>Montant</th>
                                    <th>Statut</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentOrders as $order)
                                    <tr>
                                        <td><strong>#{{ $order->id }}</strong></td>
                                        <td>{{ $order->customer_name ?? $order->user->name ?? '—' }}</td>
                                        <td>{{ number_format($order->total ?? 0, 2, ',', ' ') }} €</td>
                                        <td>{{ ucfirst($order->status ?? '—') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y H:i') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="small-muted" style="text-align: center; padding: 40px; font-size: 14px;">Aucune commande récente</p>
                @endif
            </div>
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script>
    const ctx = document.getElementById('salesChart');
    if(ctx){
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: Array.from({length:30},(_,i)=>i+1),
                datasets: [{
                    label: 'Ventes',
                    data: Array.from({length:30},()=>Math.floor(Math.random()*200)+20),
                    borderColor: '#2268ff',
                    backgroundColor: 'rgba(34,104,255,0.1)',
                    tension: 0.3,
                    fill: true,
                    pointRadius: 3,
                    pointBackgroundColor: '#2268ff'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    x: { grid: { display: false } },
                    y: { beginAtZero: true }
                }
            }
        });
    }
</script>

</body>
</html>