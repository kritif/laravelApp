<?php

namespace App\Http\Controllers\Game;

use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

//QUERY BUILDER
class BuilderGameController extends Controller
{
    public function index(): View
    {
        $games = DB::table('games')
        ->join('genres', 'games.genre_id', '=', 'genres.id')
        ->select('games.id','games.title','games.score','genres.name as genre')
        //->orderBy('score', 'desc')
        //->get();
        ->paginate();

        return view('games.builder.list', ['games' => $games]);
    }

    public function dashboard(): View
    {
        $bestGames = DB::table('games')
            ->join('genres', 'games.genre_id', '=', 'genres.id')
            ->select('games.id','games.title','games.score','genres.name as genre')
            ->where('games.score', '>', 95)
            ->get();


        $stats = [
            'count' => DB::table('games')->count(),
            'countScoreGtFive' => DB::table('games')->where('score', '>', 70)->count(),
            'max' => DB::table('games')->max('score'),
            'min' => DB::table('games')->min('score'),
            'avg' => DB::table('games')->avg('score'),
        ];

        return view('games.builder.dashboard', [
            'bestGames' => $bestGames,
            'stats' => $stats
        ]);
    }

    public function show(int $gameId): View
    {
        // $game = DB::table('games')
        //     ->where('id',$gameId)
        //     ->get();zwraca tablice, bez sensu dla jednego

        $game = DB::table('games')
            ->join('genres', 'games.genre_id', '=', 'genres.id')
            ->join('publishers', 'games.publi_id', '=', 'publishers.id')
            ->select(
                'games.id',
                'games.title',
                'games.description',
                'games.published',
                'games.score',
                'genres.name as genre',
                'publishers.name as publisher'
                )
            ->where('games.id',$gameId)
            ->first();
        //dd($game);
        // $game = DB::table('games')
        // ->find($gameId); //tylko dla klucz głównego!!!

        return view('games.builder.show', [
            'game' => $game
        ]);
    }
}
