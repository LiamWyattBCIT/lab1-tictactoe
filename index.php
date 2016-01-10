<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$test = new Game('---------');
$test->display();


if (isset($_GET['board'])) {
    
    $position = $_GET['board'];
    $game = new Game($position);
    
    if ($game->winner('x')) echo 'You win. Lucky guesses!';
    else if ($game->winner('o')) echo 'I win. Muahahah';
    else echo 'No winner yet, but you are losing.';
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
        $this->newposition[$token] = 'o'; //their move
        $move = implode($this->newposition); //make string from array
        $link = '/?board='.$move;
        return '<a href="'.$link.'">-</a>';
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
    }else if (($this->position[6] == $token) &&
        ($this->position[4] == $token) &&
        ($this->position[6] == $token)) {
    $result = true;
    }
    return $result;
    
    }
    }





