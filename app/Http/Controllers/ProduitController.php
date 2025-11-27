<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Categorie;
use Illuminate\Support\Facades\Storage;

class ProduitController extends Controller
{
    public function index()
    {
        $produits = Produit::with('categorie')->orderBy('created_at','desc')->paginate(15);
        return view('produits', compact('produits'));
    }

    public function create()
    {
        $categories = Categorie::orderBy('nom')->get();
        return view('produits.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'prix' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'categorie_id' => 'nullable|exists:categories,id',
            'images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        // upload images
        $images = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('produits', 'public');
                $images[] = $path;
            }
        }
        $data['images'] = $images;
        // published default false
        $data['published'] = $request->has('published') ? (bool)$request->input('published') : false;

        Produit::create($data);

        return redirect()->route('produits.index')->with('success', 'Produit créé.');
    }

    public function edit(Produit $produit)
    {
        $categories = Categorie::orderBy('nom')->get();
        return view('produits.create', compact('produit','categories')); // reuse form view
    }

    public function update(Request $request, Produit $produit)
    {
        $data = $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'prix' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'categorie_id' => 'nullable|exists:categories,id',
            'images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'remove_images' => 'array',
            'remove_images.*' => 'string',
        ]);

        // remove selected images
        $existing = $produit->images ?? [];
        if (!empty($request->input('remove_images'))) {
            foreach ($request->input('remove_images') as $rem) {
                if (in_array($rem, $existing)) {
                    // delete from storage
                    Storage::disk('public')->delete($rem);
                    $existing = array_values(array_diff($existing, [$rem]));
                }
            }
        }

        // upload new images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $existing[] = $file->store('produits', 'public');
            }
        }

        $data['images'] = $existing;
        $data['published'] = $request->has('published') ? (bool)$request->input('published') : false;

        $produit->update($data);

        return redirect()->route('produits.index')->with('success', 'Produit mis à jour.');
    }

    public function destroy(Produit $produit)
    {
        // delete images from storage
        if ($produit->images && is_array($produit->images)) {
            foreach ($produit->images as $img) {
                Storage::disk('public')->delete($img);
            }
        }
        $produit->delete();
        return redirect()->route('produits.index')->with('success', 'Produit supprimé.');
    }

    public function publish(Request $request, Produit $produit)
    {
        $produit->published = ! (bool) $produit->published;
        $produit->save();
        return back()->with('success', $produit->published ? 'Produit publié.' : 'Publication retirée.');
    }

    public function show(Produit $produit)
    {
        $produit->primary_image = !empty($produit->images) && is_array($produit->images) && count($produit->images) > 0 
            ? Storage::url($produit->images[0]) 
            : asset('images/placeholder.png');
        
        return view('produits.show', compact('produit'));
    }
}