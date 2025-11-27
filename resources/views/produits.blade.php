<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Produits — BébéConfort</title>
    <link rel="stylesheet" href="{{ asset('css/style_index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/king.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body{font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;margin:0;padding:0}
        
        /* SIDEBAR */
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

        /* MAIN WRAPPER */
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
        }
        .top-nav-right { 
            display: flex;
            align-items: center;
            gap: 24px;
        }
        .small-muted { 
            color: #777;
            font-size: 14px;
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
        }
        .dashboard-main h2 { 
            margin: 0 0 24px 0;
            color: #222;
            font-size: 28px;
            font-weight: 700;
        }

        /* HEADER + ACTIONS */
        .content-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }
        .btn {
            background: #2268ff;
            color: #fff;
            padding: 10px 16px;
            border-radius: 8px;
            border: none;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            font-weight: 500;
        }
        .btn:hover { background: #1a52cc; }
        .btn-outline {
            background: #fff;
            color: #2268ff;
            border: 1px solid #2268ff;
            padding: 8px 12px;
            border-radius: 6px;
            font-size: 13px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: all 0.2s;
        }
        .btn-outline:hover { background: #f0f7ff; }
        .btn-delete {
            color: #c0392b;
            border-color: #c0392b;
        }

        /* TABLE */
        .section {
            background: #fff;
            padding: 24px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,.06);
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 14px;
            border-bottom: 1px solid #f0f0f0;
            text-align: left;
            font-size: 14px;
        }
        th {
            background: #fafafa;
            font-weight: 600;
            color: #555;
        }
        td { color: #333; }
        tr:hover { background: #fafafa; }
        
        .thumb {
            width: 48px;
            height: 48px;
            border-radius: 6px;
            object-fit: cover;
        }
        .prod-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .prod-name { font-weight: 600; }
        .prod-desc { color: #777; font-size: 12px; }

        .published-badge {
            background: #e6f5ff;
            color: #2268ff;
            padding: 6px 10px;
            border-radius: 6px;
            font-weight: 600;
            font-size: 12px;
        }
        .unpublished-badge {
            color: #999;
            font-size: 12px;
        }

        .actions-cell {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        /* MODAL */
        .modal{
            position:fixed;inset:0;display:none;align-items:center;justify-content:center;z-index:1200
        }
        .modal-backdrop{
            position:absolute;inset:0;background:rgba(0,0,0,.45)
        }
        .modal-dialog{
            position:relative;background:#fff;border-radius:10px;max-width:900px;width:100%;padding:0;box-shadow:0 8px 30px rgba(0,0,0,.2);overflow:hidden;z-index:2
        }
        .modal-header{
            display:flex;align-items:center;justify-content:space-between;padding:16px 20px;border-bottom:1px solid #f0f0f0
        }
        .modal-body{
            padding:18px 20px;max-height:65vh;overflow:auto
        }
        .modal-footer{
            padding:12px 20px;border-top:1px solid #f0f0f0;display:flex;justify-content:flex-end;gap:10px
        }
        .modal-close{
            background:transparent;border:0;font-size:22px;cursor:pointer
        }

        .field-label { font-weight: 600; margin-bottom: 6px; display: block; }
        .input {
            width: 100%;
            padding: 10px;
            border: 1px solid #eee;
            border-radius: 8px;
            font-size: 14px;
            box-sizing: border-box;
        }

        .alert { padding: 12px; border-radius: 8px; margin-bottom: 16px; }
        .alert-success { background: #e6f5e6; color: #2d6a2d; }
        .alert-error { background: #ffe6e6; color: #cc0000; }

        .pagination { margin-top: 24px; }

        @media (max-width: 1200px) {
            .dashboard-sidebar { width: 240px; }
            .dashboard-main-wrapper { margin-left: 240px; width: calc(100% - 240px); }
        }
        @media (max-width: 768px) {
            .dashboard-sidebar { width: 100%; height: auto; position: relative; }
            .dashboard-main-wrapper { margin-left: 0; width: 100%; }
            .dashboard-main { padding: 16px; }
            .actions-cell { flex-direction: column; }
            .btn-outline { display: block; width: 100%; text-align: center; }
        }
    </style>
</head>
<body>

<div style="display: flex; min-height: 100vh;">
    <!-- SIDEBAR -->
    <aside class="dashboard-sidebar">
        <nav>
            <a href="{{ route('dashboard') }}" class="sidebar-link">
                <i class="fa fa-tachometer-alt"></i>
                <span>Tableau de bord</span>
            </a>
            <a href="{{ route('produits.index') }}" class="sidebar-link active">
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
                    <button type="submit" class="btn-logout" title="Déconnexion">
                        <i class="fa fa-sign-out-alt"></i>
                    </button>
                </form>
            </div>
        </header>

        <main class="dashboard-main">
            <div class="content-header">
                <h2>Produits</h2>
                <button id="openAddProduit" class="btn">
                    <i class="fa fa-plus"></i> Ajouter un produit
                </button>
            </div>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if($errors->any())
                <div class="alert alert-error">{{ $errors->first() }}</div>
            @endif

            <div class="section">
                @if($produits->count() > 0)
                    <table>
                        <thead>
                            <tr>
                                <th>Produit</th>
                                <th>Catégorie</th>
                                <th>Prix</th>
                                <th>Stock</th>
                                <th>Statut</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($produits as $p)
                                <tr>
                                    <td>
                                        <div class="prod-info">
                                            @if(!empty($p->images) && is_array($p->images) && count($p->images) > 0)
                                                <img src="{{ Storage::url($p->images[0]) }}" alt="{{ $p->nom }}" class="thumb">
                                            @else
                                                <div class="thumb" style="background: #ddd; display: flex; align-items: center; justify-content: center;">
                                                    <i class="fa fa-image" style="color: #999; font-size: 20px;"></i>
                                                </div>
                                            @endif
                                            <div>
                                                <div class="prod-name">{{ $p->nom }}</div>
                                                <div class="prod-desc">{{ \Str::limit($p->description, 60) }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $p->categorie->nom ?? '—' }}</td>
                                    <td><strong>{{ number_format($p->prix, 2, ',', ' ') }} €</strong></td>
                                    <td>{{ $p->stock }}</td>
                                    <td>
                                        @if($p->published)
                                            <span class="published-badge"><i class="fa fa-check-circle"></i> Publié</span>
                                        @else
                                            <span class="unpublished-badge"><i class="fa fa-circle"></i> Brouillon</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="actions-cell">
                                            <a href="{{ route('produits.edit', $p) }}" class="btn-outline">
                                                <i class="fa fa-edit"></i> Modifier
                                            </a>

                                            <form action="{{ route('produits.publish', $p) }}" method="POST" style="display: inline;">
                                                @csrf
                                                <button type="submit" class="btn-outline">
                                                    <i class="fa fa-{{ $p->published ? 'eye-slash' : 'eye' }}"></i>
                                                    {{ $p->published ? 'Retirer' : 'Publier' }}
                                                </button>
                                            </form>

                                            <form action="{{ route('produits.destroy', $p) }}" method="POST" style="display: inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-outline btn-delete">
                                                    <i class="fa fa-trash"></i> Supprimer
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @if($produits->hasPages())
                        <div class="pagination" style="margin-top: 24px;">
                            {{ $produits->links() }}
                        </div>
                    @endif
                @else
                    <p style="text-align: center; padding: 40px; color: #999;">Aucun produit. <a href="#" onclick="document.getElementById('openAddProduit').click();">Créer le premier</a></p>
                @endif
            </div>
        </main>
    </div>
</div>

<!-- MODAL: Ajouter produit -->
<div id="produitModal" class="modal" aria-hidden="true">
    <div class="modal-backdrop" tabindex="-1"></div>
    <div class="modal-dialog" role="dialog" aria-modal="true" aria-labelledby="produitModalTitle">
        <div class="modal-header">
            <h3 id="produitModalTitle" style="margin:0">Ajouter un produit</h3>
            <button id="closeProduitModal" class="modal-close" aria-label="Fermer">&times;</button>
        </div>

        <form id="produitForm" action="{{ route('produits.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div style="display:grid;gap:14px">
                    <div>
                        <label class="field-label">Nom du produit</label>
                        <input type="text" name="nom" class="input" value="{{ old('nom') }}" required>
                    </div>

                    <div>
                        <label class="field-label">Description</label>
                        <textarea name="description" class="input" rows="4" placeholder="Description du produit...">{{ old('description') }}</textarea>
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px;">
                        <div>
                            <label class="field-label">Prix (€)</label>
                            <input type="number" name="prix" class="input" step="0.01" value="{{ old('prix') }}" required>
                        </div>
                        <div>
                            <label class="field-label">Stock</label>
                            <input type="number" name="stock" class="input" value="{{ old('stock', 0) }}" required>
                        </div>
                    </div>

                    <div>
                        <label class="field-label">Catégorie</label>
                        <select name="categorie_id" class="input">
                            <option value="">— Choisir une catégorie —</option>
                            @foreach($categories ?? \App\Models\Categorie::orderBy('nom')->get() as $c)
                                <option value="{{ $c->id }}">{{ $c->nom ?? $c->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="field-label">Images (plusieurs)</label>
                        <input type="file" name="images[]" class="input" multiple accept="image/*">
                        <small style="color: #777;">JPG, PNG, WebP - Max 4 MB par image</small>
                    </div>

                    <label style="display: flex; gap: 8px; align-items: center; padding: 10px; background: #f5f5f5; border-radius: 6px;">
                        <input type="checkbox" name="published" value="1" {{ old('published') ? 'checked' : '' }}>
                        <span>Publier immédiatement (afficher sur la page d'accueil)</span>
                    </label>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" id="cancelProduit" class="btn-outline">Annuler</button>
                <button type="submit" class="btn">Créer le produit</button>
            </div>
        </form>
    </div>
</div>

<script>
    const openBtn = document.getElementById('openAddProduit');
    const modal = document.getElementById('produitModal');
    const closeBtn = document.getElementById('closeProduitModal');
    const cancelBtn = document.getElementById('cancelProduit');
    const backdrop = modal.querySelector('.modal-backdrop');

    function showModal() {
        modal.style.display = 'flex';
        modal.setAttribute('aria-hidden', 'false');
        document.body.style.overflow = 'hidden';
    }
    function hideModal() {
        modal.style.display = 'none';
        modal.setAttribute('aria-hidden', 'true');
        document.body.style.overflow = 'auto';
    }

    openBtn.addEventListener('click', showModal);
    closeBtn.addEventListener('click', hideModal);
    cancelBtn.addEventListener('click', hideModal);
    backdrop.addEventListener('click', hideModal);
</script>

@if($errors->any())
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const modal = document.getElementById('produitModal');
        if(modal) modal.style.display = 'flex';
    });
</script>
@endif

</body>
</html>