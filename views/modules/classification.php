<!-- Vertical form options -->
<div class="row align-items-center h-100" style="margin:0;margin-top: 13px;">

  <div class="col-md-5 mx-auto">
  <form role="form" id="form-class" method="POST" autocomplete="nope">
    <div class="card">
      <!-- <div class="loader-transparent rounded"></div> -->
      <div class="card-header d-flex bg-transparent border-bottom">
        <h5 class="card-title flex-grow-1 profile-header-title">LOT CLASSIFICATION</h5> 
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
            <div class="col-sm-10 form-group">
                <label for="tns-classname">Class Name</label>
                <input type="text" class="form-control" id="tns-classname" name="tns-classname" autocomplete="nope" required>
            </div>                                                  

            <div class="col-sm-2 form-group">
                <label for="num-classcode">Class ID</label>
                <input type="text" class="form-control profile-code" id="num-classcode" name="num-classcode" required readonly="true">
            </div>
        </div>
 
        <div class="clearfix">
          <span class="float-left">
            
          </span>

          <input type="text" name="trans_type" id="trans_type" value="New" style="visibility:hidden;" required>
          <input type="hidden" id="num-id" name="num-id">

          <span class="float-right">
            <button type="button" class="btn btn-light btn-lg" id="btn-new"><i class="icon-file-text mr-2"></i> New</button>
           
            <button type="submit" class="btn btn-light btn-lg"><i class="icon-floppy-disk mr-2"></i> Save</button>

            <button type="button" class="btn btn-light btn-lg" id="btn-search" data-toggle="modal" data-target="#modal-search-class"><i class="icon-search4 mr-2"></i> Search</button>            
          </span>
        </div>     
      </div>  <!-- card body -->

    </div>
  </form>
    <?php
      $createClassification = new ControllerClassification();
      $createClassification -> ctrCreateClassification();

      $editClassification = new ControllerClassification();
      $editClassification -> ctrEditClassification();
    ?>
  </div>
</div>

<div id="modal-search-class" class="modal" tabindex="-1">
  <div class="modal-dialog modal-sm modal-dialog-centered">
    <div class="modal-content" style="background-color: #343f53;">
      <div class="modal-header">
        <h5 class="modal-title profile-name"><i class="icon-menu7 mr-2"></i> &nbsp;LOT CLASS LIST</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="h-divider">
      </div>

      <div class="modal-body" style="max-height: clamp(45em,100vh,250px);overflow: auto;padding-left:10px;padding-right: 10px;padding-top: 0px;">
        <table class="table table-bordered table-hover datatable-small-font profile-grid-header classTable" width="100%">
          <thead class="sticky-top">
            <tr>
              <th>Class Name</th>
            </tr>
          </thead>
          <tbody>
          <?php
            $machine_classes = (new ControllerClassification)->ctrShowClassificationList();
            foreach ($machine_classes as $key => $value) {
              echo '<tr idClass='.$value["id"].'>
                      <td>'.$value["classname"].'</td>
                    </tr>';
              }
          ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<script src="views/js/classification.js"></script>

