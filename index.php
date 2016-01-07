<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */




if (isset($_GET['board'])) {
    
    $position = $_GET['board'];
    $squares = str_split($position);
    
    if (winner('x', $squares)) echo 'You win.';
    else if (winner('o', $squares)) echo 'I win';
    else echo 'No winner yet';
} else {
    echo 'No board found';
}

class Game {
    var $position;
    
    function __construct($squares) {
        $this->position = str_split($squares);
    }
    function winner ($token, $position) {
    $result = false;
    for ($row=0; $row<3; $row++) {
            if (($position[3*$row] == $token) && ($position[3*$row+1] == $token)
                        && ($position[3*$row+2] == $token)) $result = true;
    }
    for ($col=0; $col<3; $col++) {
            if (($position[$col] == $token) && ($position[$col+3] == $token)
                        && ($position[$col+6] == $token)) $result = true;
    }
    if (($position[0] == $token) &&
        ($position[4] == $token) &&
        ($position[8] == $token)) {
    $result = true;
    }else if (($position[6] == $token) &&
        ($position[4] == $token) &&
        ($position[6] == $token)) {
    $result = true;
    }
    return $result;
    
    }
    }





