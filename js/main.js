

$(document).ready(function() {

    /*****************/
    /* INITIAL STATE */
    /*****************/

    //  On vérifie que notre fichier .js est bien chargé dans le DOM :
    console.log("mon fichier charge :) ");

    //  On sélectionne tous les éléments "card" de notre DOM, on les ajoute dans une liste, puis on crée un EventListener sur chacune des cartes qui va attendre un evt. de type "click" 
    const cards = document.querySelectorAll('.card');
    cards.forEach(card => card.addEventListener('click', flipCard));

    //  Les variables suivantes vont nous servir un peu plus loin pour vérifier si les paires "matchent" ;)
    var firstCard;
    var secondCard;

    // Ce compteur correspondra au nombre de paires à trouver. Dans notre cas, 18 paires : c'est un sacré gros memory !
    var peerCounter = 18;

    // Et celui-là au nombre de clics :
    var clickCount = 0;

    // Ces variables vont nous permettre de gérer le temps et la barre :
    var time = null;
    var progressBarWidth = null;
    var start = null;
    var intervalSetted = null;

    //  Pour démarrer la partie avec 120secondes de jeu :)
    duration = 120;

    // Let's go !
    startGame(duration);


    /*****************/
    /******TIMER******/
    /*****************/

     //Dans cette fonction, on va créer notre barre de progression et notre timer  :
     function startGame(duration) {

        // On commence par tout "remettre à zéro", dans le cas d'une nouvelle partie
        progressBarWidth = duration;
        time = duration;

        // On mélange les cardes grâce à la propriété css order flexbox 
        cards.forEach(card =>{
            let randomPos = Math.floor(Math.random() *36);
            card.style.order = randomPos;
        });

        intervalSetted = null;
        start = Date.now();

        function timer() {

            // on génère notre timer puis on l'"injecte" dans le html
            time = duration - (((Date.now() - start) / 1000) | 0);
            $('#timer').html(time + "s");

            // petit bonus, on va ajouter le nb de paires restantes dans le hmtl également !
            $('#peers').html(peerCounter);

            // le rétrécissement de notre barre de progression se gère ici
            progressBarWidth = (time * 100 / duration);
            $('#progressBar').css({
                width: progressBarWidth + '%'
            });

            // c'est ici qu'on met à jour notre compteur tant qu'il reste du temps
            if (time <= 0) {
                clearInterval(intervalSetted);
            } else {
               return false
            }

            // on termine la partie si le temps est à zéro
            if (time == 0){
                watchGameEnd();
            } else {
                return false
            }
        }

        timer();
        intervalSetted = setInterval(timer, 1000);

    }
        function watchGameEnd(){
            //On redémarre le jeu si le compteur est à zéro
                setTimeout(() => {    
                    alert(' Oh non ! Tu as perdu !');
                    ResetGame();
                }, 600);

    }

    /*****************/
    /******JEU********/
    /*****************/

    //Dans cette fonction, on va gérer les interactions du jeu
    function flipCard() {
        //on vérifie si l'action de clic est bien récupérée puis on cherche à comprendre à quel contexte se réfère "this" :)
        console.log("click !")
        console.log(this);

        //on incrémente notre compteur de clics
        clickCount ++;

        //là, on retourne notre carte à chaque clic en ajoutant/supprimant la classe "flip" seulement s'il y a moins de deux clics
        if( clickCount <= 2 ){
            this.classList.toggle('flip');
    
        // On va maintenant chercher les paires de clics à l'aide de cette boucle 
            if( clickCount <= 1 ){

                //si notre compteur de clicks vaut 1, on considère que c'est donc le début de l'appairage que vient d'effectuer le joueur. On veut donc que "this" renvoit à la première carte
                firstCard = this;
                console.log('clickcount : ' + clickCount);

            } else {

                // Sinon, c'est le second clic d'un appairage :
                secondCard = this;
                console.log('clickcount : ' + clickCount);

                // on vérifie que notre paire est bien la paire clickée dans le DOM (il suffira de survoler l'élément dans la console)
                console.log({firstCard, secondCard});

                // et maintenant, voyons si les cartes sont identiques grâce à l'attribut "data" que nous avons inséré dans notre html
                console.log(firstCard.dataset.cardtype);
                console.log(secondCard.dataset.cardtype);

                //on a une paire ! dans ce cas, on désactive notre Eventlistener pour "bloquer" la paire 
                if(firstCard.dataset.cardtype === secondCard.dataset.cardtype){

                    firstCard.removeEventListener('click', flipCard);
                    secondCard.removeEventListener('click', flipCard);

                    //puis on décrémente notre compteur de paires
                    peerCounter --;
                    console.log("il reste " + peerCounter + " paires")

                    //et on réinitialise notre compteur de clics
                    clickCount = 0;

                } else {
                    // il n'y a pas de paire, on retourne les cartes
                    setTimeout(() => {
                        firstCard.classList.remove('flip');
                        secondCard.classList.remove('flip');
                        // et on réinitialise notre compteur de clics
                        clickCount = 0;
                    }, 600);
                }

            }
        };
         // Et si toutes les paires sont trouvées; la partie est gagnée 
            if( peerCounter == 0){
                setTimeout(() => {
                    alert('Tu as gagné !');
                    saveWinnerTime(time, duration);
                    ResetGame();
                }, 600);
            }
    };

    /*****************/
    /******RESET******/
    /*****************/

    // Cette fonction sert à réinitialiser le plateau et mélanger les cartes
    function ResetGame() {

        clickCount = 0;
        [firstCard, secondCard] = [null, null];
        cards.forEach(card =>{
            card.classList.remove('flip');
            card.addEventListener('click', flipCard);
        });

    //et on réinitialise les valeurs   
        peerCounter = 18;
        startGame(duration);
    }

    /**************/
    /****SAVE******/
    /**************/

    // On sauvegarde le temps de jeu grâce à cette requête AJAX
    function saveWinnerTime(time, duration) {
        var wintime = duration - time;
        var date = new Date();
        console.log(wintime, date);
        var postData = {
            "time" : wintime, 
            "date" : date
        };
        $.post('savesettings.php', postData ).done(function(response) {
            alert("Temps sauvegardé : " + response + "s" );
        });
        setTimeout(() => {
            // pour afficher les temps des vainqueurs :)
            displayWinnerTime();
        }, 600);
    }

    /************/
    /**DISPLAY**/
    /************/

    // On va afficher les temps des vainqueurs à l'aide de cette appel AJAX
    function displayWinnerTime() {
        $.ajax({   
            type: "GET",
            url: "getsettings.php",             
            dataType: "html",                
            success: function(response){                    
                $("#winTimeContainer").html(response); 
            }
        });
    };
       
});
