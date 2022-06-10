<?php

namespace App\Providers;

use Google\Cloud\Firestore\FirestoreClient;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(FirestoreClient::class, function ($app) {
            $projectId = env('FIREBASE_PROJECT_ID');

            if ($projectId) {
                return new FirestoreClient([
                    'projectId' => $projectId
                ]);
            }

            return new FirestoreClient();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
