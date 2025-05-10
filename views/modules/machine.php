<!-- Vertical form options -->
<div class="container-fluid">
  <form role="form" id="machine-form" method="POST" enctype="multipart/form-data" autocomplete="nope">
  <!-- <form class="product-list-form" method="POST" autocomplete="nope"> -->
    <div class="row">
      <div class="col-md-9" style="padding-left: 0px;padding-left: 12px;margin-top: 20px;">
      <!-- <form id="form-stock-replenishment" method="POST" autocomplete="nope"> -->
        <div class="card">
          <div class="card-header d-flex bg-transparent border-bottom" style="padding-top: 3px;padding-right: 1px;">
            <h5 class="card-title flex-grow-1 transaction-name" style="padding-top: 14px;">&nbsp;&nbsp;MACHINE INFORMATION</h5>
          </div>

          <div class="card-body">
              <div class="row">
                <!-- <input type="hidden" id="idUser" name="idUser" value=""> -->

                <div class="col-sm-3 form-group">
                  <label for="sel-classcode">Classification</label>
                  <select data-placeholder="< Select Classification >" class="form-control select-search" id="sel-classcode" name="sel-classcode" required>
                    <option></option>
                    <?php
                        $classification = (new ControllerClassification)->ctrShowClassificationList();
                        foreach ($classification as $key => $value) {
                          echo '<option value="'.$value["classcode"].'">'.$value["classname"].'</option>';
                        }
                     ?>
                  </select>
                </div>

                <div class="col-sm-2 form-group">
                  <label for="sel-machtype">Type</label>
                  <select data-placeholder="< Select Type >" class="form-control select" data-fouc id="sel-machtype" name="sel-machtype" required>
                    <option></option>
                    <option value="Primary">Primary</option>
                    <option value="Secondary">Secondary</option>
                  </select>
                </div>                                

                <div class="col-sm-2 form-group">
                  <label for="sel-buildingcode">Building</label>
                  <select data-placeholder="< Select Bldg >" class="form-control select-search" id="sel-buildingcode" name="sel-buildingcode" required>
                    <option></option>
                    <?php
                        $building = (new ControllerBuilding)->ctrShowBuildingList();
                        foreach ($building as $key => $value) {
                          echo '<option value="'.$value["buildingcode"].'">'.$value["buildingname"].'</option>';
                        }
                     ?>
                  </select>
                </div>              

                <div class="col-md-1 form-group">
                    <label for="num-isactive">State</label>
                    <div class="custom-control custom-checkbox custom-control-inline">
                      <input type="checkbox" class="custom-control-input" id="num-isactive" name="num-isactive" value="1" checked>
                      <label class="custom-control-label" for="num-isactive">Active</label>
                    </div>
                </div>                

                <div class="col-sm-1 form-group">
                    <label for="txt-machineid">Mach ID</label>
                    <input type="text" class="form-control profile-code" id="txt-machineid" name="txt-machineid" autocomplete="nope" required readonly="true">
                </div> 

                <div class="col-sm-3 form-group">
                  <label for="sel-machstatus">Status</label>
                  <select data-placeholder="< Select Status >" class="form-control select" data-fouc id="sel-machstatus" name="sel-machstatus" required>
                    <option></option>
                    <option value="Operational">Operational</option>
                    <option value="Under Repair">Under Repair</option>
                    <option value="Idle">Idle</option>
                    <option value="Unusable">Unusable</option>
                  </select>
                </div>                                
             </div>

             <div class="row">
                <div class="col-sm-2 form-group">
                    <input type="text" class="form-control" id="txt-machabbr" name="txt-machabbr" autocomplete="nope" placeholder="Abbr">
                </div> 

                <div class="col-sm-10 form-group">
                    <input type="text" class="form-control" id="txt-machinedesc" name="txt-machinedesc" autocomplete="nope" placeholder="Enter Machine Description" required>
                </div>

                <div class="table-responsive" style="min-height:260px;max-height: clamp(65px,100vh,260px);overflow: auto;padding-top: 0px;">
                  <table class="table transaction-header-product-list">
                    <thead class="sticky-top">
                      <tr>
                        <td width="30%">Attribute</td>
                        <td width="70%">Details</td>
                      </tr>                    
                    </thead>
                    <tbody class="machineAttributes" id="machineAttributes">
                    </tbody>
                  </table>
                </div>
                <input type="hidden" name="attributelist" id="attributelist">
             </div> 
          </div>  <!-- card body -->
          
          <div class="card-footer">        
            <!-- ================== Function Buttons ================= -->
            <div class="clearfix">
              <span class="float-left">
              </span>

              <input type="text" name="trans_type" id="trans_type" value="New" style="visibility:hidden;" required>

              <span class="float-right">
                <button type="button" class="btn btn-light btn-lg" id="btn-new"><i class="icon-file-text mr-2"></i> New</button>

                <button type="button" class="btn btn-light btn-lg" id="btn-search" data-toggle="modal" data-target="#modal-search-employees"><i class="icon-search4 mr-2"></i> Search</button>
               
                <button type="submit" class="btn btn-light btn-lg" id="btn-save" disabled><i class="icon-floppy-disk mr-2"></i> Save</button>

                <button type="button" class="btn btn-outline-info btn-lg" id="btn-attributes"><i class="icon-folder-plus4 mr-2"></i> Attributes</button>
              </span>
            </div> 
            <!-- ================== Function Buttons ================= -->
        </div>  <!-- footer -->
       </div>  <!-- card -->
      </div>

      <div class="col-md-3" style="padding-left: 0px;margin-top: 20px;">
        <div class="card">
           <div class="card-body">
           <input type="text" name="trans_type" id="trans_type" value="New" style = "visibility:hidden;" required>
           <input type="hidden" id="num-id" name="num-id">
           <hr>

           <div class="form-group row">
             <div class="col-sm-12">
               <input type="file" class="form-control" id="tns-image" name="tns-image">
               <img src="views/img/machine/default/machine.jpg" class="card-img-top preview" alt="" width="100px">
             </div>
           </div>

         </div>
      </div> 
      <!-- ========================================================================= -->

    </div>  <!-- row -->
  </form>
<!--     <?php
      $createUser = new ControllerUsers();
      $createUser -> ctrCreateUser();
    ?>  -->
</div>

<script src="views/js/machine.js"></script>