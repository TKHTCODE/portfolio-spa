<?php

use App\Http\Controllers\ContactController;
use App\Mail\ContactMessage;
use App\Models\Skill;
use App\Models\Project;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'skills' => Skill::all(),
        'projects' => Project::all(),
    ]);
});

Route::post('contact', [ContactController::class, 'contact'])
    ->name('contact');

// Route::get('/test', function(){
//     return new ContactMessage('test@test.com', 'Just testing...');
// });

