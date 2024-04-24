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
                      <span data-id="dashboard_view" class="btn btn-sm btn-outline-success permissionFunction" role="button" data-bs-toggle="button">View</span>
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
                      <span data-id="obstruction_view" class="btn btn-sm btn-outline-success permissionFunction" role="button" data-bs-toggle="button">View</span>
                    </div>
                    <div class="col">
                      <span data-id="obstruction_create" class="btn btn-sm btn-outline-success permissionFunction" role="button" data-bs-toggle="button">Create</span>
                    </div>
                    <div class="col">
                      <span data-id="obstruction_update" class="btn btn-sm btn-outline-success permissionFunction" role="button" data-bs-toggle="button">Update</span>
                    </div>
                    <div class="col">
                      <span data-id="obstruction_delete" class="btn btn-sm btn-outline-success permissionFunction" role="button" data-bs-toggle="button">Delete</span>
                    </div>
                  </div>
                  <div class="row mb-5">
                    <div class="col">
                      <strong>Haltes</strong>
                    </div>
                    <div class="col">
                      <span data-id="busstop_view" class="btn btn-sm btn-outline-success permissionFunction" role="button" data-bs-toggle="button">View</span>
                    </div>
                    <div class="col">
                      <span data-id="busstop_create" class="btn btn-sm btn-outline-success permissionFunction" role="button" data-bs-toggle="button">Create</span>
                    </div>
                    <div class="col">
                      <span data-id="busstop_update" class="btn btn-sm btn-outline-success permissionFunction" role="button" data-bs-toggle="button">Update</span>
                    </div>
                    <div class="col">
                      <span data-id="busstop_delete" class="btn btn-sm btn-outline-success permissionFunction" role="button" data-bs-toggle="button">Delete</span>
                    </div>
                  </div>
                  <div class="row mb-5">
                    <div class="col">
                      <strong>Werkorders</strong>
                    </div>
                    <div class="col">
                      <span data-id="workorder_view" class="btn btn-sm btn-outline-success permissionFunction" role="button" data-bs-toggle="button">View</span>
                    </div>
                    <div class="col">
                      <span data-id="workorder_view" class="btn btn-sm btn-outline-success permissionFunction" role="button" data-bs-toggle="button">Create</span>
                    </div>
                    <div class="col">
                      <span data-id="workorder_view" class="btn btn-sm btn-outline-success permissionFunction" role="button" data-bs-toggle="button">Update</span>
                    </div>
                    <div class="col">
                      <span data-id="workorder_view" class="btn btn-sm btn-outline-success permissionFunction" role="button" data-bs-toggle="button">Delete</span>
                    </div>
                  </div>
                </div>';
      $html .= '<div class="modal-footer">
                  <button id="updateBusstopData" class="btn btn-success float-end save">Opslaan <i class="bi bi-floppy"></i></button>
                </div>';
    }
  }

  echo $html;

?>