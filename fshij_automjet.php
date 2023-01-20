<?php

include "inc/header.php";
if(!isset($_SESSION['user'])){
    header("Location: automjetet.php");
}             
if (isset($_GET['aid'])) {
    $automjetiid=$_GET['aid'];
    $automjeti=merrAutomjetId($automjetiid);
    $emri=$automjeti['emri'];
    $kategoriakatemri=$automjeti['katemri'];
    $nrregjistrimit=$automjeti['nrregjistrimit'];
    $pershkrimi=$automjeti['pershkrimi'];
}

if (isset($_POST['fshij'])) {
    fshijAutomjete($_POST['automjetiid']);
}


?>

<section class="section-shto-modifiko container">
    <div class="image">
        <img src="img/clients.jpg" alt="">
    </div>
    <div class="forma">
        <br>
        <br>
        <h1>Forma per Fshirjen e Automjeteve</h1>
        <br>
        <form method="post">
        <input type="hidden" id="automjetiid" name="automjetiid" 
                value="<?php if(!empty($automjetiid)) echo $automjetiid ?>">
            <div class="inputAndLabels">
                <label for="emri">Emri</label> <br>
                <input  readonly type="text" id="emri" name="emri" 
                value="<?php if(!empty($emri)) echo $emri ?>">
            </div>
            <div class="inputAndLabels">
                <label for="katemri">Kategoria</label> <br>
                <input  readonly type="text"id="katemri" name="katemri"
                value="<?php if(!empty($katemri)) echo $katemri ?>">
            </div>
            <div class="inputAndLabels">
                <label for="nrregjistrimit">Nr regjistrimit</label> <br>
                <input  readonly type="text"id="nrregjistrimit" name="nrregjistrimit"
                value="<?php if(!empty($nrregjistrimit)) echo $nrregjistrimit ?>">
            </div>
            <div class="inputAndLabels">
                <label for="pershkrimi">Pershkrimi</label> <br>
                <input  readonly type="text"id="pershkrimi" name="pershkrimi"
                value="<?php if(!empty($pershkrimi)) echo $pershkrimi ?>">
            </div>

            <input type="submit" name="fshij" id="fshij" value="Fshij">
                </div>
            </div>
        </form>
    </div>
</section>
<?php
include "inc/footer.php";

?>


</body>
</html>
