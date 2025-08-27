<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Artisan;

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
    // $users = User::whereAll( ['name' , 'email'] ,'LIKE' , '%Test%')->get();
    // $users = User::orderBy('name' , 'asc')->pluck('name')->toArray();
    // $users = User::inRandomOrder()->pluck('name')->toArray();
    // $users = User::offset(2)->take(3)->pluck('name')->toArray();  //offset() == skip() // take() == limit()
    // $users = User::with(['posts' => function($query){
    //     $query->where('likes', '<', 500);
    // }])->get();
    // $users = User::has('posts')->get();
    // $users = User::doesntHave('posts')->get();
    // $users = User::whereHas('posts', function($query) {
    //     $query->where('likes', '>', 700);
    // })->get();
    // $users = User::withCount('posts')->get();
    // $users = User::chunk(3 , function($users) {
    //    dump($users);
    // });
    // $users = User::addSelect( ['last_post_title' => Post::select('title')->
    //     whereColumn('user_id', 'users.id')
    //     ->orderBy('id', 'desc')
    //     ->limit(1)
    // ])->get();
    // $users = User::lazy();

    // soft delete
    // $users = User::find(1)->delete();
    // $users = User::onlyTrashed()->get();
    // $users = User::withTrashed()->get();
    // $users = User::onlyTrashed()->find(1)->restore();
    // $users = User::withTrashed()->forceDelete();
    // Artisan::call('model:prune');

    // $user = User::create([
    //     'name' => 'Test User',
    //     'email' => 'test@example.com',
    //     'password' => bcrypt('password'),
    //     'is_admin' => 0,
    //     'wallet' => 1000,
    // ]);
    // $user->replicate(['wallet'])->fill([
    //     'email' => 'test2@example.com',
    //     'is_admin' => 1,
    // ]);

    // dump($users);
    
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
