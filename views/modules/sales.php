<!-- Vertical form options -->
<div class="row align-items-center h-100" style="margin:0;margin-top: 13px;;">
  <div class="col-md-10 mx-auto">
  <form role="form" id="form-sales" method="POST" autocomplete="nope">
    <div class="card" style="border:1px solid rgba(255, 255, 255, 0.1);box-shadow: 10px 10px 30px rgba(0, 0, 0, 0.7); border-radius: 10px;">
      <!-- <div class="loader-transparent rounded"></div> -->
      <div class="card-header d-flex bg-transparent border-bottom" style="border:1px solid rgba(255, 255, 255, 0.3);box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.5); border-radius: 10px;">
        <h5 class="card-title flex-grow-1 profile-header-title">SALES INFORMATION</h5> 
        <!-- Transaction type (New / Update) -->
        <input type="hidden" name="trans_type" id="trans_type" value="New" required>
        <input type="hidden" id="txt-clientid" name="txt-clientid" required>
        <input type="hidden" id="sales-access" name="sales-access" value="<?php echo $_SESSION["sales"];?>">
        <div class="header-elements">
          <div class="list-icons">
            <a class="list-icons-item" data-action="collapse"></a>
            <!-- <a class="list-icons-item" data-action="reload"></a> -->
            <a class="list-icons-item" data-action="remove"></a>
          </div>
        </div>
      </div>

      <div class="card-body">
        <div class="row">
            <div class="col-sm-4 form-group" style="margin-bottom: 8px;">
                <label for="txt-lname">Lastname</label>
                <input type="text" class="form-control text-capitalize" id="txt-lname" name="txt-lname" autocomplete="nope" required readonly="true">
            </div>

            <div class="col-sm-4 form-group" style="margin-bottom: 8px;">
                <label for="tns-fname">Firstname</label>
                <input type="text" class="form-control text-capitalize" id="txt-fname" name="tns-fname" autocomplete="nope" required readonly="true">
            </div>

            <div class="col-sm-1 form-group" style="margin-bottom: 8px;">
                <label for="txt-mi">MI</label>
                <input type="text" class="form-control text-capitalize" id="txt-mi" maxlength='1' name="txt-mi" autocomplete="nope" readonly="true">
            </div> 

            <div class="col-sm-1 form-group" style="margin-bottom: 8px;">
              <div class="d-flex justify-content-end" style="padding-top: 27px;">
                  <button type="button" class="btn btn-light mr-1" id="btn-client" data-toggle="modal" data-target="#modal-search-clients">
                      <i class="icon-drawer-out"></i>
                  </button>
                  <button type="button" class="btn btn-light" id="btn-addclient">
                      <i class="icon-pencil3"></i>
                  </button>
              </div>
            </div>

            <!-- <div class="col-sm-1 form-group">
            <span class="float-right" style="padding: 0px;padding-top:27px;">
                <button type="button" class="btn btn-light btn-sm" id="btn-client" data-toggle="modal" data-target="#modal-search-clients"><i class="icon-drawer-out"></i></button>
                <button type="button" class="btn btn-light btn-sm" id="btn-addclient"><i class="icon-pencil3"></i></button>
            </span>
            </div> -->

            <div class="col-sm-2 form-group" style="margin-bottom: 8px;">
                <label for="txt-saleid">Sale ID</label>
                <input type="text" class="form-control profile-code" id="txt-saleid" name="txt-saleid" autocomplete="nope" required readonly="true">
            </div>
        </div>
        <!-- Date Committed, Status, Lot ID, Beneficiary, Relation -->
        <div class="row">                  
            <div class="col-sm-2 form-group" style="margin-bottom: 8px;">
              <label for="date-purdate">Date Committed</label>
              <input type="text" class="form-control datepicker" data-mask="99/99/9999" placeholder="Pick a date&hellip;" id="date-purdate" name="date-purdate">
            </div>

            <div class="col-sm-2 form-group" style="margin-bottom: 8px;">
                <label for="txt-salestatus">Status</label>
                <input type="text" class="form-control text-capitalize" id="txt-salestatus" maxlength='10' name="txt-salestatus" autocomplete="nope" readonly="true">
            </div> 
            
            <div class="col-sm-1 form-group" style="margin-bottom: 8px;">
                <label for="txt-lotid">Lot ID</label>
                <input type="text" class="form-control text-capitalize" id="txt-lotid" maxlength='10' name="txt-lotid" autocomplete="nope" readonly="true">
            </div> 
            <div class="col-sm-1 form-group" style="padding: 0px;padding-top:27px;padding-right:0px;margin:0;margin-bottom: 8px;">
                <button type="button" class="btn btn-light" id="btn-lotid" data-toggle="modal" data-target="#modal-search-lot"><i class="icon-drawer-out"></i></button>
            </div>
            <div class="col-sm-4 form-group" style="margin-bottom: 8px;">
                <label for="txt-beneficiary">Beneficiary</label>
                <input type="text" class="form-control text-capitalize" id="txt-beneficiary" name="txt-beneficiary" autocomplete="nope" required>
            </div>
            <div class="col-sm-2 form-group" style="margin-bottom: 8px;">
              <label for="sel-relation">Relation</label>
              <select data-placeholder="&nbsp;" class="form-control select-search" data-container-css-class="border-secondary" data-dropdown-css-class="border-secondary" id="sel-relation" name="sel-relation" required>
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
        
        <!-- Councilor, Certified On, Certification #, Sale #, Sale Code -->
        <div class="row">
            <div class="col-sm-4 form-group" style="margin-bottom: 8px;">
                <label for="txt-councilor">Councilor</label>
                <input type="text" class="form-control" id="txt-councilor" name="txt-councilor" value="" autocomplete="nope">
            </div>
            <div class="col-sm-1 form-group" style="padding: 0px;padding-top:27px;padding-right:0px;margin:0;margin-bottom: 8px;">
                <button type="button" class="btn btn-light" id="btn-councilor"><i class="icon-drawer-out"></i></button>
            </div>            
        
            <div class="col-sm-2 form-group" style="margin-bottom: 8px;">
              <label for="date-certdate" style="color:hotpink;">Certified On</label>
              <input type="text" class="form-control datepicker" data-mask="99/99/9999" placeholder="Pick a date&hellip;" id="date-certdate" name="date-certdate">
            </div>

            <div class="col-sm-2 form-group" style="margin-bottom: 8px;">
                <label for="txt-certnum" style="color:hotpink;">Certification #</label>
                <input type="text" class="form-control" id="txt-certnum" name="txt-certnum" value="" autocomplete="nope">
            </div>

            <div class="col-sm-1 form-group" style="margin-bottom: 8px;">
                <label for="txt-scode" style="color:hotpink;">Sale #</label>
                <input type="text" class="form-control" id="txt-scode" name="txt-scode" value="" autocomplete="nope">
            </div>  
            
            <div class="col-sm-2 form-group" style="margin-bottom: 8px;">
                <label for="txt-salecode" style="color:hotpink;">Sale Code</label>
                <input type="text" class="form-control" id="txt-salecode" name="txt-salecode" value="" autocomplete="nope">
            </div>             
        </div>    
        
        <!-- Remarks -->
        <div class="row">
            <div class="col-sm-12 form-group" style="margin-bottom: 1px;">
                <label for="txt-remarks">Remarks</label>
                <textarea rows="4" class="form-control" id="txt-remarks" name="txt-remarks" placeholder="Enter your message here..."></textarea>
            </div>
        </div> 

        <table class="table table-hover table-bordered table-striped datatable-small-font profile-grid-header salesHistoryTable">
          <thead>
            <tr>
              <th style="min-width: 255px;">Lot Owner</th>
              <th style="min-width: 130px;">Status</th>
              <th style="min-width: 120px;">Date</th>
              <th style="min-width: 140px;">Beneficiary</th>
              <th style="min-width: 400px;">Remarks</th>
              <th>Act</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>

        <div class="clearfix" style="margin-top:1px;">
          <span class="float-left">
          </span>

          <input type="text" name="trans_type" id="trans_type" value="New" style="visibility:hidden;" required>
          <input type="hidden" id="num-id" name="num-id">

          <span class="float-left">
            <label id="btn-labels" style="color:greenyellow;font-size:1.3em;"></label>
          </span>

          <span class="float-right" style="padding-left:20px;">
            <button type="button" class="btn btn-light btn-lg" id="btn-new"><i class="icon-file-text mr-2"></i> New</button>

            <button type="button" class="btn btn-light btn-lg" id="btn-search" data-toggle="modal" data-target="#modal-search-sales"><i class="icon-search4 mr-2"></i> Search</button>
           
            <button type="button" class="btn btn-light btn-lg" id="btn-save"><i class="icon-floppy-disk mr-2"></i> Save</button>
          </span>

          <span class="float-right">
            <button type="button" style="display:none;" class="btn btn-outline-danger btn-lg" id="btn-cancel" data-toggle="modal" data-target="#modal-cancel-sale"><i class="icon-unlink2 mr-2"></i> Cancel</button>

            <button type="button" style="display:none;" class="btn btn-outline-info btn-lg" id="btn-transfer" data-toggle="modal" data-target="#modal-transfer-resale"><i class="icon-paperplane mr-2"></i> Transfer</button>

            <button type="button" style="display:none;" class="btn btn-outline-success btn-lg" id="btn-resale" data-toggle="modal" data-target="#modal-transfer-resale"><i class="icon-price-tags2 mr-2"></i> Resale</button>
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
  <div class="modal-dialog modal-full modal-dialog-centered">
    <div class="modal-content" style="background-color: #343f53;">
      <div class="modal-header">
        <h5 class="modal-title profile-name"><i class="icon-menu7 mr-2"></i> &nbsp; SALES TRANSACTION LIST</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="h-divider">
      </div>
          <div class="row" pb-0 style="margin:10px;margin-bottom: -25px;">
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
                <option value="Sold">Sold</option>
                <option value="Resale">Resale</option>
                <option value="Transferred">Transferred</option>
                <option value="Cancelled">Cancelled</option>
              </select>
            </div> 
          </div>  

          <!-- <div class="h-divider"></div> -->

          <table class="table table-hover table-bordered table-striped datatable-small-font profile-grid-header salesTransactionTable">
          <thead>
            <tr>
              <!-- <th style="min-width: 270px;">Client</th>
              <th style="min-width: 130px;">Date</th>
              <th style="min-width: 120px;">Lot ID</th>
              <th style="min-width: 140px;">Category</th>
              <th style="min-width: 80px;">Status</th>
              <th style="min-width: 270px;">Beneficiary</th>
              <th>Act</th> -->
              <th>Lot Owner</th>
              <th>Date</th>
              <th>Lot #</th>
              <th>Category</th>
              <th>Status</th>
              <th>Beneficiary</th>
              <th>Decedents</th>
              <th>Act</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
    </div>
  </div>
</div>

<!-- ============== Search Available Lot ============ -->
<div id="modal-search-lot" class="modal" tabindex="-1">
  <div class="modal-dialog modal-full modal-dialog-centered">
    <div class="modal-content" style="background-color: #343f53;height:80vh;">
      <div class="modal-header">
        <h5 class="modal-title profile-name"><i class="icon-menu7 mr-2"></i> &nbsp; PICK AVAILABLE LOT</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="h-divider">
      </div>

      <div class="modal-body">
          <div class="row">
              <div class="col-sm-3 form-group" style="border: 2px solid gray;">
                <table class="table table-hover table-bordered table-striped datatable-small-font profile-grid-header availableLotTable">
                  <thead>
                    <tr>
                      <th style="min-width: 120px;">Lot ID</th>
                      <th style="min-width: 140px;">Category</th>
                      <th>Act</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
              <div class="col-sm-9 form-group">
                <div class="map-container" id="maplocator" style="border-radius: 10px;height:100%;width:100%;box-shadow: -2px -2px 8px rgba(0, 0, 0, 0.8);"></div>
                  <ul class="navbar-nav" style="width:3rem;position:absolute;top: 5px;right:15px;left: inherit;">
                    <button type="button" style="margin-bottom:3px;box-shadow: 1px 1px 1px rgba(0, 0, 0, 0.9);" class="btn bg-info btn-icon ml-2" id="btn-rotateleft"><i class="icon-rotate-ccw3"></i></button>
                    <button type="button" style="margin-bottom:3px;box-shadow: 1px 1px 1px rgba(0, 0, 0, 0.9);" class="btn bg-info btn-icon ml-2" id="btn-rotateright"><i class="icon-rotate-cw3"></i></button>
                    <button type="button" style="margin-bottom:3px;box-shadow: 1px 1px 1px rgba(0, 0, 0, 0.9);" class="btn bg-info btn-icon ml-2" id="btn-tiltup"><i class="icon-arrow-up7"></i></button>
                    <button type="button" style="margin-bottom:3px;box-shadow: 1px 1px 1px rgba(0, 0, 0, 0.9);" class="btn bg-info btn-icon ml-2" id="btn-tiltdown"><i class="icon-arrow-down7"></i></button>
                    <button type="button" style="margin-bottom:3px;box-shadow: 1px 1px 1px rgba(0, 0, 0, 0.9);" class="btn bg-info btn-icon ml-2" id="btn-clearmarkers"><i class="icon-eraser"></i></button> 
                  </ul>
              </div>
          </div>
      </div>
      
      <!-- <div class="modal-footer">

      </div> -->
    </div>
  </div>
</div>

<!-- ============== Cancel Sale ============ -->
<div id="modal-cancel-sale" class="modal" tabindex="-1" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-xs modal-dialog-centered">
    <div class="modal-content" style="background-color: #343f53;">
      <div class="modal-header">
        <h5 class="modal-title profile-name"><i class="icon-menu7 mr-2"></i> &nbsp; SALE CANCELLATION</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="h-divider">
      </div>
          <div class="row" pb-0 style="margin:10px;margin-bottom: 0px;">
            <div class="col-sm-12 form-group">
              <label for="date-cancelled">Date Cancelled</label>
              <input type="text" class="form-control datepicker" data-mask="99/99/9999" placeholder="Pick a date&hellip;" id="date-cancelled" name="date-cancelled">
            </div>

            <div class="col-sm-12 form-group">
              <label for="txt-cancelremarks">Remarks</label>
              <textarea rows="4" class="form-control" id="txt-cancelremarks" name="txt-cancelremarks" placeholder="Enter your comment here..."></textarea>
            </div>

            <div class="col-sm-12 form-group">
              <button type="button" class="btn btn-outline-danger btn-lg w-100" id="btn-cancelsale"><i class="icon-unlink2 mr-2"></i> Cancel</button>
            </div>
          </div>       
    </div>
  </div>
</div>

<!-- ============== Re-sale ============ -->
<div id="modal-transfer-resale" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content" style="background-color: #343f53;">
      <div class="modal-header" style="border:1px solid rgba(255, 255, 255, 0.3);box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.5); border-radius: 10px;">
        <button type="button" class="btn btn-outline-success btn-lg" style="padding-bottom:5px;margin-bottom:10px;margin-top:-10px;margin-left:-10px;" id="btn-transfer-resale"><i class="icon-price-tags2 mr-2"></i></button>
        <!-- <h5 class="modal-title profile-name" id="lbl-transfer-resale" style="margin-bottom:10px;"><i class="icon-menu7 mr-2"></i> &nbsp; RESALE LOT</h5> -->
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- <div class="h-divider">
      </div> -->

      <div class="card-body">
        <!-- Lastname, Firstname, MI, Client ID :: btn-modal-client, btn-modal-addclient -->
        <div class="row">
            <div class="col-sm-4 form-group" style="margin-bottom: 8px;">
                <label for="tr-lname" style="color:hotpink;">Lastname</label>
                <input type="text" class="form-control text-capitalize" id="tr-lname" name="tr-lname" autocomplete="nope" required>
            </div>

            <div class="col-sm-4 form-group" style="margin-bottom: 8px;">
                <label for="tr-fname" style="color:hotpink;">Firstname</label>
                <input type="text" class="form-control text-capitalize" id="tr-fname" name="tr-fname" autocomplete="nope" required>
            </div>

            <div class="col-sm-1 form-group" style="margin-bottom: 8px;padding-right:20px;">
                <label for="tr-mi">MI</label>
                <input type="text" class="form-control text-capitalize" id="tr-mi" maxlength='1' name="tr-mi" autocomplete="nope">
            </div> 

            <div class="col-sm-1 form-group" style="margin-bottom: 8px;">
              <div class="d-flex justify-content-end" style="padding-top: 27px;">
                  <button type="button" class="btn btn-light mr-1" id="btn-modal-client" data-toggle="modal" data-target="#modal-search-clients-transfer-resale">
                      <i class="icon-drawer-out"></i>
                  </button>
                  <button type="button" class="btn btn-light" id="btn-modal-addclient">
                      <i class="icon-pencil3"></i>
                  </button>
              </div>
            </div>

            <div class="col-sm-2 form-group" style="margin-bottom: 8px;">
                <label for="tr-clientid">Client ID</label>
                <input type="text" class="form-control profile-code" id="tr-clientid" name="tr-clientid" autocomplete="nope" required readonly="true">
            </div>
        </div>

        <div class="row">
            <!-- Landline, Mobile, Email, Address -->
            <div class="col-sm-2 form-group" style="margin-bottom: 8px;">
                <label for="tr-landline">Landline</label>
                <input type="text" class="form-control" id="tr-landline" name="tr-landline" value="" autocomplete="nope">
            </div>

            <div class="col-sm-2 form-group" style="margin-bottom: 8px;">
                <label for="tr-mobile">Mobile #</label>
                <input type="text" class="form-control" id="tr-mobile" name="tr-mobile" value="" autocomplete="nope">
            </div>

            <div class="col-sm-3 form-group" style="margin-bottom: 8px;">
                <label for="tr-email">E-mail</label>
                <input type="text" class="form-control" id="tr-email" name="tr-email" value="" autocomplete="nope">
            </div> 
            
            <div class="col-sm-5 form-group" style="margin-bottom: 8px;">
                <label for="tr-address">Address</label>
                <input type="text" class="form-control" id="tr-address" name="tr-address" value="" autocomplete="nope">
            </div>             
        </div>

        <div class="h-divider">
        </div>
        
        <!-- Date Committed, Beneficiary, Relation, Remarks -->
        <div class="row" style="margin-top:10px;">                  
            <div class="col-sm-2 form-group" style="margin-bottom: 8px;">
              <label for="tr-purdate" style="color:hotpink;">Date Committed</label>
              <input type="text" class="form-control datepicker" data-mask="99/99/9999" placeholder="Pick a date&hellip;" id="tr-purdate" name="tr-purdate">
            </div>

            <div class="col-sm-3 form-group" style="margin-bottom: 8px;">
                <label for="tr-beneficiary">Beneficiary</label>
                <input type="text" class="form-control text-capitalize" id="tr-beneficiary" name="tr-beneficiary" autocomplete="nope" required>
            </div>

            <div class="col-sm-2 form-group" style="margin-bottom: 8px;">
              <label for="tr-relation">Relation</label>
              <select data-placeholder="&nbsp;" class="form-control select-search" data-container-css-class="border-secondary" data-dropdown-css-class="border-secondary" id="tr-relation" name="tr-relation" required>
                <option></option>
                <?php
                    $relation = (new ControllerSales)->ctrRelationList();
                    foreach ($relation as $key => $value) {
                      echo '<option value="'.$value["relationdesc"].'">'.$value["relationdesc"].'</option>';
                    }
                 ?>
              </select>
            </div>

            <div class="col-sm-2 form-group" style="margin-bottom: 8px;">
                <label for="tr-certnum">Certification #</label>
                <input type="text" class="form-control" id="tr-certnum" name="tr-certnum" value="" autocomplete="nope">
            </div>      

            <div class="col-sm-1 form-group" style="margin-bottom: 8px;">
                <label for="tr-scode">Sale #</label>
                <input type="text" class="form-control" id="tr-scode" name="tr-scode" value="" autocomplete="nope">
            </div> 

            <div class="col-sm-2 form-group" style="margin-bottom: 8px;">
                <label for="tr-salecode">Sale Code</label>
                <input type="text" class="form-control" id="tr-salecode" name="tr-salecode" value="" autocomplete="nope">
            </div> 
        </div> 

        <!-- Remarks -->
        <div class="row" style="margin-top:10px;"> 
            <div class="col-sm-12 form-group" style="margin-bottom: 8px;">
                <label for="tr-remarks">Remarks</label>
                <input type="text" class="form-control" id="tr-remarks" name="tr-remarks" value="" autocomplete="nope">
            </div>   
        </div>   

    </div>
  </div>
</div>

<div id="modal-search-clients-transfer-resale" class="modal" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content" style="background-color: #343f53;">
      <div class="modal-header">
        <h5 class="modal-title profile-name"><i class="icon-menu7 mr-2"></i> &nbsp;CLIENT LIST</h5>
        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
        <button type="button" class="close" id="close-modal-client">&times;</button>
      </div>

      <div class="h-divider">
      </div>

      <!-- <div class="modal-body"> -->
          <table class="table datatable-scroll-y table-bordered table-striped table-hover datatable-responsive datatable-small-font profile-grid-header clientsModalTable" width="100%">
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
    </div>
  </div>
</div>

<script src="views/js/sales.js"></script>
<script type="module" src="views/js/mapavailablelot.js"></script>

<script
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBc6JpeMq16j7_-n9dgCTGWpd8Qh8waYvU&callback=initMap&libraries=drawing&v=weekly"
  defer
></script>

