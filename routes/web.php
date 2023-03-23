<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Ma3datyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminMa3datyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [Ma3datyController::class, 'addvisite']);

Route::get('/dashboard', function () {
    if (Auth::check()) {
        return view('dashboard');
    }
    return redirect('/login');

})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('posts', [PostController::class, 'index']);

require __DIR__.'/auth.php';


// =======================================================================
                                    // Users!
// Route To Get Data Of mawaied!
Route::get('show', [Ma3datyController::class, 'getMa3datyData'])->name('ajax.getMa3datyData');

Route::get('view', [Ma3datyController::class, 'view'])->name('view');
// Route To Create New mawaied Form!
Route::get('create', function()
{
    return view('create-new');
});

// Route To Insert New Mawaied By Request!
Route::post('add', [Ma3datyController::class, 'insert'])->name('addNewMa3da.insert');

// Route To Delete Row From Mawaied Table!
Route::delete('delete', [Ma3datyController::class, 'deleteRow']);

// Route To Cards
Route::get('cards', [Ma3datyController::class, 'cardsPage']);
Route::get('getcards', [Ma3datyController::class, 'getCards']);
Route::post('add-card', [Ma3datyController::class, 'addCard'])->name('newCard');

// =======================================================================
                        // Admin
Route::get('admin/admin-create', [AdminMa3datyController::class, 'create'])->name('admin-create')->middleware('auth');
Route::post('admin/admin-add', [AdminMa3datyController::class, 'insert'])->name('admin.add')->middleware('auth');

Route::get('admin/admin-edit/{id}', [AdminMa3datyController::class, 'editpage'])->name('admin.edit')->middleware('auth');
Route::put('admin/admin-update/{id}', [AdminMa3datyController::class, 'update'])->name('admin.update')->middleware('auth');

Route::get('admin/admin-delete/{id}', [AdminMa3datyController::class, 'delete'])->name('admin.delete')->middleware('auth');
Route::get('admin/admin-delAll', [AdminMa3datyController::class, 'deleteSuspended'])->name('admin.delete.suspended')->middleware('auth');

Route::get('admin/admin-accept/{id}', [AdminMa3datyController::class, 'accept'])->name('admin.accept')->middleware('auth');
Route::get('admin/admin-acceptAll', [AdminMa3datyController::class, 'acceptSuspended'])->name('admin.accept.all')->middleware('auth');

Route::get('admin/admin-holds', [AdminMa3datyController::class, 'showAdminMa3datyData'])->name('admin.holds')->middleware('auth');
Route::get('admin/holds-api', [AdminMa3datyController::class, 'hodsApi'])->name('admin.holdsApi')->middleware('auth');

Route::get('admin/admin-show', [AdminMa3datyController::class, 'showAvailable'])->name('admin.show')->middleware('auth');
Route::get('admin/admin-available-api', [AdminMa3datyController::class, 'availableApi'])->name('admin.available')->middleware('auth');

Route::get('admin/cards-holds', [AdminMa3datyController::class, 'cardsHoldPage'])->name('cards.hold');
Route::post('admin/add-card', [AdminMa3datyController::class, 'addCard'])->name('admin.add.card');
Route::get('admin/get-cards', [AdminMa3datyController::class, 'getHoldCards'])->name('admin.hold.cards');
Route::get('admin/get-available-cards', [AdminMa3datyController::class, 'getAvailableCards'])->name('admin.available.cards');
Route::get('admin/available-cards', [AdminMa3datyController::class, 'availableCardsPage'])->name('admin.ava.cards');

Route::get('admin/accept-card/{id}',[AdminMa3datyController::class, 'acceptCard'])->name('admin.accept.card');
Route::get('admin/delete-card/{id}',[AdminMa3datyController::class, 'deleteCard'])->name('admin.delete.card');
// =======================================================================
                        // Portifolio
Route::get('cv', function()
{
    return view('portfolio/cv');
});
// =======================================================================