<?php

namespace App\Services;

use Kreait\Firebase\Database;

class ProductService
{
    protected Database $database;

    public function __construct(FirebaseService $firebaseService)
    {
        $this->database = $firebaseService->getDatabase();
    }

    /**
     * Fetch all products from Firebase.
     *
     * @return array
     */
    public function getAllProducts(): array
    {
        $reference = $this->database->getReference('products');
        $snapshot = $reference->getSnapshot();

        if (!$snapshot->exists()) {
            return [];
        }

        return $snapshot->getValue();
    }

    public function getProduct(string $platform, string $category, string $quality, int $index): ?array
    {
        $products = $this->getAllProducts();
        return $products[$platform][$category][$quality][$index] ?? null;
    }
}
