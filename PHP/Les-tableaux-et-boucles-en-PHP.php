<?php

    //  Variable use
    $movieTitle = [ 
    "Raiders of the Lost Ark" => ["HARRISON FORD", "KAREN ALLEN", "PAUL FREEMAN"],
    "Indiana Jones and the Temple of Doom" => ["HARRISON FORD", "KATE CAPSHAW", "JONATHAN KE QUAN"],
    "Indiana Jones and the Last Crusade" => ["HARRISON FORD", "SEAN CONNERY", "DENHOLM ELLIOTT"] 
    ]; // Variable Array
    
    foreach($movieTitle as $cle => $valeur)
    {
        echo "Dans le film {$cle}, les principaux acteurs sont : {$valeur[0]}, {$valeur[1]}, {$valeur[2]}." . "\n";

    }
    
?>