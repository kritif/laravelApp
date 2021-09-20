<?php

declare(strict_types=1);

namespace App\Model;

use App\Model\Scope\LastWeekScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $table = 'games'; //podajemy jeśli nazwa tabeli była by inna niż klasy modelu
    protected $primaryKey = 'id'; // ustawiamy nazwe klucz głównego, domyślnie id
    protected $attributes = []; //wartości domyślne dla pól modelu, czyli dla kolumn bazy danych
    protected $fillable = [
        'title', 'description', 'score', 'genre_id', 'publi_id'
    ];

    protected static function booted()
    {
        //static::addGlobalScope(new LastWeekScope);
        //ogranicza cały model do warunków określonych w zdefiniowanym globalscope
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class, 'publi_id');
    }

    //scope

    public function scopeBest(Builder $query): Builder
    {
        return $query
            ->with('genre')
            ->where('score', '>', 95)
            ->orderBy('score', 'desc');
    }

    public function scopeGenre(Builder $query, int $genreId): Builder
    {
        return $query
            ->where('genre_id', $genreId);
    }
}
