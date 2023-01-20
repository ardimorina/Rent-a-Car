<?php
include "inc/header.php";
?>

<section class="list-entity container">
    <div class="image">
        <img src="img/car10.png" alt="">
    </div>
    <?php
    if (isset($_SESSION['message'])) {
        echo "<div id='message'>" . $_SESSION['message'] . "</div>";
    }
    ?>
    <table class="styled-table">
        <thead>
            <tr>
                <th>Emri</th>
                <th>Pershkrimi</th>
                <th>Modifiko</th>
                <th>Fshiej</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $kategorite = merrKategorit();
            while ($kategoria = mysqli_fetch_assoc($kategorite)) {
                $kategoriaid = $kategoria['kategoriaid'];
                echo "<tr>";
                echo "<td>" . $kategoria['emri'] . "</td>";
                echo "<td>" . $kategoria['pershkrimi'] . "</td>";
                echo "<td><a href='shto_modifiko_kategori.php?kid={$kategoriaid}'> <i class='fas fa-edit'></i></a></td>";
                echo "<td><a href='fshijkategori.php?kid={$kategoriaid}'> <i class='far fa-trash-alt'></i></a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <a href="shto_modifiko_kategori.php" id="add_entity"><i class="fas fa-plus"></i> Shto Kategori</a>
</section>

<?php
include "inc/footer.php";

?>