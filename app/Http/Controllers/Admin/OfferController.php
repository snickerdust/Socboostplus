<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\FirebaseService;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    protected $firebase;

    public function __construct(FirebaseService $firebaseService)
    {
        $this->firebase = $firebaseService->getDatabase();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'platform' => 'required|string',
            'original_price' => 'nullable|numeric',
        ]);

        $newOffer = [
            'id' => 'offer_' . uniqid(),
            'name' => $validated['name'],
            'price' => (float)$validated['price'],
            'platform' => strtolower($validated['platform']),
            'original_price' => $validated['original_price'] ? (float)$validated['original_price'] : null,
            'selected' => false 
        ];

        $this->firebase->getReference('offers')->push($newOffer);

        return back()->with('success', 'Offer added successfully');
    }

    public function destroy($id)
    {
        // ID in firebase might be the push key, but we stored 'id' inside the object.
        // We need to find the node with this 'id' or pass the key.
        // Simpler approach: store dictionary keyed by ID?
        // Current checkout JS expects array. 
        // Let's search and destroy for now or assume ID passed is the key if we change frontend logic.
        // For simplicity: We will pass the Firebase Key from the view.
        
        $this->firebase->getReference("offers/$id")->remove();
        return back()->with('success', 'Offer deleted');
    }
}
