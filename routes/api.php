<?php
use App\Http\Controllers\TodoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// Route::get('/todos', function(){
//     // return 'todos';
//     return Todo::all();
// });


// Route::get('/todos', [TodoController::class, 'index']);
// Route::post('/todos', [TodoController::class, 'store']);
Route::resource('todos', TodoController::class);
// Route::get('todos/{todo}', [TodoControlller::class, 'show']);





// Route::post('todos', function() {
//     return Todo::create([
//         'name' => 'Example Todo',
//         'description' => 'This is an example Todo',
//         'due_date' => '04/04/2022',
//         'is_complete' => 'false'
//     ]);
// });

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
