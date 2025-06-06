<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WordSet;
// use App\Models\Vocabulary;

class WordSetController extends Controller
{
    public function show(Request $request) {
        $wordsetId = $request->route('wordset');
        
        $wordsetDetail = Wordset::with('vocabularies')->findOrFail($wordsetId);
        return response()->json($wordsetDetail);
    }
}
