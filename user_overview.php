<?php

include('includes/db.inc.php');

//Get all users info for table output
$sqlAllEmployees = "SELECT * FROM employees";
if ($sqlResultAllEmployees = mysqli_query($conn, $sqlAllEmployees)) {
    $employeeTableOutput .= '
                            <table class="table table-bordered table-hover table-striped">
                            <thead>
                              <tr>
                                <th>Naam</th>
                                <th>Sinds</th>
                                <th>Laatste login</th>
                                <th>Status</th>
                              </tr>
                            </thead>
                            ';
  while ($row = mysqli_fetch_array($sqlResultAllEmployees)) {
    $employeeTableOutput .= '
                              <tr>
                                <td>'.$row['employeeFirstName'].' '.$row['employeeLastName'].'</td>
                                <td>'.$row['employeeSignUpDate'].'</td>
                                <td>'.$row['employeeLastLogin'].'</td>
                                <td>
                                  <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" data-on-text="active" data-off-text="inactive" checked>
                                    <label class="form-check-label" for="flexSwitchCheckChecked"><span class="badge bg-success">Active</span></label>
                                  </div>                                  
                                </td>
                              </tr>                            
                            ';
  }
  $employeeTableOutput .= '
                            </tbody>
                          </table>
                          ';
}

echo $employeeTableOutput;

?>