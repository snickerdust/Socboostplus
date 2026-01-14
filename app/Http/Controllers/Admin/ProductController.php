<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\FirebaseService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $firebase;

    public function __construct(FirebaseService $firebaseService)
    {
        $this->firebase = $firebaseService->getDatabase();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'platform' => 'required|string',
            'category' => 'required|string',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        // Access: products/{platform}/{category}
        // Use push() if we want auto-ids, but current structure uses array index (0, 1, 2).
        // To append to a numeric array in Firebase is tricky. 
        // We will fetch current array count or just use push() if logic supports it.
        // The current ProductService expects array indexes. 
        // Let's verify structure: products -> instagram -> followers -> [0: {price...}, 1: {price...}]
        
        $path = "products/{$validated['platform']}/{$validated['category']}";
        $current = $this->firebase->getReference($path)->getValue();
        
        $index = $current ? count($current) : 0;
        
        $this->firebase->getReference("$path/$index")->set([
            'quantity' => $validated['quantity'],
            'price' => $validated['price']
        ]);

        return back()->with('success', 'Product added successfully');
    }

    public function update(Request $request, $id)
    {
        // ID format: platform-category-index
        $parts = explode('-', $id);
        if (count($parts) !== 3) abort(404);
        [$platform, $category, $index] = $parts;

        $validated = $request->validate([
            'price' => 'required|numeric',
            'quantity' => 'required|integer'
        ]);

        $this->firebase->getReference("products/$platform/$category/$index")->update([
            'price' => (float)$validated['price'],
            'quantity' => (int)$validated['quantity']
        ]);

        return back()->with('success', 'Product updated');
    }

    public function destroy($id)
    {
        $parts = explode('-', $id);
        if (count($parts) !== 3) abort(404);
        [$platform, $category, $index] = $parts;

        $this->firebase->getReference("products/$platform/$category/$index")->remove();

        // Note: Removing from array in Firebase leaves a null hole. 
        // Real app would need to re-index. MVP: we accept the hole or re-save array.
        // Re-saving is safer for the array-based frontend logic.
        
        $list = $this->firebase->getReference("products/$platform/$category")->getValue();
        if ($list) {
            $list = array_values($list); // Re-index
            $this->firebase->getReference("products/$platform/$category")->set($list);
        }

        return back()->with('success', 'Product deleted');
    }
}
