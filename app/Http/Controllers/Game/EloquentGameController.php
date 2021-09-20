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
        //Dodanie nowego elementu tablicy
        // $newGame = new Game();
        // $newGame->title = "Tumb Raider";
        // $newGame->description = "Przygoda, skarby itd";
        // $newGame->score = 100;
        // $newGame->publi_id = 2;
        // $newGame->genre_id = 3;

        // $newGame->save();
        //-------lub
        // Game::create([
        //     'title' => 'Tomb Raider',
        //     'description' => 'Przygoda, skarby itd',
        //     'score' => '100',
        //     'publi_id' => '2',
        //     'genre_id' => '3'
        // ]);
        //--------lub
        //$newGame = new Game([attrybity])
        //$newGame->save()
        //------------------------------------------------------

        //Edycja rekordów----------------------
        // $game = Game::find(123);
        // $game->description = 'Opis po aktualziacji';
        // $game->save();
        //-----edycja wielu
        // Game::whereIn('id',[120,121,122,123])->update([
        //     'description' => 'Aktualziacja wielu opisów'
        // ]);
        //--------------------------------------

        //Usuwanie elementów
        // $game = Game::find(123);
        // $game->delete();
        //lub
        //Game::destroy(122);
        //Game::destroy(122,123,1234) - generuje tyle zapytań co idków, można podawać też w tablicy
        //Game::whereIn('id',[118,119])->delete() - generuje tylko jedno zapytanie
        //----------------------

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
