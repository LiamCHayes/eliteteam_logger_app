<?php
    $name = ucfirst($_POST['name']);
    $date = date("Y-m-d");
    $grade = $_POST['grade'];
    $flash = $_POST['flash'];
    $zone = $_POST['zone'];

    // Database connection
    $conn = new mysqli('localhost', 'root', 'l4mlnMySQL', 'eliteteam');
    if ($conn->connect_error) {
        die('Connection Failed  :  '.$conn->connect_error);
    } else {
        // Get other params
        $qryteammembers = "SELECT L_teammembers_id FROM l_teammembers WHERE firstName='" .$name. "'";
        $result = $conn->query($qryteammembers);
        $L_teammembers_id = $result->fetch_array()[0] ?? '';
        $qryzone = "SELECT L_zone_id FROM l_zone WHERE zone='" .$zone. "'";
        $result = $conn->query($qryzone);
        $L_zone_id = $result->fetch_array()[0] ?? '';
        $qrysends = "SELECT sends_id FROM sends ORDER BY sends_id DESC LIMIT 1";
        $result = $conn->query($qrysends);
        $sends_id = $result->fetch_array()[0] ?? '';
        $sends_id = $sends_id + 1;

        // Log data
        $stmt = $conn->prepare("INSERT INTO sends(sends_id, date, grade, flash, L_zone_id, L_teammembers_id) VALUES(?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("isiiii", $sends_id, $date, $grade, $flash, $L_zone_id, $L_teammembers_id);
        $stmt->execute();
        echo "Success!";
        $stmt->close();
        $conn->close();
    }

    // Redirect back to log page (index.php)
    if ($flash == 0) {
        $ftype = 'sent';
    } else {
        $ftype = 'flashed';
    }
    session_start();
    $_SESSION['message'] = $name. ' ' .$ftype. ' a V' .$grade. ' on the ' .$zone;
    header('Location: index.php?success=1');
    exit;
?>