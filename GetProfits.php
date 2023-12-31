<?php

    include_once("./db_Connection.php");

    header("Content-Type: application/json");

    $inputJSON = file_get_contents('php://input');
    $input = json_decode($inputJSON, true);

    $year = $input['year'];
    $month = $input['month'];
    $day = $input['day'];

    if ($year && $month && $day) {
        $get = $connect -> prepare("SELECT * FROM profits WHERE Date = ? ");
        $get -> execute([$year .'-'. $month .'-'. $day]);

        print json_encode($get -> fetchAll(PDO::FETCH_ASSOC));
    }
    elseif ($year && $month) {
        $get = $connect -> prepare("SELECT * FROM profits WHERE YEAR(Date) = ? AND MONTH(Date) = ? ");
        $get -> execute([$year, $month]);

        print json_encode($get -> fetchAll(PDO::FETCH_ASSOC));
    }
    else {
        $get = $connect -> prepare("SELECT * FROM profits WHERE YEAR(Date) = ? ");
        $get -> execute([$year]);

        print json_encode($get -> fetchAll(PDO::FETCH_ASSOC));
    };
?>