<?php
session_start();
$dbconn;
dbConnection();
function dbConnection()
{
    global $dbconn;
    $dbconn = mysqli_connect("localhost", 'root', '', 'rentacar');
    if (!$dbconn) {
        die("Deshtoi lidhja me DB" . mysqli_error($dbconn));
    }
}
function login($email, $fjalekalimi)
{
    global $dbconn;
    $sql = "SELECT perdoruesiid, emri, mbiemri, role FROM perdoruesit ";
    $sql .= " WHERE email='$email' AND fjalekalimi='$fjalekalimi'";
    $res = mysqli_query($dbconn, $sql);
    if (mysqli_num_rows($res) == 1) {
        $userData = mysqli_fetch_assoc($res);
        $user = array();
        $user['perdoruesiid'] = $userData['perdoruesiid'];
        $user['emrimbiemri'] = $userData['emri'] . " " . $userData['mbiemri'];
        $user['role'] = $userData['role'];
        $_SESSION['user'] = $user;
    
        header("Location: index.php");
    } else {
        echo "Nuk ka perdorues me keto shenime";
    }
}
function merrPerdoruesit()
{
    global $dbconn;
    $sql = "SELECT perdoruesiid, emri, mbiemri, email, telefoni FROM perdoruesit";
    return mysqli_query($dbconn, $sql);
}
function merrPerdoruesId($pid)
{
    global $dbconn;
    $sql = "SELECT perdoruesiid, emri, mbiemri, email, telefoni,role,fjalekalimi,nrpersonal FROM perdoruesit";
    $sql .= " WHERE perdoruesiid=$pid";
    $res = mysqli_query($dbconn, $sql);
    return mysqli_fetch_assoc($res);
}
function shtoPerdorues($emri, $mbiemri, $role, $nrpersonal, $telefoni, $email, $fjalekalimi)
{
    global $dbconn;
    $sql = "INSERT INTO perdoruesit(emri, mbiemri, email, fjalekalimi, telefoni, nrpersonal, role) VALUES ";
    $sql .= "('$emri', '$mbiemri', '$email', '$fjalekalimi', '$telefoni', '$nrpersonal', '$role')";
    $res = mysqli_query($dbconn, $sql);
    if ($res) {
        $_SESSION['message'] = "Perdoruesi u shtua me sukses";
        header("Location: perdoruesit.php");
    } else {
        die("Deshtoi shtimi i perdoruesit" . mysqli_error($dbconn));
    }
}
function modifikoPerdorues($perdoruesiid, $emri, $mbiemri, $role, $nrpersonal, $telefoni, $email, $fjalekalimi)
{
    global $dbconn;
    $sql = "UPDATE perdoruesit SET emri='$emri', mbiemri='$mbiemri', email='$email' ,";
    $sql .= "fjalekalimi='$fjalekalimi', telefoni='$telefoni', nrpersonal='$nrpersonal'";
    $sql .= ", role='$role' WHERE perdoruesiid=$perdoruesiid ";
    $res = mysqli_query($dbconn, $sql);
    if ($res) {
        $_SESSION['message'] = "Perdoruesi u modifukua me sukses";
        header("Location: perdoruesit.php");
    } else {
        die("Deshtoi modifikimi i perdoruesit" . mysqli_error($dbconn));
    }
}
function fshijperdorues($perdoruesiid)
{
    global $dbconn;
    $sql = "DELETE FROM perdoruesit WHERE perdoruesiid=$perdoruesiid";
    $perdoruesi = mysqli_query($dbconn, $sql);
    if ($perdoruesi) {
        $_SESSION['mesazhi'] ="Perdoruesi u fshi me sukses";
        header("Location: perdoruesit.php");
    } else {
        die("Deshtoi fshirja e perdoruesit " . mysqli_error($dbconn));
    }
}
/**Funksionet per rezervime */

function merrRezervimet()
{

    global $dbconn;
    $sql="SELECT r.rezervimiid,CONCAT(k.emri,' ',k.mbiemri) as emrimbiemri, a.emri,r.dataemarrjes,r.dataekthimit
    FROM klientet k INNER JOIN rezervimet r ON k.klientiid=r.klientiid INNER JOIN automjetet a On r.automjetiid=a.automjetiid";
    $sql .= " ORDER BY r.rezervimiid DESC";
    return mysqli_query($dbconn, $sql);
    $perdoruesiid=$_SESSION['perdoruesi']['perdoruesiid'];
    if($_SESSION['perdoruesi']['role']!=1){
        $sql.=" WHERE perdoruesiid=$perdoruesiid";
    }
    return mysqli_query($dbconn, $sql);
}
function merrRezervimId($rezervimiid)
{
    global $dbconn;
    $sql = "SELECT r.rezervimiid,a.automjetiid, a.emri,k.klientiid, CONCAT(k.emri,' ',k.mbiemri) AS emrimbiemri, r.dataemarrjes, r.dataekthimit";
    $sql .= " FROM rezervimet r INNER JOIN automjetet a  ON a.automjetiid=r.automjetiid INNER JOIN klientet k ON r.klientiid=k.klientiid";
    $sql .= " WHERE rezervimiid=$rezervimiid";
    $res = mysqli_query($dbconn, $sql);
    return mysqli_fetch_assoc($res);
}
function shtoRezervim($klientiid, $automjetiid, $dataemarrjes, $dataekthimit)
{
    global $dbconn;
    
    $perdoruesiid=$_SESSION['user']['perdoruesiid'];
    $sql = "INSERT INTO rezervimet(klientiid, automjetiid, perdoruesiid, dataemarrjes, dataekthimit) VALUES ";
    $sql .= "('$klientiid', '$automjetiid', '$perdoruesiid', '$dataemarrjes', '$dataekthimit')";
    $res = mysqli_query($dbconn, $sql);
    if ($res) {
        $_SESSION['message'] = "Rezervimi u shtua me sukses";
        header("Location: rezervimet.php");
    } else {
        die("Deshtoi shtimi i rezervimit" . mysqli_error($dbconn));
    }
}
function modifikoRezervim($rezervimiid, $klientiid, $automjetiid, $dataemarrjes, $dataekthimit)
{
    global $dbconn;

    $perdoruesiid = $_SESSION['user']['perdoruesiid'];
    $sql = "UPDATE rezervimet  SET klientiid='$klientiid', automjetiid='$automjetiid', perdoruesiid='$perdoruesiid',";
    $sql .= " dataemarrjes='$dataemarrjes', dataekthimit='$dataekthimit' WHERE rezervimiid=$rezervimiid ";
    $res = mysqli_query($dbconn, $sql);
    if ($res) {
        $_SESSION['message'] = "Rezervimi u modifiku me sukses";
        header("Location: rezervimet.php");
    } else {
        die("Deshtoi modifikimi i rezervimit" . mysqli_error($dbconn));
    }
}
function fshijrezervime($rezervimiid)
{
    global $dbconn;
    $sql = "DELETE FROM rezervimet WHERE rezervimiid=$rezervimiid";
    $rezervimi = mysqli_query($dbconn, $sql);
    if ($rezervimi) {
        $_SESSION['mesazhi'] ="Rezervimi u fshi me sukses";
        header("Location: rezervimet.php");
    } else {
        die("Deshtoi fshirja e Rezervimi " . mysqli_error($dbconn));
    }
}


/**Funksionet per Klient */
/** */
function merrKlientet()
{
    global $dbconn;
    $sql = "SELECT * FROM klientet";
    return mysqli_query($dbconn, $sql);
}

//Funksionet per kategorite

function merrKategorit()
{
    global $dbconn;
    $sql = "SELECT * FROM kategorit";
    return mysqli_query($dbconn, $sql);
}


function merrKategoriId($kid)
{
    global $dbconn;
    $sql = "SELECT kategoriaid, emri, pershkrimi FROM kategorit";
    $sql .= " WHERE kategoriaid=$kid";
    $res = mysqli_query($dbconn, $sql);
    return mysqli_fetch_assoc($res);
}
function shtokategorite($emri, $pershkrimi)
{
    global $dbconn;
    $sql = "INSERT INTO kategorit(emri, pershkrimi) VALUES ";
    $sql .= "('$emri', '$pershkrimi')";
    $res = mysqli_query($dbconn, $sql);
    if ($res) {
        $_SESSION['message'] = "Kategoria u shtua me sukses";
        header("Location: kategorit.php");
    } else {
        die("Deshtoi shtimi i kategorise" . mysqli_error($dbconn));
    }
}
function modifikoKategori($kategoriaid, $emri, $pershkrimi)
{
    global $dbconn;
    $sql = "UPDATE kategorit SET emri='$emri', pershkrimi='$pershkrimi' WHERE kategoriaid=$kategoriaid";
    $res = mysqli_query($dbconn, $sql);
    if ($res) {
        $_SESSION['message'] = "Kategoria u modifikua me sukses";
        header("Location: kategorit.php");
    } else {
        die("Deshtoi modifikimi i kategoris" . mysqli_error($dbconn));
    }
}

function fshijKategorit($kategoriaid)
{
    global $dbconn;
    $sql = "DELETE FROM kategorit WHERE kategoriaid= $kategoriaid ";
    $res = mysqli_query($dbconn, $sql);
    if ($res) {
        $_SESSION['message'] = "Kategoria u fshi me sukses";
        header("Location: kategorit.php");
    } else {
        die("Deshtoi fshirja e kategoris" . mysqli_error($dbconn));
    }
}


//Funksionet per automjetet

function merrAutomjet()
{
    global $dbconn;
    $sql = "SELECT a.automjetiid,a.emri,k.emri AS katemri,a.nrregjistrimi,a.pershkrimi,k.kostoja
    FROM automjetet a INNER JOIN kategorit k ON a.kategoriaid=k.kategoriaid";
    return mysqli_query($dbconn, $sql);
}

function merrAutomjetId($aid)
{
    global $dbconn;
    $sql = "SELECT automjetiid, emri, kategoriaid, nrregjistrimi, pershkrimi FROM automjetet";
    $sql .= " WHERE automjetiid=$aid";
    $res = mysqli_query($dbconn, $sql);
    return mysqli_fetch_assoc($res);
}

function shtoAutomjet($emri, $kategoriaid,$nrregjistrimi,$pershkrimi)
{
    global $dbconn;
    $sql = "INSERT INTO automjetet(emri, kategoriaid, nrregjistrimi, pershkrimi) VALUES ";
    $sql .= "('$emri', '$kategoriaid','$nrregjistrimi','$pershkrimi')";
    $res = mysqli_query($dbconn, $sql);
    if ($res) {
        $_SESSION['message'] = "Automjeti u shtua me sukses";
        header("Location: automjetet.php");
    } else {
        die("Deshtoi shtimi i automjatit" . mysqli_error($dbconn));
    }
}
function modifikoAutomjet($automjetiid, $emri, $kategoriaid, $nrregjistrimi, $pershkrimi)
{
    global $dbconn;
    $sql = "UPDATE automjetet SET emri='$emri', kategoriaid='$kategoriaid', nrregjistrimi='$nrregjistrimi', pershkrimi='$pershkrimi' WHERE automjetiid=$automjetiid";
    $res = mysqli_query($dbconn, $sql);
    if ($res) {
        $_SESSION['message'] = "Automjeti u modifikua me sukses";
        header("Location: automjetet.php");
    } else {
        die("Deshtoi modifikimi i automjetit" . mysqli_error($dbconn));
    }
}


function fshijAutomjete($automjetiid)
{
    global $dbconn;
    $sql = "DELETE FROM automjetet WHERE automjetiid= $automjetiid ";
    $res = mysqli_query($dbconn, $sql);
    if ($res) {
        $_SESSION['message'] = "Automjeti u fshi me sukses";
        header("Location: automjetet.php");
    } else {
        die("Deshtoi fshirja e automjetit" . mysqli_error($dbconn));
    }
}