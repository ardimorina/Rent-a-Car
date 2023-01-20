<?php

include "inc/header.php";
if(isset($_POST['regjistrohu'])){
    regjistrohu($_POST['emri'],$_POST['mbiemri'],
    $_POST['email'],$_POST['telefoni'],$_POST['nrpersonal'],$_POST['komuna']);
}
?>

<section class="section-shto-modifiko container">
    <div class="image">
        <img src="img/clients.jpg" alt="">
    </div>
    <div class="forma">
        <br>
        <br>
        <h1>Forma per Regjistrim</h1>
        <br>
        <form method="post">
        <input type="hidden" id="perdoruesiid" name="perdoruesiid" 
                value="<?php if(!empty($perdoruesiid)) echo $perdoruesiid ?>">
            <div class="inputAndLabels">
                <label for="emri">Emri</label> <br>
                <input type="text" id="emri" name="emri" 
                value="<?php if(!empty($emri)) echo $emri ?>">
            </div>
            <div class="inputAndLabels">
                <label for="mbiemri">Mbiemri</label> <br>
                <input type="text" id="mbiemri" name="mbiemri"
                value="<?php if(!empty($mbiemri)) echo $mbiemri ?>">
            </div>
            <div class="inputAndLabels">
                <label for="email">Email</label> <br>
                <input type="email" id="email" name="email"
                value="<?php if(!empty($email)) echo $email ?>">
            </div>
            <div class="inputAndLabels">
                <label for="nrpersonal">Nr personal</label> <br>
                <input type="text" id="nrpersonal" name="nrpersonal"
                value="<?php if(!empty($nrpersonal)) echo $nrpersonal ?>">
            </div>
            <div class="inputAndLabels">
                <label for="telefoni">Nr telefonit</label> <br>
                <input type="text" id="telefoni" name="telefoni"
                value="<?php if(!empty($telefoni)) echo $telefoni ?>">
            </div>
            <div class="inputAndLabels">
                <label for="komuna">Komuna</label> <br>
                <input type="komuna" id="komuna" name="komuna"
                value="<?php if(!empty($komuna)) echo $komuna ?>">
            </div>
            <input type="submit" name="regjistrohu" id="regjistrohu" value="Regjistrohu">
            </div>
        </form>
    </div>
</section>

<?php
include 'inc/footer.php';
?>

</body>
</html>
