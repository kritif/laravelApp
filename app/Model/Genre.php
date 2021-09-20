<?php

declare(strict_types=1);

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    public function games()
    {//tworzenie relacji
       // return $this->hasMany('App\Models\Game');
       return $this->hasMany(Game::class);
    }
}
