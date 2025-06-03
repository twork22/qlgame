<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test', function (Request $request) {
    return 'test';
});

Route::get('/leaderboard', function (Request $request) {
    $wordSets = User::select('user_id', 'fullname')
        ->withCount(['wordset as wordsets_count' => function ($query) {
            $query->has('vocabularies', '>=', 5);
        }])
        ->whereHas('wordset', function ($query) {
            $query->has('vocabularies', '>=', 5);
        })
        ->whereDoesntHave('wordset', function ($query) {
            $query->has('vocabularies', '<', 5);
        })
        ->orderByDesc('wordsets_count')
        ->get();

    $rank = 0;
    $prevCount = null;

    foreach ($wordSets as $index => $wordSet) {
        if ($wordSet->wordsets_count !== $prevCount) {
            $rank++; // only update rank when count changes
        }

        $wordSet->rank = $rank;

        $prevCount = $wordSet->wordsets_count;
    }

    return $wordSets;
});
