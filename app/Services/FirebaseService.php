<?php

namespace App\Services;

use Kreait\Firebase\Factory;
use Kreait\Firebase\Database;
use Kreait\Firebase\Messaging;

class FirebaseService
{
    protected Database $database;
    protected Messaging $messaging;

    public function __construct()
    {
        $factory = (new Factory);

        // Check for JSON credentials in ENV (Railway/Production)
        if (env('FIREBASE_CREDENTIALS')) {
            $factory = $factory->withServiceAccount(json_decode(env('FIREBASE_CREDENTIALS'), true));
        } else {
            // Fallback to local file (Development)
            $factory = $factory->withServiceAccount(storage_path('app/firebase/firebase_credentials.json'));
        }

        // Sanitize URL (remove quotes if present)
        $dbUrl = trim(env('FIREBASE_DATABASE_URL', 'https://socboost-721eb-default-rtdb.asia-southeast1.firebasedatabase.app/'), '"\'');
        
        $factory = $factory->withDatabaseUri($dbUrl);

        // Fix for Connection/SSL issues
        // We use supported timeout methods (HttpClientOptions in this version doesn't support generic Guzzle config)
        $options = \Kreait\Firebase\Http\HttpClientOptions::default()
            ->withConnectTimeout(10)
            ->withTimeout(30); // Total timeout

        $factory = $factory->withHttpClientOptions($options);

        $this->database = $factory->createDatabase();
        $this->messaging = $factory->createMessaging();
    }

    public function getDatabase(): Database
    {
        return $this->database;
    }

    public function getMessaging(): Messaging
    {
        return $this->messaging;
    }
}