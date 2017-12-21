<?php

class Game
{

    public function __construct()
    {
        echo "START </br>";
    }

    public $playRounds = 3;
    public $handOptions = array(
        "rock" => "scissors",
        "paper" => "rock",
        "scissors" => "paper"
    );

    public function play()
    {
        $firstPlayer = $this->randomHands();
        $secondPlayer = $this->randomHands();
        $winner = "Second player";
        echo "first player hand is - {$firstPlayer}</br>";
        echo "second player hand is - {$secondPlayer}</br>";

        if ($firstPlayer === $secondPlayer) {
            echo "Round started again. </br>";
            return $this->play();
        }
        else {
            $temp = $this->handOptions[$firstPlayer];
            if($temp === $secondPlayer){
                $winner = "First player";
            }
        }
        echo "Round winner - $winner </br>";
        return $winner;
    }

    public function randomHands()
    {
        $randHand = rand(0, count($this->handOptions) - 1);
        $keys = array_keys($this->handOptions);
        return $keys[$randHand];
    }

    public function winner()
    {
        $playersResult = array(
            "First player" => 0,
            "Second player" => 0
        );
        $finalWinner = "";
        $count = 0;

        for ($i = 1; $i <= $this->playRounds; $i++) {
            echo"Round {$i} </br>";
            $winnerRound = $this->play();
            $playersResult[$winnerRound]++;
        }
        echo "RESULT: </br>";
        foreach ($playersResult as $key => $value){
            if ($count < $value){
                $count = $value;
                $finalWinner = $key;
            }
        }
        echo "The winner is: {$finalWinner}";
    }
}
$testGame = new Game;
$testGame->winner();
