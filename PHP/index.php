<?php

    //  Variable use
    $animals = ["le loup", "le tigre", "le singe"];
    $animalsRandom = $animals[rand(0,2)];
    $elements = ["le feu", "le vent", "la terre"];
    $elementsRandom = $elements[rand(0,2)];

    // Test random
    // var_dump($animalsRandom);
    // var_dump($elementsRandom);
    
    //  Function Write Secret Sentence
    function writeSecretSentence(string $PARAMETRE_1, $PARAMETRE_2) : string {
        // var_dump($PARAMETRE_1, $PARAMETRE_2);
        $soluce = "{$PARAMETRE_1} s'incline face à {$PARAMETRE_2}." . "<br>";
        // var_dump($soluce);
        return $soluce;
    }

    //  Echo of Write Secret Sentence
    echo writeSecretSentence($animalsRandom, $elementsRandom);
?>