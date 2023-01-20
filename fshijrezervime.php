<?php

include "inc/header.php";
if(!isset($_SESSION['user'])){
    header("Location: rezervimet.php");
}             
if (isset($_GET['rid'])) {
    $rezervimiid=$_GET['rid'];
    $rezervimi=merrRezervimId($rezervimiid);
    $emrimbiemri=$rezervimi['emrimbiemri'];
    $emri=$rezervimi['emri'];
    $dataemarrjes=$rezervimi['dataemarrjes'];
    $dataekthimit=$rezervimi['dataekthimit'];
}

if (isset($_POST['fshij'])) {
    fshijrezervime($_POST['rezervimiid']);
}


?>

<section class="section-shto-modifiko container">
    <div class="image">
        <img src="img/clients.jpg" alt="">
    </div>
    <div class="forma">
        <br>
        <br>
        <h1>Forma per Fshirjen e Rezervimeve</h1>
        <br>
        <form method="post">
        <input type="hidden" id="rezervimiid" name="rezervimiid" 
                value="<?php if(!empty($rezervimiid)) echo $rezervimiid ?>">
            <div class="inputAndLabels">
                <label for="emrimbiemri">Emri Dhe Mbiemri</label> <br>
                <input  readonly type="text" id="emrimbiemri" name="emrimbiemri" 
                value="<?php if(!empty($emrimbiemri)) echo $emrimbiemri ?>">
            </div>
            <div class="inputAndLabels">
                <label for="emri">Automjeti</label> <br>
                <input  readonly type="text"id="emri" name="emri"
                value="<?php if(!empty($emri)) echo $emri ?>">
            </div>
            <div class="inputAndLabels">
                <label for="dataemarrjes">Data e Marrjes</label> <br>
                <input  readonly type="text"id="dataemarrjes" name="dataemarrjes"
                value="<?php if(!empty($dataemarrjes)) echo $dataemarrjes ?>">
            </div>
            <div class="inputAndLabels">
                <label for="dataekthimit">Data e Kthimit</label> <br>
                <input  readonly type="text"id="dataekthimit" name="dataekthimit"
                value="<?php if(!empty($dataekthimit)) echo $dataekthimit ?>">
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
