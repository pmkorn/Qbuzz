<?php

session_start();

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

include('conn/db.inc.php');
if (isset($_SESSION['employeeID'])) {
    $employeeID = $_SESSION['employeeID'];
    $sqlSelectEmployeeData = "SELECT * FROM employees WHERE employeeID = '$employeeID' LIMIT 1";
    if ($sqlResultSelectEmployeeData = mysqli_query($conn, $sqlSelectEmployeeData)) {
        while ($row = mysqli_fetch_array($sqlResultSelectEmployeeData)) {
            $employeeFirstName = $row['employeeFirstName'];
            $employeeLastName = $row['employeeLastName'];
            $employeeRole = $row['employeeRole'];
        }
    }
}

include('include/title.inc.php');

?>

<!DOCTYPE html>
<html lang="nl">

<head>

    <base href="/">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/bootstrap.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="css/bootstrap-icons.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="css/flag-icon.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="css/main.css?<?php echo time(); ?>">
    
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: space-around;
            margin-top: 30px;
        }

        .kolom {
            min-height: 300px;
            border: 2px dashed #ccc;
            border-radius: 5px;
            padding: 10px;
            background-color: #f9f9f9;
        }

        .kolom h2 {
            text-align: center;
        }

        .item {
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            color: white;
            cursor: move;
        }

        /* Kleurklassen */
        .groen { background-color: #4CAF50; }
        .oranje { background-color: #FF9800; }
        .rood { background-color: #F44336; }
    </style>

    <title>Qbuzz | Home</title>

</head>

<body class="bg-blue-touch">

    <header class="fixed-top">
        <?php include('include/navbar.inc.php'); ?>
    </header>

    <main class="main py-3">
        <div class="container">
            <div class="row">
                    <div id="kolom1" class="col kolom">
                        <h2>Gepland</h2>
                        <div class="item rood">Test 1</div>
                        <div class="item rood">Test 2</div>
                    </div>

                    <div id="kolom2" class="col kolom">
                        <h2>In behandeling</h2>
                    </div>

                    <div id="kolom3" class="col kolom">
                        <h2>Afgerond</h2>
                    </div>
            </div>
        </div>
    </main>

    <?php include('include/modals.php'); ?>

    <script src="js/bootstrap.bundle.js?<?php echo time(); ?>"></script>
    <script src="js/jquery-3.7.1.js?<?php echo time(); ?>"></script>
    <script src="js/functions.js?<?php echo time(); ?>"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
    <script>
        $(function() {
            // Maak items sleepbaar
            $(".item").draggable({
                revert: "invalid", // Terugvallen als het niet in een kolom wordt geplaatst
                helper: "clone",
                start: function(event, ui) {
                    $(this).css("opacity", "0.5");
                },
                stop: function(event, ui) {
                    $(this).css("opacity", "1");
                }
            });

            // Maak kolommen "dropzones"
            $(".kolom").droppable({
                accept: ".item",
                drop: function(event, ui) {
                    const item = ui.draggable.clone();
                    ui.draggable.remove();
                    $(this).append(item);
                    item.draggable({
                        revert: "invalid",
                        helper: "clone"
                    });

                    // Kleur aanpassen afhankelijk van kolom
                    if (this.id === "kolom1") {
                        item.removeClass().addClass("item rood");
                    } else if (this.id === "kolom2") {
                        item.removeClass().addClass("item oranje");
                    } else if (this.id === "kolom3") {
                        item.removeClass().addClass("item groen");
                    }
                }
            });
        });
    </script>

</body>

</html>