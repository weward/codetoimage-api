<?php

namespace App\Providers;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Response;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Response::macro('jsonApi', function($data = null, $errMsg = 'Failed!', $httpStatus = 500) {
            if ($data && $data instanceof JsonResource) {
                return $data;
            }
                
            return ($data) 
                ? response()->json($data, 200)
                : response()->json($errMsg, $httpStatus);
        });
    }
}
