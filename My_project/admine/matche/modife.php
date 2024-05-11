<script>
    let x = 1;
    let y = 1;
    let z = 1;
    let w = 1;
</script>
<?php
$id_matche = $_POST["id"];
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'matchbooking';
$conn = new mysqli($host, $user, $pass, $db);
if (isset($_POST["idae"])) {
    $far9a1 = isset($_POST['far9a1']) ? $_POST['far9a1'] : '';
    $far9a2 = isset($_POST['far9a2']) ? $_POST['far9a2'] : '';
    $tirane = isset($_POST['tirane']) ? $_POST['tirane'] : '';


    $lwa9ete = isset($_POST['lwa9ete']) ? $_POST['lwa9ete'] : '';
if ($lwa9ete != '') {
    $timestamp = strtotime($lwa9ete);
}






    $sql1 = "SELECT id FROM équipe WHERE team_name = '{$far9a1}'";
    $rs1 = $conn->query($sql1);
    $tr1 = false;
    if ($rs1->num_rows > 0) {
        $row1 = $rs1->fetch_assoc();
        $updat1 = "UPDATE matche SET FIRST_team_id = '{$row1["id"]}' WHERE id = '{$id_matche}'";
        $tr1 = $conn->query($updat1);
    } else {
        echo '<script>
                     x = 0 ;
                    </script>';
    }

    $sql2 = "SELECT id FROM équipe WHERE team_name = '{$far9a2}'";
    $rs2 = $conn->query($sql2);
    $tr2 = false;
    if ($rs2->num_rows > 0) {
        $row2 = $rs2->fetch_assoc();
        $updat2 = "UPDATE matche SET second_team_id = '{$row2["id"]}' WHERE id = '{$id_matche}'";
        $tr2 = $conn->query($updat2);
    } else {
        echo '<script>
                     y = 0 ;
                    </script>';
    }

    $sql3 = "SELECT id FROM stadium WHERE name = '{$tirane}'";
    $rs3 = $conn->query($sql3);
    $tr3 = false;
    if ($rs3->num_rows > 0) {
        $row3 = $rs3->fetch_assoc();
        $updat3 = "UPDATE matche SET stadium_id = '{$row3["id"]}' WHERE id = '{$id_matche}'";
        $tr3 = $conn->query($updat3);
    } else {
        
    }

    $tr4 = false;
    $sql4 = "UPDATE matche SET match_time = '{$lwa9ete}' WHERE id = '{$id_matche}'";
    $result4 = $conn->query($sql4);
    if ($result4) {
        $tr4 = true;
    } else {
        echo '<script>
        w = 0 ;
       </script>';

    }
    if ($tr1 === TRUE && $tr2 === TRUE && $tr3 === TRUE && $tr4 === TRUE) {
        echo "<script>window.location.href = 'index.php';</script>";
    }

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="POST">
        <span id="S1"></span><br>
        far9e 1 ; <input type="text" id="1" name="far9a1"><br>
        <span id="S2"></span><br>
        far9a 2 ; <input type="text" id="2" name="far9a2"><br>
        <span id="S3"></span><br>
        tirane ; <input type="text" id="3" name="tirane"><br>
        <span id="S3"></span><br>
        lwa9ete ; <input type="datetime" id="4" name="lwa9ete"><br>
        <?php
        echo '<input type="hidden" name = "id" value="' . $id_matche . '">';
        ?>

        <input type="submit" name="idae">
    </form>
    <?php
    $sql = "SELECT au.id , e.team_name , eu.team_name as teme2 , a.name , au.match_time 
FROM matche au 
JOIN équipe e ON e.id = au.FIRST_team_id 
JOIN équipe eu ON eu.id = au.second_team_id 
JOIN stadium a on a.id = au.stadium_id;";
    $rs = $conn->query($sql);


    if ($rs && $rs->num_rows > 0) {
        while ($row = $rs->fetch_assoc()) {
            echo '<script>
    document.getElementById("1").value = "' . $row["team_name"] . '"
    document.getElementById("2").value = "' . $row["teme2"] . '"
    document.getElementById("3").value = "' . $row["name"] . '"
    document.getElementById("4").value = "' . $row["match_time"] . '"
</script>';
        }
    }
    echo $id_matche ;
    ?>

    <script>
        if (x == 0) {
            document.getElementById("S1").innerText = "La toujede fari9e fari9e bi hada le 2isame";
        }
        if (y == 0) {
            document.getElementById("S2").innerText = "La toujede fari9e fari9e bi hada le 2isame";
        }
        if (z == 0) {
            document.getElementById("S3").innerText = "La youjade teran bi hada le2isem";
        }
        if (w == 0) {
            document.getElementById("S4").innerText = "Error updating match time: ";
        }
    </script>;

</body>

</html>