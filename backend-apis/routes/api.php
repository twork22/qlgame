<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\User;
use App\Models\GameSession;
use App\Models\WordSet;
use App\Models\ReportedSet;
use App\Http\Controllers\ReportListController;
use App\Http\Controllers\WordSetController;
use Carbon\Carbon;
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

Route::prefix('admin')->group(function() {
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

        return response()->json($wordSets);
    });

    Route::resource('reported-list', ReportListController::class)->only(['index', 'update']);

    Route::get('/metrics', function (Request $request) {
        $response = [
            'new_player' => 0,
            'avg_play_time' => 0,
            'pending_reports' => 0,
            'total_wordset' => 0,
            'wordset_created_today' => 0,
        ];

        $response['new_player'] = User::whereDate('created_at', Carbon::today())->count();
        $response['avg_play_time'] = GameSession::avg('play_duration');
        $response['pending_reports'] = ReportedSet::where('report_status', 0)->count();
        $response['total_wordset'] = WordSet::count();
        $response['wordset_created_today'] = WordSet::whereDate('created_at', Carbon::today())->count();

        return response()->json($response);
    });

    Route::resource('wordset', WordSetController::class)->only(['show']);
});