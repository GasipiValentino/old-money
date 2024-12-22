<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class FavoritesController extends Controller
{
    public function viewFavorites()
    {
        if (!auth()->check()) {
            return to_route('auth.login.form')
                ->with('feedback.message', 'Debes iniciar sesión para ver tus favoritos.')
                ->with('feedback.color', 'red');
        }

        $user = auth()->user();
        $favorites = $user->favorites()->with('product')->get();

        return view('favorites.index', ['favorites' => $favorites]);
    }

    public function addToFavorites(Request $request, $productId)
    {
        $user = auth()->user();
        $product = Product::findOrFail($productId);

        if (!$product) {
            return response()->json(['error' => 'Producto no encontrado'], 404);
        }

        $user->favorites()->syncWithoutDetaching([$product->id]);

        return to_route('products.index')
            ->with('feedback.message', 'El producto fue agregado a tus favoritos.')
            ->with('feedback.color', 'green');
    }

    public function removeFromFavorites(Request $request, $productId)
    {
        $user = auth()->user();

        $user->favorites()->detach($productId);

        return back()
            ->with('feedback.message', 'El producto fue eliminado de tus favoritos.')
            ->with('feedback.color', 'blue');
    }
}
