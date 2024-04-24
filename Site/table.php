<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/table.css">
    <title>Dice Gather</title>
</head>
<body>
    <header>
        <?php include('./include/header_signedIn.inc.php'); ?>
    </header>
    <main>
        <div id="profileTable">
            <div class="imgContainer">
                <img src="./assets/img/profile1.jpg" alt="image profil de table">
             <!-- <img src="<//?php echo $_SESSION['avatar'];?>" alt="Avatar"/> -->
            </div>
            <div id="profileTableDroite">
                <h1 id="tableTitle">
                    Titre Exemple
                    <!-- Table n°<//?php echo $_GET["id"];?> :  
                    <//?php if (isset($_GET["name"])) {echo "\"".$_GET["name"]."\"";} else{echo "Anonyme";}?> -->
                </h1>
                <h2>
                    MJ : *nom du MJ*
                </h2>
            </div>

        </div>
        <div id="sumupContainer">
            <h2>Je suis le titre du résumé</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo quas quos necessitatibus distinctio iusto ipsam tempora, laborum, tempore in consequuntur voluptates repellat nulla provident eveniet. Vitae omnis suscipit placeat dolore.Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur repellat accusamus fugit non, labore necessitatibus numquam voluptatum. Eos ipsum cumque ducimus numquam corporis. Nemo odit, voluptas dolor nihil saepe expedita.
            Blanditiis molestiae dignissimos adipisci tenetur sequi aliquid odit unde quo enim id sit esse explicabo harum neque corporis alias laborum vel, molestias iusto, doloremque deserunt, facere laudantium quisquam voluptatem? Dolor?
            Ab, eius, minus quas dignissimos tenetur illo commodi vero illum, laudantium ipsa quidem suscipit? Obcaecati suscipit voluptatem quibusdam laborum quo a modi ex consectetur tenetur ipsum, cum illum sunt perspiciatis!
            Natus magnam, reprehenderit iure impedit qui pariatur fugit ab dolor vel quisquam sint, iste ullam temporibus obcaecati. Doloremque sunt, itaque, ad nostrum ex, enim tempore tenetur eligendi dolor provident incidunt!
            Dolores exercitationem architecto assumenda voluptatum ipsa modi magni dolor culpa voluptatibus odio, velit, quas autem tempora eos! Harum possimus earum esse sequi neque nesciunt omnis molestiae, recusandae excepturi exercitationem. Blanditiis!
            Recusandae id quibusdam cumque rerum ab dolore! Soluta officia rem exercitationem sunt, ad id provident illum aliquid est cum ipsum dolorem molestiae optio adipisci, aut earum quod debitis nulla aspernatur.Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio soluta eligendi aliquam, possimus inventore illo, doloribus nam explicabo recusandae itaque molestiae sequi sapiente vitae quis? Nesciunt repudiandae similique facilis quisquam.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Et in aspernatur a perspiciatis totam consectetur rem soluta velit inventore fugit, adipisci tempore tenetur voluptas, porro similique minima illo, eum reprehenderit.</p>
        </div>

        <div id="calendrierContainer">
            <p>Prochaine session le : 01/01/2011 11:11</p>
        </div>
        <div id="joueursPresents">
            <div class="profilPerso">Je suis le MJ</div>
            <div class="profilPerso">Je suis le J1</div>
            <div class="profilPerso">Je suis le J2</div>
            <div class="profilPerso">Je suis le J3</div>
            <div class="profilPerso">Je suis le J4</div>
        </div>
        <!-- Uniquement visible pour la session MJ -->
        <a href="tableModif.php">Modifier</a>
    </main>
    <footer>
        <?php include('./include/footer.inc.php'); ?>
    </footer>

    <script src="./js/app.js"></script>
</body>
</html>
