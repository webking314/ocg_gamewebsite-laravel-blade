<?php

namespace Models\Gaming;

use Illuminate\Database\Eloquent\Model;
use Models\Auth\BelongsToAUser;

class GameUserWinning extends Model
{
    use BelongsToAUser;
    use BelongsToAGame;

    protected $table = 'game_user_winnings';
    protected $guarded = ['id'];
}
