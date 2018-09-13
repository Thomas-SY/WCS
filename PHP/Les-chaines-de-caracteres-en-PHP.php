<?php

    //  Variable use
    $messageOne = "0@sn9sirppa@#?ia'jgtvryko1"; // Variable String
    $messageTwo = "q8e?wsellecif@#?sel@#?setuotpazdsy0*b9+mw@x1vj"; // Variable String
    $messageThree = "aopi?sgnirts@#?sedhtg+p9l!"; // Variable String
    
    function giveDecoding(string $message) : string {
        // var_dump($message);
        $indiceOne = strlen($message)/2;
        // var_dump("1: " .$indiceOne);
        $indiceTwo = substr($message, 5, $indiceOne);
        // var_dump("2: " .$indiceTwo);
        $indiceThree = str_replace("@#?", " ", $indiceTwo);
        // var_dump("3: " . $indiceThree);

        $soluce = strrev($indiceThree);
        // var_dump($soluce);
        return $soluce;
    }

echo giveDecoding($messageOne) . " " . giveDecoding($messageTwo) . " " . giveDecoding($messageThree);

?>