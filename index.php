<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Mon Jeu de Mémoire</title>
        <meta name="description" content="Mon petit jeu de memory pour intégrer O'Clock ;)">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- On charge des polices de sytle directement depuis le cdn google fonts -->
        <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

        <!-- petite librairie CSS très très optionnelle...-->
        <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre.min.css">
        <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre-exp.min.css">
        <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre-icons.min.css">

        <link rel="stylesheet" href="css/styles.css">

    </head>
    <body>

        <script src="js/jquery-3.4.1.min.js"></script>
        <script src="js/main.js"></script>

        <div id="mainContainer" class="container">
            <nav>
                <h1>Trouve les paires !</h1>
            </nav>

            <!-- ici notre tableau de jeu -->
            <div id="gameBoard" class="columns">
                
                <!-- L'attribut "data-cardtype" va nous permettre de retrouver de quelle carte il s'agit  -->
                <div class="card" data-cardtype="pomme">
                    <img class="front-face" src="images/card1.jpg" alt="face recto">
                    <img class="back-face" src="images/back-card.jpg" alt="face verso">
                </div>

                <div class="card" data-cardtype="banane">
                    <img class="front-face" src="images/card2.jpg" alt="face recto">
                    <img class="back-face" src="images/back-card.jpg" alt="face verso">
                </div>

                <div class="card" data-cardtype="orange">
                    <img class="front-face" src="images/card3.jpg" alt="face recto">
                    <img class="back-face" src="images/back-card.jpg" alt="face verso">
                </div>

                <div class="card" data-cardtype="citron-vert">
                    <img class="front-face" src="images/card4.jpg" alt="face recto">
                    <img class="back-face" src="images/back-card.jpg" alt="face verso">
                </div>

                <div class="card" data-cardtype="grenade">
                    <img class="front-face" src="images/card5.jpg" alt="face recto">
                    <img class="back-face" src="images/back-card.jpg" alt="face verso">
                </div>

                <div class="card" data-cardtype="pêche">
                    <img class="front-face" src="images/card6.jpg" alt="face recto">
                    <img class="back-face" src="images/back-card.jpg" alt="face verso">
                </div>
                
                <div class="card" data-cardtype="citron">
                    <img class="front-face" src="images/card7.jpg" alt="face recto">
                    <img class="back-face" src="images/back-card.jpg" alt="face verso">
                </div>
               

                <div class="card" data-cardtype="fraise">
                    <img class="front-face" src="images/card8.jpg" alt="face recto">
                    <img class="back-face" src="images/back-card.jpg" alt="face verso">
                </div>

                <div class="card" data-cardtype="pomme-verte">
                    <img class="front-face" src="images/card9.jpg" alt="face recto">
                    <img class="back-face" src="images/back-card.jpg" alt="face verso">
                </div>
               

                <div class="card" data-cardtype="abricot">
                    <img class="front-face" src="images/card10.jpg" alt="face recto">
                    <img class="back-face" src="images/back-card.jpg" alt="face verso">
                </div>
               
                <div class="card" data-cardtype="raisin">
                    <img class="front-face" src="images/card11.jpg" alt="face recto">
                    <img class="back-face" src="images/back-card.jpg" alt="face verso">
                </div>
               
                <div class="card" data-cardtype="pastèque">
                    <img class="front-face" src="images/card12.jpg" alt="face recto">
                    <img class="back-face" src="images/back-card.jpg" alt="face verso">
                </div>

                <div class="card" data-cardtype="mûre">
                    <img class="front-face" src="images/card13.jpg" alt="face recto">
                    <img class="back-face" src="images/back-card.jpg" alt="face verso">
                </div>
               
                <div class="card" data-cardtype="poire">
                    <img class="front-face" src="images/card14.jpg" alt="face recto">
                    <img class="back-face" src="images/back-card.jpg" alt="face verso">
                </div>
               
                <div class="card" data-cardtype="cerise">
                    <img class="front-face" src="images/card15.jpg" alt="face recto">
                    <img class="back-face" src="images/back-card.jpg" alt="face verso">
                </div>

                <div class="card" data-cardtype="framboise">
                    <img class="front-face" src="images/card16.jpg" alt="face recto">
                    <img class="back-face" src="images/back-card.jpg" alt="face verso">
                </div>

                
                <div class="card" data-cardtype="mangue">
                    <img class="front-face" src="images/card17.jpg" alt="face recto">
                    <img class="back-face" src="images/back-card.jpg" alt="face verso">
                </div>

                
                <div class="card" data-cardtype="mirabelles">
                    <img class="front-face" src="images/card18.jpg" alt="face recto">
                    <img class="back-face" src="images/back-card.jpg" alt="face verso">
                </div>

                <div class="card" data-cardtype="pomme">
                    <img class="front-face" src="images/card1.jpg" alt="face recto">
                    <img class="back-face" src="images/back-card.jpg" alt="face verso">
                </div>

                <div class="card" data-cardtype="banane">
                    <img class="front-face" src="images/card2.jpg" alt="face recto">
                    <img class="back-face" src="images/back-card.jpg" alt="face verso">
                </div>

                <div class="card" data-cardtype="orange">
                    <img class="front-face" src="images/card3.jpg" alt="face recto">
                    <img class="back-face" src="images/back-card.jpg" alt="face verso">
                </div>

                <div class="card" data-cardtype="citron-vert">
                    <img class="front-face" src="images/card4.jpg" alt="face recto">
                    <img class="back-face" src="images/back-card.jpg" alt="face verso">
                </div>

                <div class="card" data-cardtype="grenade">
                    <img class="front-face" src="images/card5.jpg" alt="face recto">
                    <img class="back-face" src="images/back-card.jpg" alt="face verso">
                </div>

                <div class="card" data-cardtype="pêche">
                    <img class="front-face" src="images/card6.jpg" alt="face recto">
                    <img class="back-face" src="images/back-card.jpg" alt="face verso">
                </div>
                
                <div class="card" data-cardtype="citron">
                    <img class="front-face" src="images/card7.jpg" alt="face recto">
                    <img class="back-face" src="images/back-card.jpg" alt="face verso">
                </div>
               

                <div class="card" data-cardtype="fraise">
                    <img class="front-face" src="images/card8.jpg" alt="face recto">
                    <img class="back-face" src="images/back-card.jpg" alt="face verso">
                </div>

                <div class="card" data-cardtype="pomme-verte">
                    <img class="front-face" src="images/card9.jpg" alt="face recto">
                    <img class="back-face" src="images/back-card.jpg" alt="face verso">
                </div>
               

                <div class="card" data-cardtype="abricot">
                    <img class="front-face" src="images/card10.jpg" alt="face recto">
                    <img class="back-face" src="images/back-card.jpg" alt="face verso">
                </div>
               
                <div class="card" data-cardtype="raisin">
                    <img class="front-face" src="images/card11.jpg" alt="face recto">
                    <img class="back-face" src="images/back-card.jpg" alt="face verso">
                </div>
               
                <div class="card" data-cardtype="pastèque">
                    <img class="front-face" src="images/card12.jpg" alt="face recto">
                    <img class="back-face" src="images/back-card.jpg" alt="face verso">
                </div>

                <div class="card" data-cardtype="mûre">
                    <img class="front-face" src="images/card13.jpg" alt="face recto">
                    <img class="back-face" src="images/back-card.jpg" alt="face verso">
                </div>
               
                <div class="card" data-cardtype="poire">
                    <img class="front-face" src="images/card14.jpg" alt="face recto">
                    <img class="back-face" src="images/back-card.jpg" alt="face verso">
                </div>
               
                <div class="card" data-cardtype="cerise">
                    <img class="front-face" src="images/card15.jpg" alt="face recto">
                    <img class="back-face" src="images/back-card.jpg" alt="face verso">
                </div>

                <div class="card" data-cardtype="framboise">
                    <img class="front-face" src="images/card16.jpg" alt="face recto">
                    <img class="back-face" src="images/back-card.jpg" alt="face verso">
                </div>

                
                <div class="card" data-cardtype="mangue">
                    <img class="front-face" src="images/card17.jpg" alt="face recto">
                    <img class="back-face" src="images/back-card.jpg" alt="face verso">
                </div>

                
                <div class="card" data-cardtype="mirabelles">
                    <img class="front-face" src="images/card18.jpg" alt="face recto">
                    <img class="back-face" src="images/back-card.jpg" alt="face verso">
                </div>
    
          
            </div>

            <!-- c'est ici que l'on va insérer notre compteur temps et notre barre de progression -->
            <div id="gameInfoContainer" class="columns">
                <div id="progressBar"></div>
                    <div class="game-info col-12" id="timeCounter">
                        <span id="timer"></span>
                    </div>
                    <div class="game-info col-12" id="peerCounter">
                        Reste à trouver <span id="peers"></span> paires 
                    </div>
                    <div class="game-info col-12" >Meilleurs Temps :</div>
                    <div class="game-info col-12" id="winTimeContainer">
                    </div>
            </div>
       
        
        </div>
    </body>
</html>

