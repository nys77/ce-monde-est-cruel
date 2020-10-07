<?php

namespace Hackathon\PlayerIA;

use Hackathon\Game\Result;

/**
 * Class ScipioPlayers
 * @package Hackathon\PlayerIA
 * @author NYS Nicolas
 */
class ScipioPlayer extends Player
{
    protected $mySide;
    protected $opponentSide;
    protected $result;

    protected $lastChoice;

    public function getChoice()
    {
        if ($this->result->getLastChoiceFor($this->mySide) == 0) {
            if ($this->result->getLastScoreFor($this->mySide) == 0) {
                $lastChoice = "rock";
                return parent::rockChoice();
            }
        }
        $stat = $this->result->getStatsFor($this->opponentSide);
        if ($this->result->getStatsFor($this->mySide) < 20) {
            if ($this->result->getLastChoiceFor($this->opponentSide) == "scissors") {
                $lastChoice = "rock";
                return parent::rockChoice();
            }
            if ($this->result->getLastChoiceFor($this->opponentSide) == "paper") {
                $lastChoice = "scissors";
                return parent::scissorsChoice();
            }
            if ($this->result->getLastChoiceFor($this->opponentSide) == "rock") {
                $lastChoice = "paper";
                return parent::paperChoice();
            }
        } else {
            
        }

        

        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Choice           ?    $this->result->getLastChoiceFor($this->mySide) -- if 0 (first round)
        // How to get the opponent Last Choice ?    $this->result->getLastChoiceFor($this->opponentSide) -- if 0 (first round)
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Score            ?    $this->result->getLastScoreFor($this->mySide) -- if 0 (first round)
        // How to get the opponent Last Score  ?    $this->result->getLastScoreFor($this->opponentSide) -- if 0 (first round)
        // -------------------------------------    -----------------------------------------------------
        // How to get all the Choices          ?    $this->result->getChoicesFor($this->mySide)
        // How to get the opponent Last Choice ?    $this->result->getChoicesFor($this->opponentSide)
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Score            ?    $this->result->getLastScoreFor($this->mySide)
        // How to get the opponent Last Score  ?    $this->result->getLastScoreFor($this->opponentSide)
        // -------------------------------------    -----------------------------------------------------
        // How to get the stats                ?    $this->result->getStats()
        // How to get the stats for me         ?    $this->result->getStatsFor($this->mySide)
        //          array('name' => value, 'score' => value, 'friend' => value, 'foe' => value
        // How to get the stats for the oppo   ?    $this->result->getStatsFor($this->opponentSide)
        //          array('name' => value, 'score' => value, 'friend' => value, 'foe' => value
        // -------------------------------------    -----------------------------------------------------
        // How to get the number of round      ?    $this->result->getNbRound()
        // -------------------------------------    -----------------------------------------------------
        // How can i display the result of each round ? $this->prettyDisplay()
        // -------------------------------------    -----------------------------------------------------
        $lastChoice = "rock";
        return parent::rockChoice();
    }
};
