<?php
return [
    'name' => [
        null,
        'Slot Machine - The Fruits',
        '3D Blackjack',
        'Slot Machine - Ultimate Soccer',
        '3D Roulette',
        'Slot Machine - Mr. Chicken',
        'Jacks or Better',
        'Slot Machine - Space Adventure',
        'Scratch Fruit',
        '3 Cards Monte',
        'High or Low',
        'Wheel of Fortune',
        'Keno',
        'Slot Machine - Ramses Treasure',
        'Slot Machine - Lucky Christmas',
        'Slot Machine - Arabian Nights',
        'Bingo',
        'Baccarat',
        'Craps',
        'Caribbean Stud',
        'Pai Gow Poker',
        'Joker Poker',
        'Three Card Poker',
        'Spin and Win',
        'Plinko',
        'Roulette Royale',
        'American Roulette Royale',
        'Zodiac Space Adventure',
        'Zodiac Space Adventure Deluxe',
    ],
    'type' => [
        'Regular Game',
        'Instant Win'
    ],
    'group' => [
        'Slot',
        'Roulette',
        'Card',
        'Bingo',
        'Other'
    ],
    'setting_changed' => 'Game Settings Successfully Updated',
    'errors' => [
        \Models\Gaming\GameMathService::ERROR_CODE_CUSTOM => 'Custom error code (internal use)',
        \Models\Gaming\GameMathService::ERROR_CODE_CONNECTION_FAILED => 'There was an error while trying to connect to the server',
        \Models\Gaming\GameMathService::ERROR_CODE_INVALID_BET => 'The bet you have placed is invalid',
        \Models\Gaming\GameMathService::ERROR_CODE_INVALID_LINES => 'The amount of lines you have selected is invalid',
        \Models\Gaming\GameMathService::ERROR_CODE_INVALID_TOKEN => 'This game session is no longer valid',
        \Models\Gaming\GameMathService::ERROR_CODE_USER_NO_CREDITS => 'You do not have enough credits to play',
        \Models\Gaming\GameMathService::ERROR_CODE_GAME_NO_CREDITS => 'Game has no money (internal use)',
    ],
    'language_strings' => [
        'TEXT_MONEY' => "MONEY",
        'TEXT_PLAY' => "PLAY",
        'TEXT_BET' => "BET",
        'TEXT_COIN' => "COIN",
        'TEXT_MAX_BET' => "MAX BET",
        'TEXT_INFO' => "INFO",
        'TEXT_LINES' => "LINES",
        'TEXT_SPIN' => "SPIN",
        'TEXT_WIN' => "WIN",
        'TEXT_HELP_WILD' => "THIS SIMBOL IS A JOLLY WHICH CAN REPLACE ANY OTHER SYMBOL TO MAKE UP A COMBO",
        'TEXT_CREDITS_DEVELOPED' => "DEVELOPED BY",
        'TEXT_CURRENCY' => "$",
        'TEXT_PRELOADER_CONTINUE' => "START",

        'TEXT_SHARE_IMAGE' => "200x200.jpg",
        'TEXT_SHARE_TITLE' => "Congratulations!",
        'TEXT_SHARE_MSG1' => "You collected <strong>",
        'TEXT_SHARE_MSG2' => " points</strong>!<br><br>Share your score with your friends!",
        'TEXT_SHARE_SHARE1' => "My score is ",
        'TEXT_SHARE_SHARE2' => " points! Can you do better?",

        'TEXT_HOLD' => 'HOLD',
        'TEXT_HELP_BONUS' => '3 OR MORE MR CHICKEN LET YOU PLAY THE BONUS GAME!',
        'TEXT_CONGRATULATIONS' => 'Congratulations!',
        'TEXT_MSG_SHARING1' => 'My score is ',
        'TEXT_MSG_SHARING2' => ' points! Can you do better?',

        'TEXT_AUTOSPIN' => 'AUTO\nPLAY',
        'TEXT_OK' => 'OK',
        'TEXT_STOP_AUTO' => 'STOP\nAUTO',

        'TEXT_HELP_BONUS1' => '3 OR MORE ON ANY REELS, WILL TRIGGER WHEEL OF FORTUNE BONUS!!',
        'TEXT_HELP_BONUS2' => 'CLICK SPIN BUTTON TO GET YOUR PRIZE!!',
        'TEXT_HELP_FREESPIN' => 'GET 3 OR MORE FREESPIN SYMBOL ON ANY REEL TO TRIGGER FREESPINS',
        'TEXT_BONUS_HELP' => 'SPIN THE WHEEL!!',

        'TEXT_NO_MAX_BET' => 'NOT ENOUGH MONEY FOR MAX BET!!',
        'TEXT_CONNECTION_LOST' => 'CONNECTION DOWN! PLEASE TRY AGAIN',
        'TEXT_NOT_ENOUGH_MONEY' => 'NOT ENOUGH MONEY FOR THE CURRENT BET!',
    ]
   ];