<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    // $users = User::all('name');                                      // this will return all users with only name
    // $users = User::where('name' ,'Erin Macejkovic')->get();          // this will return all users with the name Erin Macejkovic
    // $users = User::select('name' , 'email')->get();                 // this will return all users with only name and email
    // $users = User::find([1,2 ,3] , ['name', 'email']);
    // $users = User::findOr(1, function () {
    //     return 'User not found';
    // });                                                             // This will return a string if the user is not found             
    // $users = User::findOrFail(100);                                 // This will throw an exception if the user is not found
    // $users = User::first();                                    // This will throw an exception if no user is found
    // $users = User::firstOrFail();                                 // This will throw an exception if no user is found    
    // $users = User::pluck('email' , 'name')->toArray();             // This will return an array of users with name as key and email as value
    // $users = User::where('name', 'Pat McCullough DVM')->value('email'); // This will return the email of the user with the name Erin Macejkovic
    // dd($users);
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
