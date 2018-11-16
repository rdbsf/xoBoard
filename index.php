<?php

require_once 'TicTacToeBoard.php';

// Start Game

$game = new TicTacToeBoard();

try{

    $validMove = true;

    while(!$game->isBoardFull())
    {

        $game->printBoard();

        while($line = readline("You are \"".TicTacToeBoard::PLAYER_SYMBOL_USER."\" Enter move (ex: 0,1): "))
        {

            if ($game->makeMoveUser('user', $line))
            {
                break;
            }
            else
            {
                echo "Not a valid move\n";
            }
        }

        $game->makeMoveCpu();

    }

}
catch (Exception $e)
{
    echo $e->getMessage();
}

