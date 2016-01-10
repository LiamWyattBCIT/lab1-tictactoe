<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//if no board is set, assume a new game is beginning (blank board)
if (!isset($_GET['board'])) {
    $position = '---------';
} else {
    $position = $_GET['board'];
}
    $game = new Game($position);
    $game->display();
    if ($game->winner('x')) {
        echo 'I win. Muahahah';
        echo '</br></br>';
        echo '<a href="/lab1-tictactoe/?board=---------">New Game</a>';
    }
    else if ($game->winner('o')) {
        echo 'You win. Lucky guesses!';
        echo '</br></br>';
        echo '<a href="/lab1-tictactoe/?board=---------">New Game</a>';
    }
    else {
        echo 'No winner yet, but you are losing.';
        if (!isset($_GET['move'])) {
            $game->pick_move();
            }
        }

    

class Game {
    var $position;
    
    function __construct($squares) {
        $this->position = str_split($squares);
    }
    
    function display() {
        echo "Welcome to the ultimate TicTacToe Experience. </br></br>";
        
        echo '<table cols="3" style="font-size:large; font-weight:bold">';
        echo '<tr>'; //opens the first row of the table
        for ($pos=0; $pos<9; $pos++) {
            echo '<td>';
            echo $this->show_cell($pos);
            echo '</td>';
            if ($pos %3 == 2) echo '</tr><tr>'; //new row after 3 cells
        }
            echo '</tr>';
            echo '</table>';
        
    }
    
    function show_cell($cell) {
        $token = $this->position[$cell];
        //easy case
        if ($token <> '-') return $token;
        //hard case
        $this->newposition = $this->position; //copy of original
        $this->newposition[$cell] = 'o'; //their move
        $move = implode($this->newposition); //make string from array
        $link = '/lab1-tictactoe/?board='.$move;
        return '<a href="'.$link.'">-</a>';

    }
    
    function pick_move() {
        for ($pos=0; $pos < 9; $pos++) {
            $token = $this->position[$pos];
            if ($token == '-') {
                $this->newposition = $this->position;
                $this->newposition[$pos] = 'x';
                $aimove = implode($this->newposition);
                $link = '/lab1-tictactoe/?move=true&board='.$aimove;
                header('Location: '.$link);
            }
        }
    }
    
    function winner ($token) {
    $result = false;
    for ($row=0; $row<3; $row++) {
            if (($this->position[3*$row] == $token) && ($this->position[3*$row+1] == $token)
                        && ($this->position[3*$row+2] == $token)) $result = true;
    }
    for ($col=0; $col<3; $col++) {
            if (($this->position[$col] == $token) && ($this->position[$col+3] == $token)
                        && ($this->position[$col+6] == $token)) $result = true;
    }
    if (($this->position[0] == $token) &&
        ($this->position[4] == $token) &&
        ($this->position[8] == $token)) {
    $result = true;
    }else if (($this->position[2] == $token) &&
        ($this->position[4] == $token) &&
        ($this->position[6] == $token)) {
    $result = true;
    }
    return $result;
    
    }
    }





