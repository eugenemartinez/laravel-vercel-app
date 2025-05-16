<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/db-test', function () {
    $dbStatus = ['status' => 'unknown', 'message' => ''];
    try {
        $connection = DB::connection();
        $connection->getPdo();
        $dbStatus['status'] = 'success';
        $dbStatus['message'] = 'Successfully connected to the database.';
        $dbStatus['driver'] = $connection->getDriverName();
        $dbStatus['database_name'] = $connection->getDatabaseName();
    } catch (\Exception $e) {
        Log::error('DB Connection Error from /db-test route: ' . $e->getMessage());
        $dbStatus['status'] = 'error';
        $dbStatus['message'] = 'Could not connect to the database.';
        $dbStatus['error_details'] = $e->getMessage(); // Store error for debugging
    }
    return view('db_test', compact('dbStatus'));
})->name('db-test');

Route::get('/ping', function () {
    return view('ping', ['timestamp' => now()->toDateTimeString()]);
})->name('ping');

// You can keep or remove the items resource route if you're not building that CRUD for now
// Route::resource('items', App\Http\Controllers\ItemController::class);
