<?php
include "inc/header.php";

if(!isset($_SESSION['user'])){
    header("Location: rezervimet.php");
}
if(isset($_GET['rid'])){
    $rezervimiid=$_GET['rid'];
    $rezervimi=merrRezervimId($rezervimiid);
    $klientiId=$rezervimi['klientiid'];
    $klientiEmriMbiemri=$rezervimi['emrimbiemri'];
    $automjetiId=$rezervimi['automjetiid'];
    $automjetiEmri=$rezervimi['emri'];
    $dataemarrjes=date("Y-m-d", strtotime($rezervimi['dataemarrjes']));
    $dataekthimit=date("Y-m-d", strtotime($rezervimi['dataekthimit']));
}
if(isset($_POST['shtorezervim'])){
    shtoRezervim($_POST['klienti'],$_POST['automjeti'],$_POST['dataemarrjes'],$_POST['dataekthimit']);
}
if(isset($_POST['modifikorezervim'])){
    modifikoRezervim($_POST['rezervimiid'],$_POST['klienti'],$_POST['automjeti'],$_POST['dataemarrjes'],$_POST['dataekthimit']);
}
?>

<section class="section-shto-modifiko container">
    <div class="image">
        <img src="img/car10.png" alt="">
    </div>
    <div class="forma">
        <br>
        <br>
        <h1>Forma per shtimin/editimin e Rezervimit</h1>
        <br>
        <form method="POST">
            <div class="inputAndLabels">
                <input type="hidden" name="rezervimiid" value="<?php if(!empty($rezervimiid)) echo $rezervimiid ?>">
                <label for="klienti">Klienti</label> <br>

                <select id="klienti" name="klienti">
                    <?php
                    if(isset($_GET['rid'])){
                        echo "<option value='$klientiId'>$klientiEmriMbiemri</option>";
                    }else{
                        echo "<option value=''>Zgjedh Klientin</option>";
                    }
                    $klientet=merrKlientet();
                    while ($klienti=mysqli_fetch_assoc($klientet)) {
                        $kid=$klienti['klientiid'];
                        $kemrimbiemri=$klienti['emri'] . " " . $klienti['mbiemri'];
                        if (isset($_GET['rid'])) {
                            if($kid!=$klientiId){
                                echo "<option value='$kid'>$kemrimbiemri</option>";
                            }
                        }else{
                            echo "<option value='$kid'>$kemrimbiemri</option>"; 
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="inputAndLabels">
                <label for="automjeti">Automjeti</label> <br>
                <select id="automjeti" name="automjeti">
                    <?php
                    //echo $_GET['rid'];
                    $automjetet=merrAutomjet();
                    if(isset($_GET['rid'])){
                        echo "<option value='$automjetiId'>$automjetiEmri</option>";
                    }else{
                        echo "<option value=''>Zgjedh Automjetin</option>";
                    }
                    while($automjeti = mysqli_fetch_assoc($automjetet)){
                        $aid=$automjeti['automjetiid'];
                        $aemri=$automjeti['emri'];
                        if(isset($_GET['rid'])){
                            if($automjetiId!=$aid){
                                echo "<option value='$aid'>$aemri</option>";
                            }
                        }else{
                            echo "<option value='$aid'>$aemri</option>";
                        }
                    }
                    ?>
                    
                    ?>
                </select>
            </div>
            <div class="inputAndLabels">
                <label for="dataemarrjes">Data e marrjes</label> <br>
                <input type="date" id="dataemarrjes" name="dataemarrjes"
                value="<?php if(!empty($dataemarrjes)) echo $dataemarrjes ?>">
            </div>
            <div class="inputAndLabels">
                <label for="dataekthimit">Data e kthimit</label> <br>
                <input type="date" id="dataekthimit" name="dataekthimit"
                value="<?php if(!empty($dataekthimit)) echo $dataekthimit ?>">
            </div>
            <div class="inputAndLabels">
                <div class="butonat">
                    <?php
                    if (!isset($_GET['rid'])) {
                        echo "<input id='shtorezervim' type='submit'
                            name='shtorezervim' class='shtoModifiko' value='Shto Rezervim'>";
                    } else {
                        echo "<input id='modifikorezervim' type='submit'
                            name='modifikorezervim' class='shtoModifiko' value='Modifiko Rezervim'>";
                    }
                    ?>
                </div>
            </div>
        </form>
    </div>
</section>

<?php
include 'inc/footer.php';
?>