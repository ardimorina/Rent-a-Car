<?php
include "inc/header.php";
if(!isset($_SESSION['user'])){
    header("Location: kategorit.php");
}
if(isset($_POST['shtokategorite'])){
    shtokategorite($_POST['emri'],$_POST['pershkrimi']);
}
if(isset($_POST['modifikoKategori'])){
    modifikoKategori($_POST['kategoriaid'],$_POST['emri'],$_POST['pershkrimi']);
}
if(isset($_GET['kid'])){
    $kategoriaid=$_GET['kid'];
    $kategoria=merrKategoriId($kategoriaid);
    $emri=$kategoria['emri'];
    $pershkrimi=$kategoria['pershkrimi'];
}
?>

<section class="section-shto-modifiko container">
    <div class="image">
        <img src="img/clients.jpg" alt="">
    </div>
    <div class="forma">
        <br>
        <br>
        <h1>Forma per shtimin e Kategorive</h1>
        <br>
        <form method="post">
        <input type="hidden" id="kategoriaid" name="kategoriaid" 
                value="<?php if(!empty($kategoriaid)) echo $kategoriaid ?>">
            <div class="inputAndLabels">
                <label for="emri">Emri</label> <br>
                <input type="text" id="emri" name="emri" 
                value="<?php if(!empty($emri)) echo $emri ?>">
            </div>
            <div class="inputAndLabels">
                <label for="pershkrimi">Pershkrimi</label> <br> <textarea id="pershkrimi" name="pershkrimi" rows="10"><?php if(!empty($pershkrimi)) echo $pershkrimi ?></textarea>
            </div>
            <div class="inputAndLabels">
                <div class="butonat">
                    <?php
                        if(!isset($_GET['kid'])){
                            echo "<input id='shtokategorite' type='submit'
                            name='shtokategorite' class='shtoModifiko' value='Shto Kategori'>";
                        }else{
                            echo "<input id='modifikoKategori' type='submit'
                            name='modifikoKategori' class='shtoModifiko' value='Modifiko Kategori'>"; 
                        }
                    ?>
                </div>
            </div>
        </form>
    </div>
</section>

<footer class="main-footer">
    <div class="main-footer-content container">
        <div>
            <p>&copy; Rent a Car 2021. All rights reserved.</p>
        </div>
        <div class="social-media">
            <div>
                <a href="#"><i class="fab fa-facebook"></i></a>
            </div>
            <div>
                <a href="#"><i class="fab fa-twitter"></i></a>
            </div>
            <div>
                <a href="#"><i class="fab fa-linkedin"></i></a>
            </div>
        </div>
    </div>
</footer>

</body>
</html>
