<?php $_SESSION["show_dashboard"] = true; ?>


<div class="map-container" id="map" style="height:100%;">
  
</div>
<!-- <div id="overlay" style="position:absolute;top:0;bottom:0;left:0;right:0;background-color:white;z-index:-1;pointer-events: none;"></div> -->
      <ul class="navbar-nav" style="width:3rem;position:absolute;top: 58px;right:5px;left: inherit;">
        <button type="button" style="margin-bottom:3px;" class="btn bg-info btn-icon ml-2" id="btn-rotateleft"><i class="icon-rotate-ccw3"></i></button>
        <button type="button" style="margin-bottom:3px;" class="btn bg-info btn-icon ml-2" id="btn-rotateright"><i class="icon-rotate-cw3"></i></button>
        <button type="button" style="margin-bottom:3px;" class="btn bg-info btn-icon ml-2" id="btn-tiltup"><i class="icon-arrow-up7"></i></button>
        <button type="button" style="margin-bottom:3px;" class="btn bg-info btn-icon ml-2" id="btn-tiltdown"><i class="icon-arrow-down7"></i></button>
        <button type="button" style="margin-bottom:3px;" class="btn bg-info btn-icon ml-2" id="btn-tiltdown" data-toggle="modal" data-target="#modal-search-sales"><i class="icon-search4"></i></button>
        <button type="button" style="margin-bottom:3px;" class="btn bg-info btn-icon ml-2" id="btn-clearmarkers"><i class="icon-eraser"></i></button> 
        <!-- <button type="button" style="margin-bottom:3px;" class="btn bg-info btn-icon ml-2" id="btn-drawpolygon"><i class="icon-eraser"></i></button>            -->
      </ul>

      <!-- <button id="btn-changecolor">Change Fill to Red</button> -->

<!-- ============== Sales List ============ -->

<div id="plotForm" style="display: none;">
  <span id="closeForm" class="close-btn">&times;</span>
  <h3>Set LOT ID</h3>
  <label>Latitude:</label>
  <input type="text" id="lat_value" />
  <label>Longitude:</label>
  <input type="text" id="lng_value" />
  <label>Lot ID:</label>
  <select class="form-control select-search" data-container-css-class="border-secondary" data-dropdown-css-class="border-secondary" id="sel-lotid" name="sel-lotid" required>
    <option value="" selected hidden disabled>&lt;&nbsp;Select Lot&nbsp;&gt;</option>
    <?php
        $lotid = (new ControllerLot)->ctrLotList();
        foreach ($lotid as $key => $value) {
          echo '<option value="'.$value["lotid"].'">'.$value["lotid"].'</option>';
        }
      ?>
  </select>
  <div class="form-buttons">
    <button id="saveLotID">Save</button>
  </div>
</div>

<div id="modal-search-sales" class="modal" tabindex="-1" style="margin-left:1px;">
  <div class="modal-dialog modal-full modal-dialog-centered">
    <div class="modal-content" style="background-color: #343f53;">
      <div class="modal-header">
        <h5 class="modal-title profile-name"><i class="icon-menu7 mr-2"></i> &nbsp; SALES TRANSACTION LIST</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="h-divider">
      </div>
          <div class="row" pb-0 style="margin:10px;margin-bottom: 0px;">
            <div class="col-sm-2 form-group">
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
              <div class="form-group">
                <label>Date Range</label>
                <div class="input-group">
                  <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-calendar22"></i></span>
                  </span>
                  <input type="text" class="form-control daterange-basic" id="lst_date_range" name="lst_date_range" required> 
                </div>
              </div>
            </div>

            <div class="col-sm-3 form-group">
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

          <table style="width: 100%; table-layout: auto;" class="table table-hover table-bordered table-striped datatable-small-font profile-grid-header salesTransactionTable">
          <thead>
            <tr>
              <!-- <th style="min-width: 250px;">Client</th>
              <th style="min-width: 130px;">Date</th>
              <th style="min-width: 120px;">Lot ID</th>
              <th style="min-width: 140px;">Category</th>
              <th style="min-width: 80px;">Status</th>
              <th style="min-width: 250px;">Beneficiary</th>
              <th style="min-width: 500px;">Decedents</th>
              <th>Act</th> -->
              <th>Client</th>
              <th>Date</th>
              <th>Lot ID</th>
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


<script src="views/js/sales.js"></script>      

<!-- v=2.0 - is added if hosting website does not apply the javascript changes right away -->
<script type="module" src="views/js/populatecolors.js?v=3.0"></script>

<script
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBc6JpeMq16j7_-n9dgCTGWpd8Qh8waYvU&callback=initMap&libraries=drawing&v=weekly"
  defer
></script>