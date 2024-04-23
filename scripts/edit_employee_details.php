<?php

  $employeeID = $_POST['employeeID'];

  include('../includes/db.inc.php');

  $sql = "SELECT * FROM employees WHERE employeeID = '$employeeID'";
  if ($result = mysqli_query($conn, $sql)) {
    while ($row = mysqli_fetch_array($result)) {
      $html .= '<div class="modal-header">
                  <h5 class="modal-title">'.$row['employeeFirstName'].' '.$row['employeeLastName'].'</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>';
      $html .= '<div class="modal-body py-5">
                  <div class="row mb-5">
                    <div class="col">
                      <strong>Dashboard</strong>
                    </div>
                    <div class="col">
                      <button value="dashboard_view" class="btn btn-sm btn-outline-success" role="button" data-bs-toggle="button">View</button>
                    </div>
                    <div class="col">

                    </div>
                    <div class="col">

                    </div>
                    <div class="col">

                    </div>
                  </div>
                  <div class="row mb-5">
                    <div class="col">
                      <strong>Stremmingen</strong>
                    </div>
                    <div class="col">
                      <button value="obstruction_view" class="btn btn-sm btn-outline-success" role="button" data-bs-toggle="button">View</button>
                    </div>
                    <div class="col">
                      <button value="obstruction_create" class="btn btn-sm btn-outline-success" role="button" data-bs-toggle="button">Create</button>
                    </div>
                    <div class="col">
                      <button value="obstruction_update" class="btn btn-sm btn-outline-success" role="button" data-bs-toggle="button">Update</button>
                    </div>
                    <div class="col">
                      <button value="obstruction_delete" class="btn btn-sm btn-outline-success" role="button" data-bs-toggle="button">Delete</button>
                    </div>
                  </div>
                  <div class="row mb-5">
                    <div class="col">
                      <strong>Haltes</strong>
                    </div>
                    <div class="col">
                      <button value="busstop_view" class="btn btn-sm btn-outline-success" role="button" data-bs-toggle="button">View</button>
                    </div>
                    <div class="col">
                      <button value="busstop_create" class="btn btn-sm btn-outline-success" role="button" data-bs-toggle="button">Create</button>
                    </div>
                    <div class="col">
                      <button value="busstop_update" class="btn btn-sm btn-outline-success" role="button" data-bs-toggle="button">Update</button>
                    </div>
                    <div class="col">
                      <button value="busstop_delete" class="btn btn-sm btn-outline-success" role="button" data-bs-toggle="button">Delete</button>
                    </div>
                  </div>
                  <div class="row mb-5">
                    <div class="col">
                      <strong>Werkorders</strong>
                    </div>
                    <div class="col">
                      <button value="workorder_view" class="btn btn-sm btn-outline-success" role="button" data-bs-toggle="button">View</button>
                    </div>
                    <div class="col">
                      <button value="workorder_view" class="btn btn-sm btn-outline-success" role="button" data-bs-toggle="button">Create</button>
                    </div>
                    <div class="col">
                      <button value="workorder_view" class="btn btn-sm btn-outline-success" role="button" data-bs-toggle="button">Update</button>
                    </div>
                    <div class="col">
                      <button value="workorder_view" class="btn btn-sm btn-outline-success" role="button" data-bs-toggle="button">Delete</button>
                    </div>
                  </div>
                </div>';
      $html .= '<div class="modal-footer">
                  <button id="updateBusstopData" class="btn btn-success float-end">Opslaan <i class="bi bi-floppy"></i></button>
                </div>';
    }
  }

  echo $html;

?>