<!-- Vertical form options -->
<div class="container-fluid">
  <form class="incoming-report-form" method="POST" autocomplete="nope">
    <div class="row">
      <div class="col-md-12" style="padding-left: 12px;margin-top: 13px;">
        <div class="card h-95">
          <div class="card-header d-flex bg-transparent border-bottom" style="padding-top: 12px;padding-right: 1px;padding-bottom:10px;">
              <input type="hidden" name="user_type" id="user_type" value="<?php echo $_SESSION["utype"];?>">

              <h4 class="card-title flex-grow-1 transaction-name">INCOMING REPORT</h4> 

              <!-- Report Type Label -->
              <div class="col-sm-1 form-group" style="padding: 0px;padding-top:15px;padding-right:0;margin:0;">
                  <label for="lst-reptype"" style="text-align: right;font-size: 1.2em;">REPORT TYPE</label>
              </div>              

              <div class="col-sm-3 form-group" style="padding: 0px;padding-top:8px;margin:0;">
                <select data-placeholder="< Select Type >" class="form-control select" data-fouc id="lst-reptype" name="lst-reptype" required>
                   <option></option>
                   <option value="1">Overall Incoming Category</option>
                   <option value="2">Category + Product Description</option>
                   <option value="3">Incoming Sequence Details</option>
                   <option value="4">Product Account Grouping</option>
                </select>
              </div>              

              <!-- Branch Label -->
              <div class="col-sm-1 form-group" style="padding: 0px;padding-top:15px;padding-right:0;margin:0;">
                  <label for="lst-machineid" id="lbl-lst-machineid" style="text-align: right;font-size: 1.2em;color:aqua;margin-left:15px;">= &gt; Machine</label>
              </div>

              <div class="col-sm-2 form-group" style="padding: 0px;padding-top:8px;margin:0;">
                  <select data-placeholder="< Select Machine >" class="form-control select-search" id="lst-machineid" name="lst-machineid">
                    <option></option>
                    <?php
                        $machines = (new ControllerMachine)->ctrShowMachineList();
                        foreach ($machines as $key => $value) {
                          echo '<option value="'.$value["machineid"].'">'.$value["machinedesc"].'</option>';
                        }
                     ?>
                  </select>               
              </div>

              <div class="col-sm-2 form-group" style="padding: 0px;padding-top:8px;padding-left:7px;margin:0;">
                <button type="button" class="btn btn-light" disabled name="btn-print-report" id="btn-print-report" style="float:right;margin-right:19px;"><i class="icon-printer"></i>&nbsp;&nbsp;Print Report</button>
              </div>    
          </div>

          <div class="card-body" style="padding-bottom: 0;margin: 0;padding-top: 5px;">
              <div class="row" style="padding: 0;margin-bottom: 0;">
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

                <div class="col-sm-2 form-group">
                  <label for="lst-categorycode" id="lbl-lst-categorycode" style="color:aqua;">= &gt; Category</label>
                  <select data-placeholder="< Select Category >" class="form-control select-search" id="lst-categorycode" name="lst-categorycode">
                    <option></option>
                    <?php
                        $category = (new ControllerCategory)->ctrShowCategoryList();
                        foreach ($category as $key => $value) {
                          echo '<option value="'.$value["categorycode"].'">'.$value["catdescription"].'</option>';
                        }
                     ?>
                  </select>
                </div> 

                <div class="col-sm-5 form-group">
                  <label for="lst-suppliercode" id="lbl-lst-suppliercode" style="color:aqua;">= &gt; Supplier</label>
                  
                  <select data-placeholder="< Select Supplier >" class="form-control select-search" id="lst-suppliercode" name="lst-suppliercode">
                    <option></option>
                    <?php
                      $suppliers = (new ControllerSupplier)->ctrShowSupplierList();
                      foreach ($suppliers as $key => $value) {
                        echo '<option value="'.$value["suppliercode"].'">'.$value["name"].'</option>';
                      }
                    ?>
                  </select>              
                </div>          

                <div class="col-sm-2 form-group">
                  <label for="lst-delstatus" id="lbl-lst-delstatus" style="color:aqua;">= &gt; Status</label>
                  <select data-placeholder="< Select Status >" class="form-control select" data-fouc id="lst-delstatus" name="lst-delstatus">
                    <option></option>
                    <option value="Posted">Posted</option>
                    <option value="Cancelled">Cancelled</option>
                  </select>
                </div>
              </div>                                        
          </div>  <!-- card body -->

          <hr style="margin:0;padding: 0;padding-bottom: 24px;">

          <div class="row incoming_content">
          </div> 
          
          <div class="card-footer" style="padding-top: 0;margin-top: 0;">
          </div>  <!-- footer -->
       </div>     <!-- card -->
      </div>

    </div>  <!-- row -->
  </form>
</div>

<script src="views/js/incomingreport.js"></script>