<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

$url = DB::select("SELECT * FROM url");

foreach($url as $egyUrl){
    Route::get('/'.$egyUrl->url, function(){
        return view($egyUrl->tipus;
    });
}
Route::get('/', function () {
        return view('welcome');
});

Route::get("/teszt", function(){
    return view('teszt');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
