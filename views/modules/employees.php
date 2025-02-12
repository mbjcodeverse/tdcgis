<!-- Vertical form options -->
<div class="row align-items-center h-100" style="margin:0;margin-top: 13px;">
  <div class="col-md-10 mx-auto">
  <form role="form" id="form-employee" method="POST" autocomplete="nope">
    <div class="card">
      <!-- <div class="loader-transparent rounded"></div> -->
      <div class="card-header d-flex bg-transparent border-bottom">
        <h5 class="card-title flex-grow-1 profile-header-title">EMPLOYEE INFORMATION</h5> 
        <div class="header-elements">
          <div class="list-icons">
            <a class="list-icons-item" data-action="collapse"></a>
            <a class="list-icons-item" data-action="reload"></a>
            <a class="list-icons-item" data-action="remove"></a>
          </div>
        </div>
      </div>

      <div class="card-body">
        <div class="row">
            <div class="col-sm-4 form-group">
                <label for="txt-lname">Lastname</label>
                <input type="text" class="form-control text-capitalize" id="txt-lname" name="txt-lname" autocomplete="nope" required>
            </div>

            <div class="col-sm-4 form-group">
                <label for="tns-fname">Firstname</label>
                <input type="text" class="form-control text-capitalize" id="tns-fname" name="tns-fname" autocomplete="nope" required>
            </div>

            <div class="col-sm-1 form-group">
                <label for="txt-mi">MI</label>
                <input type="text" class="form-control text-capitalize" id="txt-mi" maxlength='1' name="txt-mi" autocomplete="nope">
            </div>                                            

            <div class="col-md-1 form-group">
                <label class="d-block font-weight-semibold">Status</label>
                <div class="custom-control custom-checkbox custom-control-inline">
                  <input type="checkbox" class="custom-control-input" id="chk-isactive" name="chk-isactive" value="1" checked>
                  <label class="custom-control-label" for="chk-isactive">Active</label>
                </div>
            </div>

            <div class="col-sm-2 form-group">
                <label for="txt-empid">Emp Code</label>
                <input type="text" class="form-control profile-code" id="txt-empid" name="txt-empid" autocomplete="nope" required readonly="true">
            </div>
        </div>

        <div class="row">                  
            <div class="col-sm-2 form-group">
              <label for="date-bday">B-Day</label>
              <input type="text" class="form-control datepicker" data-mask="99/99/9999" placeholder="Pick a date&hellip;" id="date-bday" name="date-bday">
            </div>

            <div class="col-sm-2 form-group">
              <label for="sel-gender">Gender</label>
              <select data-placeholder="Select Gender" class="form-control select" data-fouc id="sel-gender" name="sel-gender" required>
                <option></option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
            </div>
            
            <div class="col-sm-8 form-group">
                <label for="tns-address">Address</label>
                <input type="text" class="form-control" id="tns-address" name="tns-address" autocomplete="nope">
            </div>
        </div> 

        <div class="row">
            <div class="col-sm-4 form-group">
              <label for="sel-position">Designation</label>
              <select class="form-control select-search" id="sel-position" name="sel-position" required>
                <option value="" selected hidden disabled>Select Position</option>
                <?php
                    $position = (new ControllerEmployees)->ctrShowPosition();
                    foreach ($position as $key => $value) {
                      echo '<option value="'.$value["id"].'">'.$value["positiondesc"].'</option>';
                    }
                 ?>
              </select>
            </div>

            <div class="col-sm-4 form-group">
                <label for="num-mobile">Mobile #</label>
                <input type="text" class="form-control" id="num-mobile" name="num-mobile" value="" autocomplete="nope">
            </div>

            <div class="col-sm-4 form-group">
              <label for="sel-estatus">Status</label>
              <select data-placeholder="Select Status" class="form-control select" data-fouc id="sel-estatus" name="sel-estatus" required>
                <option></option>
                <option value="Regular">Regular</option>
                <option value="Probationary">Probationary</option>
                <option value="Contractual">Contractual</option>
              </select>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-3 form-group">
                <label for="num-sssno">SSS ID</label>
                <input type="text" class="form-control" id="num-sssno" name="num-sssno" autocomplete="nope">
            </div>
            <div class="col-sm-3 form-group">
                <label for="num-phino">PhilHealth ID</label>
                <input type="text" class="form-control" id="num-phino" name="num-phino" autocomplete="nope">
            </div>  
            <div class="col-sm-3 form-group">
                <label for="num-pagibig">Pag-ibig ID</label>
                <input type="text" class="form-control" id="num-pagibig" name="num-pagibig" autocomplete="nope">
            </div>                                            
            <div class="col-sm-3 form-group">
                <label for="num-tin">TIN</label>
                <input type="text" class="form-control" id="num-tin" name="num-tin" autocomplete="nope">
            </div>
        </div> 
        <div class="clearfix">
          <span class="float-left">
          </span>

          <input type="text" name="trans_type" id="trans_type" value="New" style="visibility:hidden;" required>
          <input type="hidden" id="num-id" name="num-id">

          <span class="float-right">
            <button type="button" class="btn btn-light btn-lg" id="btn-new" onClick="location.href='employees'"><i class="icon-file-text mr-2"></i> New</button>

            <button type="button" class="btn btn-light btn-lg" id="btn-search" data-toggle="modal" data-target="#modal-search-employees"><i class="icon-search4 mr-2"></i> Search</button>
           
            <button type="submit" class="btn btn-light btn-lg"><i class="icon-floppy-disk mr-2"></i> Save</button>
          </span>
        </div>     
      </div>  <!-- card body -->

    </div>
  </form>
    <?php
      $createEmployee = new ControllerEmployees();
      $createEmployee -> ctrCreateEmployee();

      $editEmployee = new ControllerEmployees();
      $editEmployee -> ctrEditEmployee();
    ?>
  </div>
</div>

<div id="modal-search-employees" class="modal" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content" style="background-color: #343f53;">
      <div class="modal-header">
        <h5 class="modal-title profile-name"><i class="icon-menu7 mr-2"></i> &nbsp;EMPLOYEE LIST</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="h-divider">
      </div>

      <!-- <div class="modal-body"> -->
          <table class="table datatable-scroll-y table-bordered table-striped table-hover datatable-responsive datatable-small-font profile-grid-header employeesTable" width="100%">
          <thead>
            <tr>
              <th>Lastname</th>
              <th>Firstname</th>
              <th>MI</th>
              <th>Position</th>
              <th>Mobile</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
          <?php
            $employees = (new ControllerEmployees)->ctrShowEmployeesPosition();
            foreach ($employees as $key => $value) {
              echo '<tr idEmployee='.$value["id"].'>
                      <td>'.$value["lname"].'</td>
                      <td>'.$value["fname"].'</td>
                      <td>'.$value["mi"].'</td>
                      <td>'.$value["positiondesc"].'</td>
                      <td>'.$value["mobile"].'</td>
                      <td>'.$value["estatus"].'</td>
                    </tr>';
              }
          ?>
          </tbody>
        </table>
      <!-- </div> -->

    </div>
  </div>
</div>

<script src="views/js/employees.js"></script>

