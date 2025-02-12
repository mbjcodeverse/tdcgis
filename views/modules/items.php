<div class="row align-items-center h-100" style="margin:0;margin-top: 13px;">

  <div class="col-md-10 mx-auto">
  <form class="items-form" id="product-form" method="POST" autocomplete="nope">
    <div class="card">
      <!-- <div class="loader-transparent rounded"></div> -->
      <div class="card-header d-flex bg-transparent border-bottom">
        <h5 class="card-title flex-grow-1" style="color:lightblue;font-size: 2em;">ITEM MASTER LIST</h5> 
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
            <div class="col-sm-3 form-group">
              <label for="sel-categorycode">Category</label>
              <select data-placeholder="< Select Category >" class="form-control select-search" id="sel-categorycode" name="sel-categorycode" required>
                <option></option>
                <?php
                    $category = (new ControllerCategory)->ctrShowCategoryList();
                    foreach ($category as $key => $value) {
                      echo '<option value="'.$value["categorycode"].'">'.$value["catdescription"].'</option>';
                    }
                 ?>
              </select>
            </div>

            <div class="col-sm-2 form-group">
<!--               <label for="sel-brandcode" id="lbl-sel-brandcode" style="color:aqua;">= &gt; Brand</label>
               <select data-placeholder="< Select Brand >" class="form-control select-search" id="sel-brandcode" name="sel-brandcode">
                <option></option>
                <?php
                    $brands = (new ControllerBrand)->ctrShowBrandList();
                    foreach ($brands as $key => $value) {
                      echo '<option value="'.$value["brandcode"].'">'.$value["brandname"].'</option>';
                    }
                 ?>
              </select> -->
            </div>            

            <div class="col-md-2 form-group">
                <label class="d-block font-weight-semibold">Desc</label>
                <div class="custom-control custom-checkbox custom-control-inline">
                  <input type="checkbox" class="custom-control-input" id="chk-purchaseitem" name="chk-purchaseitem" value="1" checked>
                  <label class="custom-control-label" for="chk-purchaseitem">Purchase Item</label>
                </div>
            </div>                                                                   

            <div class="col-md-1 form-group">
                <label class="d-block font-weight-semibold">Status</label>
                <div class="custom-control custom-checkbox custom-control-inline">
                  <input type="checkbox" class="custom-control-input" id="chk-isactive" name="chk-isactive" value="1" checked>
                  <label class="custom-control-label" for="chk-isactive">Active</label>
                </div>
            </div>

            <div class="col-sm-2 form-group">
                <label for="tns-itemcode">Item Code</label>
                <input type="text" class="form-control" id="tns-itemcode" name="tns-itemcode" autocomplete="nope">
            </div>            

            <div class="col-sm-2 form-group">
                <label for="txt-itemid">Item ID</label>
                <input type="text" class="form-control profile-code" id="txt-itemid" name="txt-itemid" autocomplete="nope" required readonly="true">
            </div>
         </div>

         <!-- Second Row  -->
         <div class="row">          
            <div class="col-sm-6 form-group">
                <label for="tns-pdesc">Product Name</label>
                <input type="text" class="form-control" id="tns-pdesc" name="tns-pdesc" autocomplete="nope" required>
            </div>

            <div class="col-sm-2 form-group">
              <label for="sel-meas1">( Pur Unit )</label>
              <select data-placeholder="< Select SKU >" class="form-control select-search" id="sel-meas1" name="sel-meas1" required>
                <option></option>
                <?php
                    $meas1 = (new ControllerMeasure)->ctrShowAllMeasure();
                    foreach ($meas1 as $key => $value) {
                      echo '<option value="'.$value["mdesc"].'">'.$value["mexpound"].'</option>';
                    }
                 ?>
              </select>  
            </div>
          
            <div class="col-sm-2 form-group">
                <label for="num-eqnum" id="lbl-num-eqnum" style="color:aqua;">= &gt; EQ Qty</label>
                <input type="text" class="form-control numeric hide-cursor" id="num-eqnum" name="num-eqnum" value="1.00" autocomplete="nope" required>
            </div>  

            <div class="col-sm-2 form-group">
              <label for="sel-meas2" id="lbl-sel-meas2" style="color:aqua;">= &gt; SKU</label>
              <select data-placeholder="< Select SKU >" class="form-control select-search" id="sel-meas2" name="sel-meas2" required>
                <option></option>
                <?php
                    $meas2 = (new ControllerMeasure)->ctrShowAllMeasure();
                    foreach ($meas2 as $key => $value) {
                      echo '<option value="'.$value["mdesc"].'">'.$value["mexpound"].'</option>';
                    }
                 ?>
              </select>  
            </div>              
        </div>

        <!-- Third Row -->
        <div class="row">
            <div class="col-sm-2 form-group">
                <label for="num-ucost">Unit Cost</label>
                <input type="text" class="form-control numeric hide-cursor" id="num-ucost" name="num-ucost" value="0.00" autocomplete="nope" required>
            </div> 

            <div class="col-sm-2 form-group">
                <label for="num-reorder">Re-order Qty</label>
                <input type="text" class="form-control numeric hide-cursor" id="num-reorder" name="num-reorder" value="0.00" autocomplete="nope">
            </div> 

            <div class="col-sm-8 form-group">
                <label for="tns-remarks">Remarks</label>
                <input type="text" class="form-control" id="tns-remarks" name="tns-remarks" autocomplete="nope">
            </div>          
        </div>
 
        <div class="clearfix">
          <span class="float-left">
          </span>
            
          <input type="text" name="trans_type" id="trans_type" value="New" style="visibility:hidden;" required>

          <span class="float-right">
            <button type="button" class="btn btn-light btn-lg" id="btn-new"><i class="icon-file-text mr-2"></i> New</button>

            <button type="button" class="btn btn-light btn-lg" id="btn-search" data-toggle="modal" data-target="#modal-search-item"><i class="icon-search4 mr-2"></i> Search</button>

            <div class="btn-group">
              <button type="submit" class="btn btn-light btn-lg" name="btn-save" id="btn-save"><i class="icon-floppy-disk"></i>&nbsp;&nbsp;Save</button>
            </div>
          </span>
        </div>     
      </div>  <!-- card body -->

    </div>
  </form>
  </div>
</div>

<!-- ============== Product List ============ -->
<div id="modal-search-item" class="modal" tabindex="-1">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content" style="background-color: #343f53;">
      <div class="modal-header">
        <h5 class="modal-title profile-name"><i class="icon-menu7 mr-2"></i> &nbsp;ITEM MASTER LIST</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="h-divider">
      </div>
          <div class="row" pb-0 style="margin:10px;margin-bottom: 0px;">
            <div class="col-sm-3 form-group">
              <label for="lst-categorycode" id="lbl-lst-categorycode" style="color:aqua;">= &gt; Category</label>
              <select data-placeholder="< Select Category >" class="form-control select-search" id="lst-categorycode" name="lst-categorycode" required>
                <option></option>
                <?php
                    $prod_category = (new ControllerCategory)->ctrShowCategoryList();
                    foreach ($prod_category as $key => $value) {
                      echo '<option value="'.$value["categorycode"].'">'.$value["catdescription"].'</option>';
                    }
                 ?>
              </select>
            </div>         
          </div>  

          <div class="h-divider"></div>

          <table class="table table-hover table-bordered table-striped datatable-small-font profile-grid-header itemTable">

          <thead>
            <tr>
              <th style="min-width: 200px;">Category</th>
              <th style="min-width: 200px;">Item Code</th>
              <th style="min-width: 450px;">Product Name</th>
              <th style="min-width: 118px;">Unit Cost</th>
              <th>Act</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
    </div>
  </div>

<script src="views/js/items.js"></script>