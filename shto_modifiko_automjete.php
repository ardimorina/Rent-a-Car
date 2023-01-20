<?php
include "inc/header.php";
if(!isset($_SESSION['user'])){
    header("Location: automjetet.php");
}
if (isset($_POST['shtoAutomjet'])) {
    shtoAutomjet($_POST['emri'], $_POST['kategoria'], $_POST['nrregjistrimi'], $_POST['pershkrimi']);
}
if(isset($_POST['modifikoAutomjet'])){
    modifikoAutomjet($_POST['automjetiid'],$_POST['emri'],$_POST['kategoria'], $_POST['nrregjistrimi'], $_POST['pershkrimi']);
}

if(isset($_GET['aid'])){
    $automjetiid=$_GET['aid'];
    $automjeti=merrAutomjetId($automjetiid);
    $emri=$automjeti['emri'];
    $kategoriaid=$automjeti['kategoriaid'];
    $nrregjistrimi=$automjeti['nrregjistrimi'];
    $pershkrimi=$automjeti['pershkrimi'];
}
?>

<section class="section-shto-modifiko container">
    <div class="image">
        <img src="img/car8.jpg" alt="">
    </div>
    <div class="forma">
        <br>
        <br>
        <h1>Forma per shtimin e Automjetit</h1>
        <br>
        <form id="automjeti" method="post"> <input type="hidden" id="automjetiid" name="automjetiid" value="<?php if(!empty($automjetiid)) echo $automjetiid ?>">
            <div class="inputAndLabels">
                <label for="emri">Emri</label> <br>
                <input type="text" id="emri" name="emri" value="<?php if(!empty($emri)) echo $emri ?>">
            </div>
            <div class="inputAndLabels">
                <label for="kategoria">Kategoria</label> <br>
                <select id="kategoria" name="kategoria">
                    <option value="<?php if(!empty($kategoria)) echo $kategoria?>">Zgjedh kategorine</option>
                    <?php
                        $kategorit=merrKategorit();
                        while ($kategoria=mysqli_fetch_assoc($kategorit)) {
                            $kategoriaid=$kategoria['kategoriaid'];
                            $kategoriemri=$kategoria['emri'];
                            echo "<option value='$kategoriaid'>$kategoriemri</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="inputAndLabels">
                <label for="nrregjistrimi">Numri i regjistrimit</label> <br>
                <input type="text" id="nrregjistrimi" name="nrregjistrimi" value="<?php if(!empty($nrregjistrimi)) echo $nrregjistrimi ?>">
            </div>
            <div class="inputAndLabels">
                <label for="pershkrimi">Pershkrimi</label> <br>
                <input type="text" id="pershkrimi" name="pershkrimi" value="<?php if(!empty($pershkrimi)) echo $pershkrimi ?>">
            </div>
            <div class="inputAndLabels">
                <div class="butonat">
                    <?php
                        if(!isset($_GET['aid'])){
                            echo "<input id='shtoAutomjet' type='submit'
                            name='shtoAutomjet' class='shtoModifiko' value='Shto Automjet'>";
                        }else{
                            echo "<input id='modifikoAutomjet' type='submit'
                            name='modifikoAutomjet' class='shtoModifiko' value='Modifiko Automjet'>"; 
                        }
                    ?>
                </div>
        </form>
    </div>
</section>

<?php
include "inc/footer.php";

?>