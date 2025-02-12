    <div class="sidebar sidebar-light sidebar-main sidebar-fixed sidebar-expand-md">
      <!-- Sidebar mobile toggler -->
      <div class="sidebar-mobile-toggler text-center">
        <a href="#" class="sidebar-mobile-main-toggle">
          <i class="icon-arrow-left8"></i>
        </a>
        Navigation
        <a href="#" class="sidebar-mobile-expand">
          <i class="icon-screen-full"></i>
          <i class="icon-screen-normal"></i>
        </a>
      </div>
      <!-- /sidebar mobile toggler -->
      <!-- Sidebar content -->
      <div class="sidebar-content">
        <!-- User menu -->
        <div class="sidebar-user">
          <div class="card-body">
            <div class="media">
              <div class="mr-3">
                <?php 
                  if ($_SESSION["photo"] != "") {
                    echo '<img src="'.$_SESSION["photo"].'"class="rounded-circle" height="38" alt="">';
                  }else{
                    echo '<img class="rounded-circle" height="38" alt="" src="views/img/users/default/anonymous.png">';
                  }
                ?>                

              </div>
              <div class="media-body">
                <?php
                  $table = 'employees';
                  $item = 'empid';
                  $value = $_SESSION["empid"];
                  $employee = (new ControllerEmployees)->ctrShowEmployees($item, $value);
                  $employee_name = $employee["fname"].' '.$employee["lname"];
                ?>

                <div class="media-title font-weight-semibold"><?php echo $employee_name; ?></div>
                <div class="font-size-xs opacity-50">
                  <i class="icon-user font-size-sm"></i> &nbsp;<?php echo $_SESSION["utype"]; ?>
                </div>
              </div>
              <div class="ml-3 align-self-center">
                <a href="#" class="text-white"><i class="icon-cog3"></i></a>
              </div>
            </div>
          </div>
        </div>
        <!-- /user menu -->

        <!-- Main navigation -->
        <div class="card card-sidebar-mobile">
          <ul class="nav nav-sidebar" data-nav-type="accordion">
            <!-- Main -->
<!--             <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu" title="Main"></i></li> -->
            <li class="nav-item">
              <a href="home" class="nav-link">
                <i class="icon-home4"></i>
                <span>
                  Dashboard
                </span>
              </a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link">
                <i class="icon-database"></i>
                <span>
                  Data Migration
                </span>
              </a>
            </li>
            <!-- Transactions -->
            <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Transactions</div> <i class="icon-menu" title="Forms"></i></li>

            <!-- <?php    
                echo '
                  <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-hammer-wrench"></i> <span>Management</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Text editors">';
                      if($_SESSION["mt"] == 1){     
                        echo '
                             <li class="nav-item"><a href="" class="nav-link">Machine Tracking</a></li>  
                        ';
                      }

                      if($_SESSION["ins"] == 1){     
                        echo '
                             <li class="nav-item"><a href="" class="nav-link">Inspection</a></li>  
                        ';
                      }                      
                    echo '</ul>';
                  echo '</li>';
            ?>  -->

            <!-- <?php    
                echo '
                  <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-stack2"></i> <span>Replenishment</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Text editors">';
                      if($_SESSION["po"] == 1){     
                        echo '
                             <li class="nav-item"><a href="purchaseorder" class="nav-link">Purchase Order</a></li>  
                        ';
                      }

                      if($_SESSION["inc"] == 1){     
                        echo '
                             <li class="nav-item"><a href="incoming" class="nav-link">Incoming Stocks</a></li>  
                        ';
                      }                      
                    echo '</ul>';
                  echo '</li>';
            ?> -->

            <!-- <?php    
                echo '
                  <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-cart-add2"></i> <span>Stock Control</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Text editors">';
                      if($_SESSION["rel"] == 1){     
                        echo '
                             <li class="nav-item"><a href="stockout" class="nav-link">Releasing</a></li>  
                        ';
                      }

                      if($_SESSION["ret"] == 1){     
                        echo '
                             <li class="nav-item"><a href="return" class="nav-link">Return</a></li>  
                        ';
                      }

                      // if($_SESSION["adj"] == 1){     
                      //   echo '
                      //        <li class="nav-item"><a href="" class="nav-link">Adjustment</a></li>  
                      //   ';
                      // }                                             
                    echo '</ul>';
                  echo '</li>';
            ?>                         -->

            <?php
                echo '
                  <li class="nav-item"><a href="sales" class="nav-link"><i class="icon-price-tags2"></i> <span>Sales</span></a></li>     
                ';                  
            ?>

            <?php
                echo '
                  <li class="nav-item"><a href="interment" class="nav-link"><i class="icon-drawer-in"></i> <span>Interment</span></a></li>     
                '; 
                ?>                     
      

            <?php
              if($_SESSION["rep"] == 1){     
                echo '
                  <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-stack"></i> <span>Reports</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Text editors">';
                      // if($_SESSION["po"] == 1){     
                      //   echo '
                      //        <li class="nav-item"><a href="" class="nav-link">Purchase Order</a></li>  
                      //   ';
                      // }

                      // if($_SESSION["inc"] == 1){     
                      //   echo '
                      //        <li class="nav-item"><a href="" class="nav-link">Incoming</a></li>  
                      //   ';
                      // }      

                      // echo '
                      //        <li class="nav-item"><a href="incomingreport" class="nav-link">Incoming Stocks</a></li>  
                      // ';                
                    echo '</ul>';
                  echo '</li>';
              }
            ?>                                              

            <?php
              if($_SESSION["su"] == 1 || $_SESSION["em"] == 1 || $_SESSION["bd"] == 1){     
                echo '
                  <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Documents</div> <i class="icon-menu" title="Forms"></i></li>

                  <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-folder-open3"></i> <span>Profile</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Text editors">';

                      if($_SESSION["su"] == 1){     
                        echo '
                             <li class="nav-item"><a href="clients" class="nav-link">Clients</a></li>  
                        ';
                      }                                            

                      if($_SESSION["em"] == 1){     
                        echo '
                             <li class="nav-item"><a href="employees" class="nav-link">Employees</a></li>  
                        ';
                      }

                      // if($_SESSION["bd"] == 1){     
                      //   echo '
                      //        <li class="nav-item"><a href="building" class="nav-link">Building</a></li>  
                      //   ';
                      // }                      
                    echo '</ul>';
                  echo '</li>';

                  echo '                  
                   <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-map5"></i> <span>Lot Info</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Text editors">';

                      if($_SESSION["prt"] == 1){     
                        echo '
                             <li class="nav-item"><a href="category" class="nav-link">Category</a></li>  
                        ';
                      }

                      if($_SESSION["cat"] == 1){     
                        echo '
                             <li class="nav-item"><a href="" class="nav-link">Block</a></li>  
                        ';
                      }

                      if($_SESSION["bnd"] == 1){     
                        echo '
                             <li class="nav-item"><a href="classification" class="nav-link">Classification</a></li>  
                        ';
                      }                      
                    echo '</ul>';
                  echo '</li>';

                  echo '                  
                  <li class="nav-item nav-item-submenu">
                   <a href="#" class="nav-link"><i class="icon-map5"></i> <span>Code Testers</span></a>
                   <ul class="nav nav-group-sub" data-submenu-title="Text editors">';
                       echo '
                            <li class="nav-item"><a href="changepolycolor1" class="nav-link">Change Polygon Color 1</a></li>  
                       '; 
                       
                       echo '
                            <li class="nav-item"><a href="changepolycolor2" class="nav-link">Change Polygon Color 2</a></li>  
                       ';   
                       
                       echo '
                            <li class="nav-item"><a href="changepolycolor3" class="nav-link">Change Polygon Color 3</a></li>  
                       ';    
                       
                       echo '
                            <li class="nav-item"><a href="finalpolytest" class="nav-link">Final Polygon Test</a></li>  
                       ';
                       
                       echo '
                            <li class="nav-item"><a href="populatecolors" class="nav-link">Populate Lot Colors</a></li>  
                       '; 

                       echo '
                            <li class="nav-item"><a href="polygonclicker" class="nav-link">Polygon Clicker</a></li>  
                       ';
                   echo '</ul>';
                 echo '</li>';                  
                  

                  // echo '                  
                  //  <li class="nav-item nav-item-submenu">
                  //   <a href="#" class="nav-link"><i class="icon-cog3"></i> <span>Equipment</span></a>
                  //   <ul class="nav nav-group-sub" data-submenu-title="Text editors">';

                  //     if($_SESSION["mac"] == 1){     
                  //       echo '
                  //            <li class="nav-item"><a href="machine" class="nav-link">Machines</a></li>  
                  //       ';
                  //     }

                  //     if($_SESSION["cls"] == 1){     
                  //       echo '
                  //            <li class="nav-item"><a href="classification" class="nav-link">Classification</a></li>  
                  //       ';
                  //     }                      
                  //   echo '</ul>';
                  // echo '</li>';

              }
            ?>            

            <!-- Access Privilege -->
            <?php
              if($_SESSION["ac"] == 1){     
                echo '
                  <li class="nav-item"><a href="" class="nav-link"><i class="icon-key"></i> <span>Access Privilege</span></a></li>     
                ';
              }
            ?>
          </ul>
        </div>
        <!-- /main navigation -->
      </div>
      <!-- /sidebar content -->
    </div>