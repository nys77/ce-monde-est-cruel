<?php

namespace Hackathon\PlayerIA;

use Hackathon\Game\Result;

/**
 * Class ScipioPlayers
 * @package Hackathon\PlayerIA
 * @author NYS Nicolas
 * J'ai voulu pendant les 20 premier round jouer la meme chose que jouer mon adversaire avant
 * Apres je fais des stats en comptent le nombre de ciseaux, pierre, papier jouer par mon adversaire et je joue l'opposer
 */
class ScipioPlayer extends Player
{
    protected $mySide;
    protected $opponentSide;
    protected $result;

    protected $lastChoice;
    protected $score;

    protected $nbCissor;
    protected $nbPaper;
    protected $nbRock;
    protected $nbRound;

    public function getPaperOposite(){
        if ($this->result->getLastChoiceFor($this->opponentSide) == "paper") {
                $this->nbPaper++;
        }
    }

    public function getRockOposite(){
        if ($this->result->getLastChoiceFor($this->opponentSide) == "rock") {
            $this->nbRock++;
        }             
    }

    public function getCissorOposite(){
        if ($this->result->getLastChoiceFor($this->opponentSide) == "scissors") {
                $this->nbCissor++;
        }
    }

    public function getChoice()
    {
        $this->score = $this->score + $this->result->getLastScoreFor($this->mySide);
        $this->getCissorOposite();
        $this->getRockOposite();
        $this->getPaperOposite();
        $this->nbRound += 1;
        if ($this->result->getNbRound() == 0) {
            $this->nbRock= 0;
            $this->nbPaper= 0;
            $this->nbCissor = 0;
            $this->nbRound = 0;
        }
        if ($this->score < 100 || $this->nbRound < 20) {
            if ($this->result->getLastChoiceFor($this->opponentSide) == "scissors") {
                    $this->lastChoice = "rock";
                    return parent::rockChoice();
            }
            if ($this->result->getLastChoiceFor($this->opponentSide) == "paper") {
                    $this->getRockOpositelastChoice = "scissors";
                    return parent::scissorsChoice();
            }
            if ($this->result->getLastChoiceFor($this->opponentSide) == "rock") {
                    $this->lastChoice = "paper";
                    return parent::paperChoice();
            }
        }
        else {
            if ($this->nbCissor > $this->nbRock && $this->nbCissor > $this->nbPaper) {
                    $this->lastChoice = "rock";
                    return parent::rockChoice();
            }
            if ($this->nbRock> $this->nbCissor && $this->nbRock > $this->nbPaper) {
                    $this->lastChoice = "paper";
                    return parent::paperChoice();
            }
            if ($this->nbPaper > $this->nbCissor && $this->nbPaper > $this->nbRock) {
                    $this->lastChoice = "cissor";
                    return parent::scissorsChoice();
            }
            else {
                    $this->lastChoice = "paper";
                    return parent::paperChoice();
            }
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
