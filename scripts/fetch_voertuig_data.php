<?php
    
    
    $voertuigOutput = '';

    include('../conn/db.inc.php');

    if(isset($_POST['voertuigConsessieCode'])) {

        $sqlVoertuigen = "SELECT * FROM voertuigen";
    
        if ($sqlResultVoertuigen = mysqli_query($conn, $sqlVoertuigen)) {
            while ($row = mysqli_fetch_array($sqlResultVoertuigen)) {
                $voertuigOutput .= '<tr>';
                if ($row['voertuigStatus'] == '1') {
                    $voertuigOutput .= '<td>
                                                <div class="dots" data-bs-toggle="modal" data-bs-target="#voertuigInzet" data-nummer="' . $row['voertuigNummer'] . '"> 
                                                    <span class="dot dot-success"></span>
                                                    <span class="dot"></span>
                                                    <span class="dot"></span>
                                                </div>
                                            </td>';
                } else if ($row['voertuigStatus'] == '2') {
                    $voertuigOutput .= '<td>
                                                <div class="dots" data-bs-toggle="modal" data-bs-target="#voertuigInzet" data-nummer="' . $row['voertuigNummer'] . '">
                                                    <span class="dot"></span>
                                                    <span class="dot dot-warning"></span>
                                                    <span class="dot"></span>
                                                </td>
                                            </td>';
                } else if ($row['voertuigStatus'] == '3') {
                    $voertuigOutput .= '<td>
                                                <div class="dots" data-bs-toggle="modal" data-bs-target="#voertuigInzet" data-nummer="' . $row['voertuigNummer'] . '">
                                                    <span class="dot"></span>
                                                    <span class="dot"></span>
                                                    <span class="dot dot-danger"></span>
                                                </td>
                                            </td>';
                } else {
                    $voertuigOutput .= '<td>
                                                <div class="dots" data-bs-toggle="modal" data-bs-target="#voertuigInzet" data-nummer="' . $row['voertuigNummer'] . '">
                                                    <span class="dot"></span>
                                                    <span class="dot"></span>
                                                    <span class="dot"></span>
                                                </td>
                                            </td>';
                }
                $voertuigOutput .= '<td><span class="badge text-bg-dark">' . $row['voertuigNummer'] . '</span></td>';
                $voertuigOutput .= '<td>' . $row['voertuigMerk'] . ' ' . $row['voertuigType'] . '</span></td>';
                if ($row['voertuigKenteken'] == '') {
                    $voertuigOutput .= '<td></td>';
                } else {
                    $voertuigOutput .= '<td><span class="kenteken">' . $row['voertuigKenteken'] . '</td>';
                }
                $voertuigOutput .= '<td>' . $row['voertuigConsessieCode'] . '</td>';
                $voertuigOutput .= '</tr>';
            }
        }
        if(isset($_POST['voertuigConsessieCode'])) {
            $voertuigConsessieCode = implode("','", $_POST['voertuigConsessieCode']);
        $sqlResultVoertuigen .= "AND voertuigConsessieCode = '$voertuigConsessieCode'";
        }
        
        echo $voertuigOutput;
    }

?>