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

        $factory = $factory->withDatabaseUri(env('FIREBASE_DATABASE_<b>URL</b>', 'https://socboost-721eb-default-rtdb.asia-southeast1.firebasedatabase.app/'));

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