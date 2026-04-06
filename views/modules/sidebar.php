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

                <div class="font-size-md media-title font-weight-semibold"><?php echo $employee_name; ?></div>
                <div class="font-size-sm opacity-70" style="color:gold;">
                  <i class="icon-user font-size-md"></i> &nbsp;<?php if ($_SESSION["accessprivilege"]=='Full'){                           
                                                                         echo 'Administrator';
                                                                     }else{
                                                                         echo 'Standard User';
                                                                     }
                                                                     ?>
                </div>
              </div>
              <div class="ml-3 align-self-center">
                <a href="resetloginaccount" class="text-white"><i class="icon-cog3"></i></a>
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
            <!-- <li class="nav-item">
              <a href="home" class="nav-link">
                <i class="icon-home4"></i>
                <span>
                  Dashboard
                </span>
              </a>
            </li> -->

            <?php
              if($_SESSION["dashboard"] != 'Restricted'){  
                $_SESSION["show_dashboard"] = true;
                echo '
                  <li class="nav-item"><a href="home" class="nav-link"><i class="icon-home4"></i> <span>Dashboard</span></a></li>     
                '; 
              }                 
            ?>

            <!-- <li class="nav-item">
              <a href="" class="nav-link">
                <i class="icon-database"></i>
                <span>
                  Data Migration
                </span>
              </a>
            </li> -->
            <!-- Transactions -->
            <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Transactions</div> <i class="icon-menu" title="Forms"></i></li>

            <?php
              if($_SESSION["sales"] != 'Restricted'){  
                $_SESSION["show_dashboard"] = false;
                echo '
                  <li class="nav-item"><a href="sales" class="nav-link"><i class="icon-price-tags2"></i> <span>Sales</span></a></li>     
                '; 
              }                 
            ?>

            <?php
              if($_SESSION["interment"] != 'Restricted'){
                $_SESSION["show_dashboard"] = false;
                echo '
                  <li class="nav-item"><a href="interment" class="nav-link"><i class="icon-drawer-in"></i> <span>Interment</span></a></li>     
                '; 
              }
            ?>                     
      
            <?php
              if($_SESSION["reports"] != 'Restricted'){    
                $_SESSION["show_dashboard"] = false; 
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
              if($_SESSION["clients"] != 'Restricted' || $_SESSION["employees"] != 'Restricted'){ 
                $_SESSION["show_dashboard"] = false;    
                echo '
                  <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Documents</div> <i class="icon-menu" title="Forms"></i></li>

                  <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-folder-open3"></i> <span>Profile</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Text editors">';

                      if($_SESSION["clients"] != 'Restricted'){     
                        echo '
                             <li class="nav-item"><a href="clients" class="nav-link">Clients</a></li>  
                        ';
                      }                                            

                      if($_SESSION["employees"] != 'Restricted'){     
                        echo '
                             <li class="nav-item"><a href="employees" class="nav-link">Employees</a></li>  
                        ';
                      }                    
                    echo '</ul>';
                  echo '</li>';
                  
                  if($_SESSION["lotinfo"] != 'Restricted'){ 
                    echo '                  
                    <li class="nav-item nav-item-submenu">
                      <a href="#" class="nav-link"><i class="icon-map5"></i> <span>Lot Info</span></a>
                      <ul class="nav nav-group-sub" data-submenu-title="Text editors">';
                          echo '
                              <li class="nav-item"><a href="category" class="nav-link">Category</a></li>  
                          ';
                          echo '
                              <li class="nav-item"><a href="" class="nav-link">Block</a></li>  
                          ';
                          echo '
                              <li class="nav-item"><a href="classification" class="nav-link">Classification</a></li>  
                          ';                     
                        echo '</ul>';
                      echo '</li>';
                  }








                    echo '                  
                    <li class="nav-item nav-item-submenu">
                     <a href="#" class="nav-link"><i class="icon-map5"></i> <span>Data Migration</span></a>
                     <ul class="nav nav-group-sub" data-submenu-title="Text editors">';
                        //  echo '
                        //       <li class="nav-item"><a href="lawnthree" class="nav-link">Lawn 3</a></li>  
                        //  '; 
                        
                        //  echo '
                        //       <li class="nav-item"><a href="lawntwo" class="nav-link">Lawn 2</a></li>  
                        //  ';   
                        
                         echo '
                              <li class="nav-item"><a href="lawnone" class="nav-link">Lawn 1</a></li>  
                         ';    
                        
                        //  echo '
                        //       <li class="nav-item"><a href="finalpolytest" class="nav-link">Final Polygon Test</a></li>  
                        //  ';
                        
                        //  echo '
                        //       <li class="nav-item"><a href="populatecolors" class="nav-link">Populate Lot Colors</a></li>  
                        //  '; 

                        //  echo '
                        //       <li class="nav-item"><a href="polygonclicker" class="nav-link">Polygon Clicker</a></li>  
                        //  ';
                     echo '</ul>';
                   echo '</li>';      







                //   echo '                  
                //   <li class="nav-item nav-item-submenu">
                //    <a href="#" class="nav-link"><i class="icon-map5"></i> <span>Code Testers</span></a>
                //    <ul class="nav nav-group-sub" data-submenu-title="Text editors">';
                //        echo '
                //             <li class="nav-item"><a href="changepolycolor1" class="nav-link">Change Polygon Color 1</a></li>  
                //        '; 
                       
                //        echo '
                //             <li class="nav-item"><a href="changepolycolor2" class="nav-link">Change Polygon Color 2</a></li>  
                //        ';   
                       
                //        echo '
                //             <li class="nav-item"><a href="changepolycolor3" class="nav-link">Change Polygon Color 3</a></li>  
                //        ';    
                       
                //        echo '
                //             <li class="nav-item"><a href="finalpolytest" class="nav-link">Final Polygon Test</a></li>  
                //        ';
                       
                //        echo '
                //             <li class="nav-item"><a href="populatecolors" class="nav-link">Populate Lot Colors</a></li>  
                //        '; 

                //        echo '
                //             <li class="nav-item"><a href="polygonclicker" class="nav-link">Polygon Clicker</a></li>  
                //        ';
                //    echo '</ul>';
                //  echo '</li>';                  
              }
            ?>            

            <!-- Access Privilege -->
            <?php
              if($_SESSION["accessprivilege"] != 'Restricted'){    
                $_SESSION["show_dashboard"] = false; 
                echo '
                  <li class="nav-item"><a href="accessprivilege" class="nav-link"><i class="icon-key"></i> <span>Access Privilege</span></a></li>     
                ';
              }
            ?>
          </ul>
        </div>
        <!-- /main navigation -->

        <!-- Legend Section -->
        <div class="sidebar-legend mt-4" style="padding: 10px; border-top: 1px solid rgba(255, 255, 255, 0.2); margin-top: 20px;">
            <div class="d-flex align-items-center" style="margin-bottom: 10px;">
                <span style="width: 14px; height: 14px; border-radius: 4px; background-color: #20fc03; border: 2px solid white; margin-right: 10px; margin-left: 10px; margin-top: -4px;"></span>
                <span style="font-size: 12px; font-weight: normal;">Sold</span>
            </div>
            <div class="d-flex align-items-center" style="margin-bottom: 10px;">
                <span style="width: 14px; height: 14px; border-radius: 4px; background-color: yellow; border: 2px solid white; margin-right: 10px; margin-left: 10px; margin-top: -4px;"></span>
                <span style="font-size: 12px; font-weight: normal;">Used</span>
            </div>
            <div class="d-flex align-items-center" style="margin-bottom: 10px;">
                <span style="width: 14px; height: 14px; border-radius: 4px; background-color: #ff5784; border: 2px solid white; margin-right: 10px; margin-left: 10px; margin-top: -4px;"></span>
                <span style="font-size: 12px; font-weight: normal;">Cancelled</span>
            </div>
            <!-- New White Square -->
            <div class="d-flex align-items-center">
                <span style="width: 14px; height: 14px; border-radius: 4px; background-color: white; border: 2px solid white; margin-right: 10px; margin-left: 10px; margin-top: -4px;"></span>
                <span style="font-size: 12px; font-weight: normal;">Available</span>
            </div>
        </div>
      </div>
      <!-- /sidebar content -->
    </div>