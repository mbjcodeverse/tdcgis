<!-- Vertical form options -->
<div class="row align-items-center h-100" style="margin:0;margin-top: 13px;">
  <div class="col-md-11 mx-auto">
  <form role="form" id="form-interment" method="POST" autocomplete="nope">
    <div class="card" style="border:1px solid rgba(255, 255, 255, 0.1);box-shadow: 10px 10px 30px rgba(0, 0, 0, 0.7); border-radius: 10px;">
      <!-- <div class="loader-transparent rounded"></div> -->
      <div class="card-header d-flex bg-transparent border-bottom" style="border:1px solid rgba(255, 255, 255, 0.3);box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.5); border-radius: 10px;">
        <h5 class="card-title flex-grow-1 profile-header-title">INTERMENT INFORMATION</h5> 
        <input type="hidden" name="trans_type" id="trans_type" value="New" required>
        <input type="hidden" name="decedentList" id="decedentList" value="" required>
        <input type="hidden" name="txt-saleid" id="txt-saleid" value="" required>
        <!-- User ID -->
        <input type="hidden" name="userid" id="userid" value="<?php echo $_SESSION["userid"];?>">

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
            <div class="col-sm-3 form-group" style="margin-bottom: 8px;">
                <label for="txt-lname" style="color:#ff8fa1;">Lastname</label>
                <input type="text" class="form-control text-capitalize" id="txt-lname" name="txt-lname" autocomplete="nope" readonly="true" required>
            </div>

            <div class="col-sm-3 form-group" style="margin-bottom: 8px;">
                <label for="txt-fname" style="color:#ff8fa1;">Firstname</label>
                <input type="text" class="form-control text-capitalize" id="txt-fname" name="txt-fname" autocomplete="nope" readonly="true" required>
            </div>

            <div class="col-sm-1 form-group" style="margin-bottom: 8px;">
                <label for="txt-mi" style="color:#ff8fa1;">MI</label>
                <input type="text" class="form-control text-capitalize" id="txt-mi" maxlength='1' name="txt-mi" autocomplete="nope" readonly="true">
            </div> 
            <div class="col-sm-1 form-group" style="padding: 0px;padding-top:28px;padding-right:0px;margin:0;">
                <button type="button" class="btn btn-light" id="btn-client" data-toggle="modal" data-target="#modal-search-sales"><i class="icon-drawer-out"></i></button>
            </div>

            <div class="col-sm-2 form-group" style="margin-bottom: 8px;">
                <label for="txt-lotid">Lot ID</label>
                <input type="text" class="form-control profile-code" id="txt-lotid" name="txt-lotid" autocomplete="nope" required readonly="true">
            </div>

            <div class="col-sm-2 form-group" style="margin-bottom: 8px;">
                <label for="txt-intermentid">Interment ID</label>
                <input type="text" class="form-control profile-code" id="txt-intermentid" name="txt-intermentid" autocomplete="nope" required readonly="true">
            </div>            
        </div>
        <hr style="margin:0;margin-bottom:8px;">
        <div class="row">                  
            <div class="col-sm-2 form-group" style="margin-bottom: 15px;">
              <label for="date-interdate" style="color:#ff8fa1;">Interment Date</label>
              <input type="text" class="form-control datepicker" data-mask="99/99/9999" placeholder="Pick a date&hellip;" id="date-interdate" name="date-interdate">
            </div>

            <div class="col-sm-2 form-group" style="margin-bottom: 15px;">
              <label for="sel-location" id="lbl-location" style="color:aqua;">&lt;= Location</label>
              <select data-placeholder="&nbsp;" class="form-control select" data-fouc data-container-css-class="border-secondary" data-dropdown-css-class="border-secondary" id="sel-location" name="sel-location" required>
                <option></option>
                <option value="Underground">Underground</option>
                <option value="Aboveground">Aboveground</option>
              </select>
            </div>
            
            <div class="col-sm-2 form-group" style="margin-bottom: 15px;">
              <label for="sel-layer" id="lbl-layer" style="color:aqua;">&lt;= Layer</label>
              <select data-placeholder="&nbsp;" class="form-control select" data-fouc data-container-css-class="border-secondary" data-dropdown-css-class="border-secondary" id="sel-layer" name="sel-layer" required>
                <option></option>
                <option value="1st Layer">1st Layer</option>
                <option value="2nd Layer">2nd Layer</option>
              </select>
            </div> 
            
            <div class="col-sm-6 form-group" style="margin-bottom: 15px;">
                <label for="txt-remarks">Remarks</label>
                <input type="text" class="form-control" id="txt-remarks" name="txt-remarks" autocomplete="nope">
            </div>
        </div> 

        <!-- <hr style="margin:0;margin-bottom:6px;margin-top:5px;background-color: yellow; height: 1px; border: none;"> -->

        <div class="row" style="margin-top:-15px;">
          <div class="col-sm-12 form-group" style="margin-bottom: 6px; margin-top:9px; display: flex; justify-content: flex-end; gap: 15px;">
              <!-- New Entry Button with Caption (replacing Trash icon) -->
              <button type="button" class="btn btn-light btn-sm" id="btn-clear" style="padding-top:2px; padding-bottom:2px; margin-bottom:3px;">
                  <i class="fas fa-plus-circle" style="color: lightcoral;"></i> <!-- New Entry Icon -->
                  <span style="font-size: 1em; color: white; margin-left: 5px;">New Decease</span>
              </button>
          
              <!-- Source Button with Caption -->
              <button type="button" class="btn btn-light btn-sm" id="btn-source" style="padding-top:2px; padding-bottom:2px; margin-bottom:3px;">
                  <i class="fas fa-map" style="color: lightblue;"></i> 
                  <span style="font-size: 1em; color: white; margin-left: 5px;">Source</span>
              </button>

              <!-- Append Button with Caption -->
              <button type="button" class="btn btn-light btn-sm" id="btn-append" style="padding-top:2px; padding-bottom:2px; margin-bottom:3px;">
                  <i class="fas fa-plus" style="color: lightgreen;"></i> 
                  <span style="font-size: 1em; color: white; margin-left: 5px;">Append</span>
              </button>

              <!-- Edit Button with Caption -->
              <button type="button" class="btn btn-light btn-sm" id="btn-edit" style="padding-top:2px; padding-bottom:2px; margin-bottom:3px;">
                  <i class="fas fa-edit" style="color: lightgreen;"></i> 
                  <span style="font-size: 1em; color: white; margin-left: 5px;">Update</span>
              </button>
          </div>
        </div>
 

        <!-- <hr style="margin:0;margin-bottom:10px;margin-top:6px;background-color: yellow; height: 1px; border: none;"> -->

        <!-- <div class = "row">
          <div class="col-sm-12 form-group"> -->
            <table class="table table-bordered table-striped datatable-small-font profile-grid-header" style="padding:0px;margin:0px;border-collapse:collapse;border-bottom: 4px solid #1e293b;">
              <thead>
                <tr>
                  <th style="width: 25%;padding-left:15px;color:#ff8fa1;">Deceased</th>
                  <th style="width: 15%;padding-left:15px;" id="datedied-header">&lt;= Date Died</th>
                  <th style="width: 15%;padding-left:15px;" id="relation-header">&lt;= Relation</th>
                  <th style="width: 10%;padding-left:15px;" id="remains-header">&lt;= Remains</th>
                  <th style="width: 10%;padding-left:15px;" id="reinterred-header">&lt;= Buried</th>
                  <th style="width: 25%;padding-left:15px;">Source</th>
                </tr>
              </thead>

              <tbody>
                <td style="padding: 0; margin: 0; width:25%;">
                  <input type="text" class="form-control text-capitalize" id="txt-decedent" name="txt-decedent" autocomplete="nope" required>
                </td>
                <td style="padding: 0; margin: 0; width:15%;">
                  <input type="text" class="form-control datepicker" data-mask="99/99/9999" placeholder="Pick a date&hellip;" id="date-died" name="date-died">
                </td>
                <td style="padding: 0; margin: 0; width:15%;">
                  <select data-placeholder="&nbsp;" class="form-control select-search" data-container-css-class="border-secondary" data-dropdown-css-class="border-secondary" id="sel-relation" name="sel-relation" required>
                  <option></option>
                    <?php
                        $relation = (new ControllerSales)->ctrRelationList();
                        foreach ($relation as $key => $value) {
                          echo '<option value="'.$value["relationdesc"].'">'.$value["relationdesc"].'</option>';
                        }
                    ?>
                  </select>
                </td>
                <td style="padding: 0; margin: 0; width:10%;">
                  <select data-placeholder="&nbsp;" class="form-control select" data-fouc data-container-css-class="border-secondary" data-dropdown-css-class="border-secondary" id="sel-remains" name="sel-remains" required>
                    <option></option>
                    <option value="Fresh">Fresh</option>
                    <option value="Bones">Bones</option>
                    <option value="Ash">Ash</option>
                  </select>
                </td>
                <td style="padding: 0; margin: 0; width:10%;">
                  <select data-placeholder="&nbsp;" class="form-control select" data-fouc data-container-css-class="border-secondary" data-dropdown-css-class="border-secondary" id="sel-reinterred" name="sel-reinterred" required>
                    <option></option>
                    <option value="In Place">In Place</option>
                    <option value="Exhumed">Exhumed</option>
                    <option value="Transferred">Transferred</option>
                  </select>
                </td>
                <td style="padding: 0; margin: 0; width:25%;">
                  <input type="text" class="form-control" id="txt-source" name="txt-source" value="" autocomplete="nope">
                </td>
              </tbody>
            </table>
          <!-- </div>
        </div> -->

        <div class = "row" style="margin-top:0px;">
          <div class="col-sm-12 form-group" style="margin-bottom: 8px;margin-top:2px;">
            <table class="table table-hover table-bordered table-striped datatable-small-font profile-grid-header intermentEntryTable">
              <tbody class="enlisted_decedents" id="decedent_list">
              </tbody>
            </table>
          </div>
        </div>
        
        <!-- <div class="row">
          <div class="col-12">
            <input type="hidden" name="decedentList" id="decedentList"></>
            <textarea name="decedentList" id="decedentList" class="form-control" rows="6"></textarea>
          </div>
        </div> -->

        <div class="clearfix">
          <span class="float-left">
          </span>

          <input type="text" name="trans_type" id="trans_type" value="New" style="visibility:hidden;" required>
          <input type="hidden" id="num-id" name="num-id">

          <span class="float-left">
            <label style="color:greenyellow;font-size:1.2em;">[ RED labels must not be empty ]&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;[ Labels with <= are clickable: used to empty combobox ]</label>
          </span>

          <span class="float-right">
            <button type="button" class="btn btn-light btn-lg" id="btn-new"><i class="icon-file-text mr-2"></i> New</button>

            <button type="button" class="btn btn-light btn-lg" id="btn-search" data-toggle="modal" data-target="#modal-search-interment"><i class="icon-search4 mr-2"></i> Search</button>
           
            <button type="button" class="btn btn-light btn-lg" id="btn-save"><i class="icon-floppy-disk mr-2"></i> Save</button>
          </span>
        </div>     
      </div>  <!-- card body -->

    </div>
  </form>
  </div>
</div>

<!-- ============== Interment List ============ -->
<div id="modal-search-interment" class="modal" tabindex="-1">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content" style="background-color: #343f53;">
      <div class="modal-header">
        <h5 class="modal-title profile-name"><i class="icon-menu7 mr-2"></i> &nbsp; INTERMENT LIST INFORMATION</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="h-divider">
      </div>
          <!-- -25px - reduces gap between row with comboboxes and table below -->
          <div class="row" pb-0 style="margin:10px;margin-bottom: -25px;">  
            <div class="col-sm-3 form-group">
               <label for="lst-categorycode" id="lbl-lst-categorycode" style="color:aqua;">= &gt; Category</label>
               <select data-placeholder="< Select Category >" class="form-control select-search" data-container-css-class="border-secondary" data-dropdown-css-class="border-secondary" id="lst-categorycode" name="lst-categorycode">
                <option></option>
                <?php
                  $category = (new ControllerLot)->ctrCategoryList();
                  foreach ($category as $key => $value) {
                    echo '<option value="'.$value["categorycode"].'">'.$value["catdescription"].'</option>';
                  }
                ?>
               </select>
            </div>

            <!-- <div class="col-sm-2 form-group">
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
            </div>             -->

            <div class="col-sm-3 form-group">
              <div class="form-group">
                <label for="lst_date_range" id="lbl-lst-date-range" style="color:aqua;">Date Range</label>
                <div class="input-group">
                  <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-calendar22"></i></span>
                  </span>
                  <input type="text" class="form-control daterange-basic" id="lst_date_range" name="lst_date_range" required> 
                </div>
              </div>
            </div>

            <div class="col-sm-4 form-group">
            </div>

            <div class="col-sm-2 form-group">
              <label for="lst-reinterred" id="lbl-lst-reinterred" style="color:aqua;">= &gt; Interred</label>
              <select data-placeholder="< Select Status >" class="form-control select" data-fouc data-container-css-class="border-secondary" data-dropdown-css-class="border-secondary" id="lst-reinterred" name="lst-reinterred" required>
                <option></option>
                <option value="In Place">In Place</option>
                <option value="Exhumed">Exhumed</option>
                <option value="Transferred">Transferred</option>
              </select>
            </div> 
          </div>  

          <!-- <div class="h-divider"></div> -->

          <table class="table table-hover table-bordered table-striped datatable-small-font profile-grid-header intermentListTable">
          <thead>
            <tr>
              <th style="min-width: 130px;">Date</th>
              <th style="min-width: 120px;">Lot ID</th>
              <th style="min-width: 270px;">Client</th>
              <th style="min-width: 490px;">Decedents</th>
              <th>Act</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
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
          <div class="row" pb-0 style="margin:10px;margin-bottom: -25px;">
            <div class="col-sm-3 form-group">
               <label for="sale-categorycode" id="lbl-sale-categorycode" style="color:aqua;">= &gt; Category</label>
               <select data-placeholder="< Select Category >" class="form-control select-search" data-container-css-class="border-secondary" data-dropdown-css-class="border-secondary" id="sale-categorycode" name="sale-categorycode">
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
               <label for="sale-classcode" id="lbl-sale-classcode" style="color:aqua;">= &gt; Classification</label>
               <select data-placeholder="< Select Class >" class="form-control select-search" id="sale-classcode" name="sale-classcode">
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
                  <input type="text" class="form-control daterange-basic" id="sale_date_range" name="sale_date_range" required> 
                </div>
              </div>
            </div>

            <div class="col-sm-2 form-group">
            </div>

            <div class="col-sm-2 form-group">
              <label for="sale-salestatus" id="lbl-sale-salestatus" style="color:aqua;">= &gt; Status</label>
              <select data-placeholder="< Select Status >" class="form-control select" data-fouc data-container-css-class="border-secondary" data-dropdown-css-class="border-secondary" id="sale-salestatus" name="sale-salestatus" required>
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
              <th style="min-width: 270px;">Client</th>
              <th style="min-width: 130px;">Date</th>
              <th style="min-width: 120px;">Lot ID</th>
              <th style="min-width: 140px;">Category</th>
              <th style="min-width: 80px;">Status</th>
              <th style="min-width: 270px;">Beneficiary</th>
              <th>Act</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
    </div>
  </div>
</div>

<script src="views/js/interment.js"></script>

