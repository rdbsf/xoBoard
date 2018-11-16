<?php

class TicTacToeBoard {

    private $board = [];

    const PLAYER_SYMBOL_CPU = 'O';
    const PLAYER_SYMBOL_USER = 'X';
    const PLAYER_SYMBOL_BLANK = '-';
    const PLAYER_TYPE_CPU = 'cpu';
    const PLAYER_TYPE_USER = 'user';

    public function __construct()
    {
        for($x=0;$x<3; $x++)
        {
            for($y=0;$y<3; $y++)
            {
                $this->board[$x][$y] = self::PLAYER_SYMBOL_BLANK;
            }
        }
    }


    public function printBoard()
    {
        for($x=0;$x<3; $x++)
        {
            for($y=0;$y<3; $y++)
            {
                echo $this->board[$x][$y];

                if ($y !== 2)
                {
                    echo '|';
                }
                else {
                    echo "\n";
                }

            }
        }
    }

    public function isBoardFull()
    {
        for($x=0;$x<3; $x++)
        {
            $row = $this->board[$x];
            if (in_array(self::PLAYER_SYMBOL_BLANK, $row))
            {
                return false;
            }
        }

        return true;
    }


    public function makeMoveUser($userType, $line)
    {

        $line = trim($line);
        $move = explode(',', $line);

        if (!isset($move[0]) || !isset($move[1]))
        {
            return false;
        }

        $row = $move[0];
        $col = $move[1];

        if (!$this->validateCords($row, $col))
        {
            return false;
        }

        if ($this->board[$row][$col] !== self::PLAYER_SYMBOL_BLANK)
        {
            return false;
        }

        $this->board[$row][$col] = $userType == self::PLAYER_TYPE_CPU ? self::PLAYER_SYMBOL_CPU : self::PLAYER_SYMBOL_USER;
        return true;
    }


    public function makeMoveCpu()
    {
        if ($this->isBoardFull())
        {
            throw new Exception("Board is full\n");
        }

        for($x=0;$x<3; $x++)
        {
            for($y=0;$y<3; $y++)
            {
                if ($this->board[$x][$y] === self::PLAYER_SYMBOL_BLANK)
                {
                    $this->board[$x][$y] = self::PLAYER_SYMBOL_CPU;
                    return;
                }
            }
        }
    }


    private function validateCords($row, $col)
    {
        if ($row < 0 || $row > 2 || $col < 0 || $col > 2)
        {
            return false;
        }

        return true;
    }

}
