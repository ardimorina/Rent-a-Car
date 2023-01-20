<?php
include "inc/header.php";
?>


<section class="list-entity container">
    <div class="image">
        <img src="img/clients.jpg" alt="">
    </div>

    <table class="styled-table">
        <thead>
            <tr>
                <th>Emri</th>
                <th>Mbiemri</th>
                <th>Email</th>
                <th>Telefoni</th>
                <th>NrPersonal</th>
                <th>Komuna</th>
                <th>Modifiko</th>
                <th>Fshiej</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $klientet=merrKlientet();
            while($klienti=mysqli_fetch_assoc($klientet)){
                $klientiid = $klienti['klientiid'];
                echo "<tr>";
                echo "<td>" . $klienti['emri'] . "</td>";
                echo "<td>" . $klienti['mbiemri'] . "</td>";
                echo "<td>" . $klienti['email'] . "</td>";
                echo "<td>" . $klienti['telefoni'] . "</td>";
                echo "<td>" . $klienti['nrpersonal'] . "</td>";
                echo "<td>" . $klienti['komuna'] . "</td>";
                echo "<td><a href='shto_modifiko_perdorues.php?kid={$klientiid}'>
                <i class='fas fa-edit'></i></a></td>";
                echo "<td><a href='fshij_perdorues.php?kid={$klientiid}'>
                <i class='far fa-trash-alt'></i></a></td>";
                echo "</tr>";
            }
            ?>

        </tbody>
    </table>
    <a href="shto_modifiko_klient.php" id="add_entity"><i class="fas fa-plus"></i> Shto klient</a>
</section>

<?php
include "inc/footer.php";

?>