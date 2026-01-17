<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\FirebaseService;

class ImportProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'products:import-json';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import products from JSON file to Firebase';

    protected $firebaseService;

    public function __construct(FirebaseService $firebaseService)
    {
        parent::__construct();
        $this->firebaseService = $firebaseService;
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $jsonPath = database_path('seeders/data/products.json');

        if (!file_exists($jsonPath)) {
            $this->error("File not found: {$jsonPath}");
            return;
        }

        $jsonContent = file_get_contents($jsonPath);
        $data = json_decode($jsonContent, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            $this->error("Invalid JSON: " . json_last_error_msg());
            return;
        }

        $this->info("Importing data to Firebase...");
        
        $database = $this->firebaseService->getDatabase();
        
        // We will replace the entire 'products' node
        try {
            $database->getReference('products')->set($data);
            $this->info("Successfully imported products to Firebase!");
        } catch (\Exception $e) {
            $this->error("Firebase Error: " . $e->getMessage());
        }
    }
}
