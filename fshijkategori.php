<?php include 'inc/header.php' ?>
<?php
if(!isset($_SESSION['user'])){
    header("Location: kategorit.php");
}
       if(isset($_GET['kid'])){
        $kategoriaid=$_GET['kid'];
        $kategoria=merrKategoriId($kategoriaid);
        $emri=$kategoria['emri'];
        $pershkrimi=$kategoria['pershkrimi'];
    }
        if (isset($_POST['fshij'])) {
            fshijKategorit($_POST['kategoriaid']);
        }
?>

<section class="section-shto-modifiko container">
    <div class="image">
        <img src="img/clients.jpg" alt="">
    </div>
    <div class="forma">
        <br>
        <br>
        <h1>Forma per fshirjen e Kategorive</h1>
        <br>
        <form method="post">
        <input type="hidden" id="kategoriaid" name="kategoriaid"  value="<?php if(!empty($kategoriaid)) echo $kategoriaid ?>">
            <div class="inputAndLabels">
                <label for="emri">Emri</label> <br> <input type="text" id="emri" name="emri" value="<?php if(!empty($emri)) echo $emri ?>">
            </div>
            <div class="inputAndLabels">
                <label readonly for="pershkrimi">Pershkrimi</label> <br> <textarea id="pershkrimi" name="pershkrimi" rows="10">
                    <?php if(!empty($pershkrimi)) echo $pershkrimi ?></textarea>
            </div>
            <div class="inputAndLabels">
                <div class="butonat">
                        <input type="submit" name="fshij" id="fshij" value="Fshij">
                </div>
            </div>
            </div>
        </form>
    </div>
</section>
<?php include 'inc/footer.php' ?>