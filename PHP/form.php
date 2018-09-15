<!DOCTYPE HTML>  
<html>
    <head>
    </head>
    <body> 
    <?php
        // function
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    
        
        // define variables and set to empty values
        $nameErr = $firstnameErr = $emailErr = $phoneErr = "";
        $name = $firstname = $email = $phone = $comment = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // name control
            if (empty($_POST["user_name"])) {
                $nameErr = "Le nom est requis";
            } else {
                $name = test_input($_POST["user_name"]);
                // check if name only contains letters and whitespace
                if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                $nameErr = "Seules les lettres et les espaces blancs sont autorisés"; 
                }
            }

            // firstname control
            if (empty($_POST["user_firstname"])) {
                $firstnameErr = "Le prénom est requis";
            } else {
                $firstname = test_input($_POST["user_firstname"]);
                // check if name only contains letters and whitespace
                if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
                $firstnameErr = "Seules les lettres et les espaces blancs sont autorisés"; 
                }
            }
        
            // e-mail control
            if (empty($_POST["user_email"])) {
                $emailErr = "Le courriel est requis";
            } else {
                $email = test_input($_POST["user_email"]);
                // check if e-mail address is well-formed
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Format d'email invalide"; 
                }
            }

            // phone control
            if (empty($_POST) && strlen($_POST["user_phone"])>10){
                $phoneErr = "10 chiffres Minimum";
            } else {
                $phone = test_input($_POST["user_phone"]);
            }

            // message control
            if (empty($_POST["user_message"])) {
                $comment = "";
            } else {
                $comment = test_input($_POST["user_message"]);
            }    
        
        }
        ?>

        <form action="form.php" method="POST">
            <div>
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="user_name" required>
                <span class="error"><?php echo $nameErr;?></span>
            </div>
            <div>
                <label for="prenom">Prénom :</label>
                <input type="text" id="prenom" name="user_firstname" required>
                <span class="error"><?php echo $firstnameErr;?></span>
            </div>
            <div>
                <label for="courriel">Courriel :</label>
                <input type="email" id="courriel" name="user_email" required>
                <span class="error"><?php echo $emailErr;?></span>
            </div>
            <div>
                <label for="tel">Téléphone:</label>
                <input type="text" id="tel" name="user_phone" pattern="[0-9]{10}">
                <span class="error"><?php echo $phoneErr;?></span>
            </div>
            <div>
                <label for="sujet">Sujet :</label>
                <select id="sujet" name="user_topic">
                    <option value="topic_1">Sujet 1</option>
                    <option value="topic_2">Sujet 2</option>
                    <option value="topic_3">Sujet 3</option>
                    <option value="topic_4">Sujet 4</option>
                </select>
            </div>
            <div>
                <label for="message">Message :</label>
                <textarea id="message" name="user_message"></textarea>
            </div>
            <div class="button">
                <button type="submit">Envoyer</button>
            </div>
        </form>

        <style>
            form {
            /* Uniquement centrer le formulaire sur la page */
                margin: 0 auto;
                width: 400px;
            /* Encadré pour voir les limites du formulaire */
                padding: 1em;
                border: 1px solid #CCC;
                border-radius: 1em;
            }

            form div + div {
                margin-top: 1em;
            }

            label {
            /* Pour êClassNametre sûrs que toutes les étiquettes ont même taille et sont correctement alignées */
                display: inline-block;
                width: 90px;
                text-align: right;
            }

            input, textarea {
            /* Pour s'assurer que tous les champs texte ont la même police.
                Par défaut, les textarea ont une police monospace */
                font: 1em sans-serif;

            /* Pour que tous les champs texte aient la même dimension */
                width: 300px;
                box-sizing: border-box;

            /* Pour harmoniser le look & feel des bordures des champs texte */
                border: 1px solid #999;
            }

            input:focus, textarea:focus {
            /* Pour souligner légèrement les éléments actifs */
                border-color: #000;
            }

            textarea {
            /* Pour aligner les champs texte multi‑ligne avec leur étiquette */
                vertical-align: top;

            /* Pour donner assez de place pour écrire du texte */
                height: 5em;
            }

            .button {
            /* Pour placer le bouton à la même position que les champs texte */
                padding-left: 90px; /* même taille que les étiquettes */
            }

            button {
            /* Cette marge supcomment représente grosso modo le même espace que celui
                entre les étiqcommentes champs texte */
                margin-left: .5em;comment
            }

            .error {
                color: #FF0000;
            }

            .returnPHP {
            /* Uniquement centrer le formulaire sur la page */
                margin: 0 auto;
                width: 400px;
            /* Encadré pour voir les limites du formulaire */
                padding: 1em;
                border: 1px solid #CCC;
                border-radius: 1em;
            }

        </style>

        <br>
        
        <div class= "returnPHP">
            <?php
                echo "<h2>Your Input PHP:</h2>";
                echo $name;
                echo "<br>";
                echo $firstname;
                echo "<br>";
                echo $email;
                echo "<br>";
                echo $phone;
                echo "<br>";
                echo $comment;
            ?>
        </div>
    </body>
</html>