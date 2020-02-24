

$(document).ready(function() {
    //On vérifie que notre fichier .js est bien chargé dans le DOM :
    console.log("mon fichier charge");

    //On sélectionne tous les éléments "card" de notre DOM, on les ajoute dans une liste, puis on crée un EventListener sur chacune des cartes qui va attendre un evt. de type "click" 
    const cards = document.querySelectorAll('.card');
    cards.forEach(card => card.addEventListener('click', flipCard));

    //les variables suivantes vont nous servir un peu plus loin pour vérifier si les paires "matchent" ;)
    var isCardFlipped = false;
    var firstCard;
    var secondCard;

    function flipCard() {
        //ici, on vérifie si l'action de clic est bien récupérée puis on cherche à comprendre à quel contexte se réfère "this" :)
        console.log("click !")
        console.log(this);

        //là, on retourne notre carte à chaque clic en ajoutant/supprimant la classe "flip" :
        this.classList.toggle('flip');

        // On va maintenant chercher les paires de clics à l'aide de cette boucle 
        if(!isCardFlipped){
            //si notre variable isCardFlipped est fausse, on considère que c'est donc le premier clic d'une paire que vient d'effectuer le joueur 
            isCardFlipped = true;
            firstCard = this;
        } else {
            // Sinon, c'est le second clic d'une paire :
            isCardFlipped = false;
            secondCard = this;

            // on vérifie que notre paire est bien la paire clickée dans le DOM (il suffira de survoler l'élément dans la console)
            console.log({firstCard, secondCard});

            // et maintenant, voyons si les cardes sont identiques grâce à l'attribut data que nous avons inséré dans notre html
            console.log(firstCard.dataset.cardtype);
            console.log(secondCard.dataset.cardtype);

            if(firstCard.dataset.cardtype === secondCard.dataset.cardtype){
                //on a une paire ! dans ce cas, on enlève notre Eventlistener pour "désactiver" la paire 
                firstCard.removeEventListener('click', flipCard);
                secondCard.removeEventListener('click', flipCard);
                console.log("on a une paire !")
            } else {
                // il n'y a pas de paire, on retourne les cartes
                setTimeout(() => {
                firstCard.classList.remove('flip');
                secondCard.classList.remove('flip');
                }, 600);
            }

            //On redémarre le jeu si le compteur est à zéro
            if( counter == 0 ){
                setTimeout(() => {    
                    alert('perdu !');
                    ResetGameBoard();
                }, 900);
            }
            
        }
    };

    // on réinitialise le plateau et on mélange les cartes
    function ResetGameBoard() {
        [isCardFlipped] = [false];
        [firstCard, secondCard] = [null, null];
        counter = 20;
        cards.forEach(card =>{
            let randomPos = Math.floor(Math.random() *36);
            card.style.order = randomPos;
            card.classList.remove('flip');
        });
    //On redémarre la partie       
    startGame(120);
    }
    
    //Ici, on va créer notre barre de progression et notre timer :
    function startGame(duration) {
        /*le temps d'une partie en secondes */
        var totalTime = 40;
        var documentWidth = $(document).width();
        var start = Date.now();
        var intervalSetted = null;
    
        function timer() {
            var diff = duration - (((Date.now() - start) / 1000) | 0);

            var seconds = (diff % 60) | 0;
            seconds = seconds < 10 ? "0" + seconds : seconds;
            $('#timer').html("00:" + seconds);

            var progressBarWidth = (seconds * documentWidth / totalTime);
    
            $('#progressBar').css({
                width: progressBarWidth + 'px'
            });
    
            if (diff <= 0) {
                clearInterval(intervalSetted);
            }
        }
    
        timer();
        intervalSetted = setInterval(timer, 1000);
    }
    
    startGame(40);



    

});
