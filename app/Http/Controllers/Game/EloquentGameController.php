<?php

namespace App\Http\Controllers\Game;

use Illuminate\View\View;
use App\Model\Game;
use App\Http\Controllers\Controller;

//ELOQUENT
class EloquentGameController extends Controller
{
    public function index(): View
    {
        $games = Game::with('genre')->paginate();
        return view('games.eloquent.list', [
            'games' => $games
        ]);
    }

    public function dashboard(): View
    {
        $bestGames = Game::best()->get();

        $stats = [
            'count' => Game::count(),
            'countScoreGtFive' => Game::where('score', '>', 70)->count(),
            'max' => Game::max('score'),
            'min' => Game::min('score'),
            'avg' => Game::avg('score'),
        ];
        return view('games.eloquent.dashboard', [
            'bestGames' => $bestGames,
            'stats' => $stats
        ]);
    }

    public function show(int $gameId): View
    {

        $game = Game::find($gameId);
        //$game = Game::firstWhere('id', $gameId);
        //$game = Game::findOrFail('id', $gameId);

        return view('games.eloquent.show', [
            'game' => $game
        ]);
    }
}
