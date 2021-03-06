<?php

declare(strict_types=1);

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    public function games()
    {
       return $this->hasMany(Game::class, 'publi_id');
    }
}
