<!-- Vertical form options -->
<div class="row align-items-center h-100" style="margin:0;margin-top: 13px;">
  <div class="col-md-10 mx-auto">
  <form role="form" id="form-sales" method="POST" autocomplete="nope">
    <div class="card">
      <!-- <div class="loader-transparent rounded"></div> -->
      <div class="card-header d-flex bg-transparent border-bottom">
        <h5 class="card-title flex-grow-1 profile-header-title">SALES INFORMATION</h5> 
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
                <input type="text" class="form-control text-capitalize" id="txt-lname" name="txt-lname" autocomplete="nope" disabled required>
            </div>

            <div class="col-sm-4 form-group">
                <label for="tns-fname">Firstname</label>
                <input type="text" class="form-control text-capitalize" id="txt-fname" name="tns-fname" autocomplete="nope" disabled required>
            </div>

            <div class="col-sm-1 form-group">
                <label for="txt-mi">MI</label>
                <input type="text" class="form-control text-capitalize" id="txt-mi" maxlength='1' name="txt-mi" autocomplete="nope" disabled>
            </div> 

            <span class="float-right" style="padding: 0px;padding-top:27px;">
                <button type="button" class="btn btn-light" id="btn-client" data-toggle="modal" data-target="#modal-search-clients"><i class="icon-drawer-out"></i></button>
                <button type="button" class="btn btn-light" id="btn-addclient"><i class="icon-pencil3"></i></button>
            </span>

            <div class="col-sm-2 form-group">
                <label for="txt-saleid">Sale ID</label>
                <input type="text" class="form-control profile-code" id="txt-saleid" name="txt-saleid" autocomplete="nope" required readonly="true">
            </div>
        </div>

        <div class="row">                  
            <div class="col-sm-2 form-group">
              <label for="date-purdate">Purchase Date</label>
              <input type="text" class="form-control datepicker" data-mask="99/99/9999" placeholder="Pick a date&hellip;" id="date-purdate" name="date-purdate">
            </div>

            <div class="col-sm-2 form-group">
              <label for="sel-salestatus">Status</label>
              <select data-placeholder="&nbsp;" class="form-control select" data-fouc id="sel-salestatus" name="sel-salestatus" required>
                <option></option>
                <option value="Sold">Sold</option>
                <option value="Cancelled">Cancelled</option>
              </select>
            </div> 
            
            <div class="col-sm-1 form-group">
                <label for="txt-lotid">Lot ID</label>
                <input type="text" class="form-control text-capitalize" id="txt-lotid" maxlength='10' name="txt-lotid" autocomplete="nope" disabled>
            </div> 
            <div class="col-sm-1 form-group" style="padding: 0px;padding-top:27px;padding-right:0px;margin:0;">
                <button type="button" class="btn btn-light" id="btn-lotid"><i class="icon-drawer-out"></i></button>
            </div>

            <div class="col-sm-2 form-group">
                <label for="txt-catdescription">Lot Category</label>
                <input type="text" class="form-control" id="txt-catdescription" name="txt-catdescription" autocomplete="nope" disabled>
            </div>

            <div class="col-sm-2 form-group">
                <label for="txt-classname">Lot Class</label>
                <input type="text" class="form-control" id="txt-classname" name="txt-classname" autocomplete="nope" disabled>
            </div>  
            
            <div class="col-sm-1 form-group">
                <label for="txt-lotnum">Lot/Block</label>
                <input type="text" class="form-control" id="txt-lotnum" name="txt-lotnum" autocomplete="nope" disabled>
            </div> 
            
            <div class="col-sm-1 form-group">
                <label for="txt-letter">Lot Alp</label>
                <input type="text" class="form-control" id="txt-letter" name="txt-letter" autocomplete="nope" disabled>
            </div>             
        </div> 

        <div class="row">
            <div class="col-sm-4 form-group">
                <label for="txt-lname">Beneficiary Lastname</label>
                <input type="text" class="form-control text-capitalize" id="txt-blname" name="txt-lname" autocomplete="nope" required>
            </div>

            <div class="col-sm-4 form-group">
                <label for="tns-fname">Beneficiary Firstname</label>
                <input type="text" class="form-control text-capitalize" id="txt-bfname" name="tns-fname" autocomplete="nope" required>
            </div>

            <div class="col-sm-1 form-group">
                <label for="txt-mi">MI</label>
                <input type="text" class="form-control text-capitalize" id="txt-bmi" maxlength='1' name="txt-mi" autocomplete="nope">
            </div>

            <div class="col-sm-1 form-group">
            </div>

            <div class="col-sm-2 form-group">
              <label for="sel-relation">Relation</label>
              <select data-placeholder="&nbsp;" class="form-control select-search" id="sel-relation" name="sel-relation" required>
                <option></option>
                <?php
                    $relation = (new ControllerSales)->ctrRelationList();
                    foreach ($relation as $key => $value) {
                      echo '<option value="'.$value["relationdesc"].'">'.$value["relationdesc"].'</option>';
                    }
                 ?>
              </select>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4 form-group">
                <label for="txt-councilor">Councilor</label>
                <input type="text" class="form-control" id="txt-councilor" name="txt-councilor" value="" autocomplete="nope">
            </div>
            <div class="col-sm-1 form-group" style="padding: 0px;padding-top:27px;padding-right:0px;margin:0;">
                <button type="button" class="btn btn-light" id="btn-councilor"><i class="icon-drawer-out"></i></button>
            </div>            
        
            <div class="col-sm-2 form-group">
              <label for="date-certdate" style="color:hotpink;">Certified On</label>
              <input type="text" class="form-control datepicker" data-mask="99/99/9999" placeholder="Pick a date&hellip;" id="date-certdate" name="date-certdate">
            </div>

            <div class="col-sm-2 form-group">
                <label for="txt-certnum" style="color:hotpink;">Certification #</label>
                <input type="text" class="form-control" id="txt-certnum" name="txt-certnum" value="" autocomplete="nope">
            </div>

            <div class="col-sm-1 form-group">
                <label for="txt-scode" style="color:hotpink;">Sale #</label>
                <input type="text" class="form-control" id="txt-scode" name="txt-scode" value="" autocomplete="nope">
            </div>  
            
            <div class="col-sm-2 form-group">
                <label for="txt-salecode" style="color:hotpink;">Sale Code</label>
                <input type="text" class="form-control" id="txt-salecode" name="txt-salecode" value="" autocomplete="nope">
            </div>             
        </div>    

        <div class="row">
            <div class="col-sm-12 form-group">
                <label for="txt-remarks">Remarks</label>
                <input type="text" class="form-control" id="txt-remarks" name="txt-remarks" autocomplete="nope">
            </div>
        </div> 
        <div class="clearfix">
          <span class="float-left">
          </span>

          <input type="text" name="trans_type" id="trans_type" value="New" style="visibility:hidden;" required>
          <input type="hidden" id="num-id" name="num-id">

          <span class="float-right">
            <button type="button" class="btn btn-light btn-lg" id="btn-new"><i class="icon-file-text mr-2"></i> New</button>

            <button type="button" class="btn btn-light btn-lg" id="btn-search" data-toggle="modal" data-target="#modal-search-sales"><i class="icon-search4 mr-2"></i> Search</button>
           
            <button type="submit" class="btn btn-light btn-lg"><i class="icon-floppy-disk mr-2"></i> Save</button>
          </span>
        </div>     
      </div>  <!-- card body -->

    </div>
  </form>
  </div>
</div>

<div id="modal-search-clients" class="modal" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content" style="background-color: #343f53;">
      <div class="modal-header">
        <h5 class="modal-title profile-name"><i class="icon-menu7 mr-2"></i> &nbsp;CLIENT LIST</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="h-divider">
      </div>

      <!-- <div class="modal-body"> -->
          <table class="table datatable-scroll-y table-bordered table-striped table-hover datatable-responsive datatable-small-font profile-grid-header clientsTable" width="100%">
          <thead>
            <tr>
              <th>Lastname</th>
              <th>Firstname</th>
              <th>MI</th>
              <th>Address</th>
              <!-- <th>Landline</th>
              <th>Mobile</th>
              <th>E-mail</th> -->
            </tr>
          </thead>
          <tbody>
          <?php
            $clients = (new ControllerClients)->ctrShowEmployeesList();
            foreach ($clients as $key => $value) {
              echo '<tr idClient='.$value["id"].'>
                      <td>'.$value["lname"].'</td>
                      <td>'.$value["fname"].'</td>
                      <td>'.$value["mi"].'</td>
                      <td>'.$value["address"].'</td>
                    </tr>';
              }
          ?>
          </tbody>
        </table>
      <!-- </div> -->
    </div>
  </div>
</div>

<!-- ============== Sales List ============ -->
<div id="modal-search-sales" class="modal" tabindex="-1">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content" style="background-color: #343f53;">
      <div class="modal-header">
        <h5 class="modal-title profile-name"><i class="icon-menu7 mr-2"></i> &nbsp; SALES TRANSACTION LIST</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="h-divider">
      </div>
          <div class="row" pb-0 style="margin:10px;margin-bottom: 0px;">
            <div class="col-sm-3 form-group">
               <label for="lst-categorycode" id="lbl-lst-categorycode" style="color:aqua;">= &gt; Category</label>
               <select data-placeholder="< Select Category >" class="form-control select-search" id="lst-categorycode" name="lst-categorycode">
                <option></option>
                <?php
                  $category = (new ControllerLot)->ctrCategoryList();
                  foreach ($category as $key => $value) {
                    echo '<option value="'.$value["categorycode"].'">'.$value["catdescription"].'</option>';
                  }
                ?>
               </select>
            </div>

            <div class="col-sm-2 form-group">
               <label for="lst-classcode" id="lbl-lst-classcode" style="color:aqua;">= &gt; Classification</label>
               <select data-placeholder="< Select Class >" class="form-control select-search" id="lst-classcode" name="lst-classcode">
                <option></option>
                <?php
                  $classification = (new ControllerLot)->ctrClassificationList();
                  foreach ($classification as $key => $value) {
                    echo '<option value="'.$value["classcode"].'">'.$value["classname"].'</option>';
                  }
                ?>
               </select>
            </div>            

            <div class="col-sm-3 form-group">
              <div class="form-group" style="visibility:hidden;">
                <label>Date Range</label>
                <div class="input-group">
                  <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-calendar22"></i></span>
                  </span>
                  <input type="text" class="form-control daterange-basic" id="lst_date_range" name="lst_date_range" required> 
                </div>
              </div>
            </div>

            <div class="col-sm-2 form-group">
            </div>

            <div class="col-sm-2 form-group">
              <label for="lst-salestatus" id="lbl-lst-salestatus" style="color:aqua;">= &gt; Status</label>
              <select data-placeholder="< Select Status >" class="form-control select" data-fouc id="lst-salestatus" name="lst-salestatus" required>
                <option></option>
                <option value="Available">Available</option>
                <option value="Sold">Sold</option>
                <option value="Cancelled">Cancelled</option>
              </select>
            </div> 
          </div>  

          <!-- <div class="h-divider"></div> -->

          <table class="table table-hover table-bordered table-striped datatable-small-font profile-grid-header salesTransactionTable">
          <thead>
            <tr>
              <th style="min-width: 330px;">Client</th>
              <th style="min-width: 130px;">Date</th>
              <th style="min-width: 120px;">Lot ID</th>
              <th style="min-width: 140px;">Category</th>
              <th style="min-width: 330px;">Beneficiary</th>
              <th>Act</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
    </div>
  </div>
</div>


<script src="views/js/sales.js"></script>

