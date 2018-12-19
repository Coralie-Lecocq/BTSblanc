<script>
    function quiz() {
        window.open('quiz.html', 'GSB - Quiz', 'width="100%",height="100%"');
    }

    /* ---------------Fonction GOOGLE MAP--------------- */

    function initMap() {
        var uluru = {
            lat: 48.837854,
            lng: 2.317816
        };
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15,
            center: uluru
        });
        var marker = new google.maps.Marker({
            position: uluru,
            map: map
        });
    }

</script>

<!-- --------------------- MOTS CLES DE RECHERCHE GOOGLE -------------------- -->

<META NAME="keywords" CONTENT="galaxy, swiss, bourdin, gsb, laboratoire, ppe, sida, vih, hiv, hépatite, hepatite" />

<!-- ----------------- Photo + Parallaxe ------------------- -->
<body class="loading">
    <main id="space">
        <section id="slide-1" class="homeSlide">
            <div class="bcg" data-center="background-position: 50% 0px;" data-top-bottom="background-position: 50% -250px;" data-anchor-target="#slide-1">
                <div class="hsContainer">
                    <div class="hsContent" data-center="bottom: 200px; opacity: 1" data-top="bottom: 1200px; opacity: 0" data-anchor-target="#slide-1 h2">
                        <h2>Bienvenue sur Galaxy Swiss Bourdin !</h2>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <main id="space_mob">
        <h2>Bienvenue sur Galaxy Swiss Bourdin !</h2>
    </main>


    <div id="color">

        <!-- ----------------- A PROPOS ------------------- -->

        <div id="about">
            <h2><a href="?page=about">À propos</a></h2>
            <div class="carrebleu"></div>
            <p>Le laboratoire Galaxy Swiss Bourdin (GSB) est issu de la fusion entre le géant américain Galaxy (spécialisé dans le secteur des maladies virales dont le SIDA et les hépatites) et le conglomérat européen Swiss Bourdin (travaillant sur des médicaments plus conventionnels), lui même déjà union de trois petits laboratoires. En 2009, les deux géants pharmaceutiques ont uni leurs forces pour créer un leader de ce secteur industriel. L’entité Galaxy Swiss Bourdin Europe a établi son siège administratif à Paris.</p>
        </div>

        <!-- ----------------- LABORATOIRE ------------------- -->

        <div id="laboratoire">
            <h2><a href="?page=laboratoire">Nos services</a></h2>
            <div class="carreblanc" id="carre2"></div>
            <section>
                <div class="cases">
                    <h3>Suivi personnalisé</h3>
                    <p>Notre équipe médicale met tout en oeuvre pour vous offrir le meilleur suivi possible.</p>
                </div>
                <div class="cases">
                    <h3>Dépistage</h3>
                    <p>Nous effectuons les tests de dépistage au sein même du laboratoire.</p>
                </div>
            </section>
            <section>
                <div class="cases">
                    <h3>Recherche</h3>
                    <p>Nous réalisons des recherches afin de trouver un traitement permettant de soigner le SIDA et les hépatites.</p>
                </div>
                <div class="cases">
                    <h3>Nouvelles technologies</h3>
                    <p>Nous possédons les nouvelles technologies en termes de médecine, de matériel et de techniques.</p>
                </div>
            </section>
        </div>

        <!-- ----------------- STAFF ------------------- -->

        <div id="staff">
            <h2>Notre équipe</h2>
            <div class="carrebleu"></div>
            <section>
                <div class="personnel">
                    <img src="img/julien.jpg">
                    <h4>Julien Bernezet</h4>
                    <p>Médecin Chercheur</p>
                </div>
                <div class="personnel">
                    <img src="img/cyndie.png">
                    <h4>Cyndie Lefebvre</h4>
                    <p>Infirmière</p>
                </div>
                <div class="personnel">
                    <img src="img/stanislas.jpg">
                    <h4>Stanislas Delgrange</h4>
                    <p>Médecin</p>
                </div>
            </section>
            <section id="professions">
            </section>
        </div>
    </div>

    <!-- ----------------- ESPACE AVEC CARRÉS EXPLICATIFS ------------------- -->

    <div id="espace">
        <img src="img/pills.jpg">
        <ul>
            <li>Spécialisés en <b>maladies virales</b></li>
            <li>Dépistage du <b>SIDA et hépatites</b></li>
            <li>Recherche <br/>de<br/><b>traitement</b></li>
        </ul>
    </div>

    <!-- ----------------- NOUS CONTACTER ------------------- -->

    <div id="contact">
        <h2 class="blanc"><a href="?page=contact">Contact</a></h2>
        <div class="carrebleu"></div>
        <section id="adresse">
            <span>Notre adresse</span>
            <p>15 rue du Château</p>
            <p>75014 Paris, France</p>
            <p>info@gsb-support.fr / Tél. : 01 18 94 35 79</p>
        </section>
        <section>
            <span>Horaires d'ouverture</span>
            <p>Lundi – Vendredi : 9h00 – 19h00</p>
            <p>Samedi : 9h00 – 14h00</p>
        </section>
        <!-- Map Google -->
        <div id="map"></div>
    </div>
    </body>
