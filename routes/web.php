<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    // $users = User::all('name');                                     
    // $users = User::where('name' ,'Erin Macejkovic')->get();          
    // $users = User::select('name' , 'email')->get();                 
    // $users = User::find([1,2 ,3] , ['name', 'email']);
    // $users = User::findOr(1, function () {
    //     return 'User not found';
    // });                                                                          
    // $users = User::findOrFail(100);                               
    // $users = User::first();                                   
    // $users = User::firstOrFail();                                  
    // $users = User::pluck('email' , 'name')->toArray();            
    // $users = User::where('name', 'Pat McCullough DVM')->value('email');
    // $users = User::whereIn('wallet' , [100, 410, 713])->get(); 
    // $users = User::whereNull('email_verified_at')->get(); 
    // $users = User::firstWhere('name','Test User');
    // $users = User::whereName('Test User')->get();
    // $users = User::whereAny( ['name' , 'email'] ,'LIKE' , '%Test%')->get();
    $users = User::whereAll( ['name' , 'email'] ,'LIKE' , '%Test%')->get();
    dump($users);
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
