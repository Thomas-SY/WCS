<?PHP
    //  Variable use
    $weapons = ["fists", "whip", "gun"];
    $opponentWeapon = $weapons[rand(0,2)];

    // Test random
    // var_dump($opponentWeapon);
    
    // Contition weapons
    if ($opponentWeapon === $weapons[0]) {
        $indyWeapon = $weapons[3];
    } elseif ($opponentWeapon === $weapons[1]) {
        $indyWeapon = $weapons[0];
    } else {
        $indyWeapon = $weapons[1];
    }

    echo $indyWeapon . " bat " . $opponentWeapon . "\n" ;
?>
