<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class GameController extends Controller
{
    public function index(): View
    {
        $games = DB::table('games')
        ->join('genres', 'games.genre_id', '=', 'genres.id')
        ->select('games.id','games.title','games.score','genres.name as genre')
        ->get();

        $stats = [
            'count' => DB::table('games')->count(),
            'countScoreGtFive' => DB::table('games')->where('score', '>', 5)->count(),
            'max' => DB::table('games')->max('score'),
            'min' => DB::table('games')->min('score'),
            'avg' => DB::table('games')->avg('score'),
        ];

        return view('games.list', [
            'games' => $games,
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

        return view('games.show', [
            'game' => $game
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }



    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
