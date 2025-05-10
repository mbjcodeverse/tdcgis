if (!$.fn.DataTable.isDataTable('.salesTransactionTable')) {
    var stl = $('.salesTransactionTable').DataTable({
        deferRender: true,
        processing: true,
        autoWidth: true,
        scrollY: 360,
        pagelength: 25,
        lengthMenu: [[25, 50], [25, 50]],
        dom: '<"datatable-header"><"datatable-scroll"t><"datatable-footer"fp>',
                language: {
                    loadingRecords: 'Please wait - loading...',
                    processing: '<i class="fa fa-spinner fa-spin fa-2x fa-fw"></i>',
                    search: '<span>Filter:</span> _INPUT_',
                    searchPlaceholder: 'Type to filter...',
                    lengthMenu: '<span>Show:</span> _MENU_',
                    paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
                }
    });
  }

if (!$.fn.DataTable.isDataTable('.salesHistoryTable')) {
    var shr = $('.salesHistoryTable').DataTable({
        deferRender: true,
        processing: true,
        autoWidth: true,
        scrollY: 100,
        pagelength: 4,
        lengthMenu: [[25, 50], [25, 50]],
        dom: '<"datatable-header"><"datatable-scroll"t><"datatable-footer">',
                language: {
                    emptyTable: 'No sales history in the database',
                    loadingRecords: 'Please wait - loading...',
                    processing: '<i class="fa fa-spinner fa-spin fa-2x fa-fw"></i>',
                    search: '<span>Filter:</span> _INPUT_',
                    searchPlaceholder: 'Type to filter...',
                    lengthMenu: '<span>Show:</span> _MENU_',
                    paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
                }
    });
  }  

if (!$.fn.DataTable.isDataTable('.availableLotTable')) {
    var avl = $('.availableLotTable').DataTable({
        deferRender: true,
        processing: true,
        autoWidth: true,
        scrollY: 360,
        pagelength: 25,
        lengthMenu: [[25, 50], [25, 50]],
        dom: '<"datatable-header"f><"datatable-scroll"t><"datatable-footer"p>',
                language: {
                    loadingRecords: 'Please wait - loading...',
                    processing: '<i class="fa fa-spinner fa-spin fa-2x fa-fw"></i>',
                    search: '<span>Filter:</span> _INPUT_',
                    searchPlaceholder: 'Type to filter...',
                    lengthMenu: '<span>Show:</span> _MENU_',
                    paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
                }
    });
  }  

$('#modal-search-clients').on('shown.bs.modal', function () {
   var tableclients = $('.clientsTable').DataTable();
   tableclients.columns.adjust();
});

$('#modal-search-clients-transfer-resale').on('shown.bs.modal', function () {
   var tablemodalclients = $('.clientsModalTable').DataTable();
   tablemodalclients.columns.adjust();
});

$(function() {
  $('input[type="text"], textarea').css('border', '1px solid rgba(255, 255, 255, 0.3)');

  initialize();

  $('#lst_date_range').daterangepicker({
    ranges:{
      'Today'         : [moment(),moment()],
      'Yesterday'     : [moment().subtract(1,'days'), moment().subtract(1,'days')],
      'Last 7 Days'   : [moment().subtract(6,'days'), moment()],
      'This Month'    : [moment().startOf('month'), moment().endOf('month')]
    }
  });

  // $('#lst_date_range').val('');

  // Initialize the daterangepicker
  // $('#lst_date_range').daterangepicker({
  //   ranges: {
  //     'Today'         : [moment(), moment()],
  //     'Yesterday'     : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
  //     'Last 7 Days'   : [moment().subtract(6, 'days'), moment()],
  //     'This Month'    : [moment().startOf('month'), moment().endOf('month')]
  //   },
  //   autoUpdateInput: false, // Prevent automatic input update
  //   locale: {
  //     cancelLabel: 'Clear'
  //   }
  // }, function(start, end, label) {
  //   // When a date range is selected, update the input field manually
  //   if (label === '') {
  //     $('#lst_date_range').val(''); // Clear the input if blank is selected
  //   } else {
  //     $('#lst_date_range').val(start.format('MM/DD/YYYY') + ' - ' + end.format('MM/DD/YYYY')); // Update with the selected range
  //   }
  // });

  $("#btn-addclient").click(function(){
      window.location = "clients";
  });

  $("#lbl-lst-categorycode").click(function(){
      $("#lst-categorycode").val('').trigger('change');
  });

  $("#lbl-lst-classcode").click(function(){
      $("#lst-classcode").val('').trigger('change');
  });   
  
  $("#lbl-lst-salestatus").click(function(){
      $("#lst-salestatus").val('').trigger('change');
  });  
  
  $('#modal-search-sales').on('shown.bs.modal', function () {
      stl.search('').draw();  // clear datatable filter textbox
      stl.table().container().querySelector('.dataTables_filter input').focus(); // set focus
      $("#lst-salestatus").val('').trigger('change');
  });

  // when modal search lot is open - show available lots with map locator
  $('#modal-search-lot').on('shown.bs.modal', function () {
    avl.search('').draw();  // clear datatable filter textbox
    avl.table().container().querySelector('.dataTables_filter input').focus(); // set focus
    $('.dataTables_filter input').css('width', '300px');  // increase length of Filter text box
    $.ajax({
      url:"ajax/available_lot_list.ajax.php",   
      method: "POST",                                  
      cache: false,                  
      contentType: false,            
      processData: false,            
      dataType:"json",               
      success:function(answer){
          $(".availableLotTable").DataTable().clear();
          for(var i = 0; i < answer.length; i++) {  
            var al = answer[i];
            var lotid = al.lotid;
            var catdescription = al.catdescription;
            var latitude = al.latitude;
            var longitude = al.longitude;

            var button = "<td><button type='button' class='btn btn-outline btn-sm bg-green-400 border-green-400 text-green-400 btn-icon rounded-round border-2 ml-2 btnAvailableLot' lotid='"+lotid+"' latitude='"+latitude+"' longitude='"+longitude+"'><i class='icon-pencil3'></i></button></td><td><button type='button' class='btn btn-outline btn-sm bg-orange-400 border-orange-400 text-orange-400 btn-icon rounded-round border-2 ml-2 btnLocate' lotid='"+lotid+"' latitude='"+latitude+"' longitude='"+longitude+"'><i class='icon-location3'></i></button></td>";  
            avl.row.add([lotid, catdescription, button]);
          }
          avl.draw();
      },
      beforeSend: function() {
      },  
      complete: function() {
      }, 
    })      
  });
  
  $('#lst-categorycode, #lst_date_range, #lst-classcode, #lst-salestatus').on("change", function(){
    let categorycode = $("#lst-categorycode").val();

    let date_range = $("#lst_date_range").val();
    let start_date = date_range.substring(6, 10) + '-' + date_range.substring(0, 2) + '-' + date_range.substring(3, 5);
    let end_date = date_range.substring(19, 23) + '-' + date_range.substring(13, 15) + '-' + date_range.substring(16, 18);

    let classcode = $("#lst-classcode").val();
    let salestatus = $("#lst-salestatus").val();    

    var data = new FormData();
    data.append("categorycode", categorycode);
    data.append("start_date", start_date);
    data.append("end_date", end_date);
    data.append("classcode", classcode);
    data.append("salestatus", salestatus);

    $.ajax({
        url: "ajax/sales_transaction_list.ajax.php",   
        method: "POST",                
        data: data,                    
        cache: false,                  
        contentType: false,            
        processData: false,            
        dataType: "json",               
        success: function(answer) {
            // Prepare an array to hold all the rows
            var rows = [];

            for (var i = 0; i < answer.length; i++) {  
                var st = answer[i];
                var pur_date = st.purdate.split("-");
                var formattedPurDate = pur_date[1] + "/" + pur_date[2] + "/" + pur_date[0];
                
                var lname = st.lname;
                var fname = st.fname;
                var mi = st.mi;
                var full_name = (mi != '') ? lname + ', ' + fname + ' ' + mi + '.' : lname + ', ' + fname;

                var catdescription = st.catdescription;
                var salestatus = st.salestatus;
                var beneficiary = st.beneficiary;
                var decedentlist = '';

                if (st.decedentlist != '') {
                    decedentlist = JSON.parse(st.decedentlist).map(item => item.decedent).join(", ");
                }

                var button = "<td><button type='button' class='btn btn-outline btn-sm bg-green-400 border-green-400 text-green-400 btn-icon rounded-round border-2 ml-2 btnSale' saleid='"+st.saleid+"' lotid='"+st.lotid+"' latitude='"+st.latitude+"' longitude='"+st.longitude+"'><i class='icon-pencil3'></i></button></td>";

                // Push the row data into the array
                rows.push([full_name, formattedPurDate, st.lotid, catdescription, salestatus, beneficiary, decedentlist, button]);
            }

            // Clear the DataTable and add all rows at once
            var table = $(".salesTransactionTable").DataTable();
            table.clear().rows.add(rows).draw();
        },
        beforeSend: function() {
            // Optionally, show a loading spinner here
        },  
        complete: function() {
            // Apply padding styles after DataTable is drawn - adjust row height of data table
            $(".salesTransactionTable td").css({
                "padding-top": "5px",
                "padding-bottom": "5px"
            });
        }, 
    });
  }); 

  // Ensure that padding is applied whenever DataTable redraws (e.g., page switch or filtering)
  $(".salesTransactionTable").on("draw.dt", function () {
    $(".salesTransactionTable td").css({
        "padding-top": "5px",
        "padding-bottom": "5px"
    });
  });

  $("#btn-new").click(function(){
    new_sale();
  }); 

  $("#btn-save").click(function(){
    save_sale();
  });

  $('.clientsTable tbody').on('dblclick', 'tr', function () {
    var idClient = $(this).attr("idClient");
    var data = new FormData();
    data.append("idClient", idClient);
    $.ajax({
       url:"ajax/get_client_record.ajax.php",
       method: "POST",
       data: data,
       cache: false,
       contentType: false,
       processData: false,
       dataType:"json",
       success:function(answer){      
          $("#txt-clientid").val(answer["clientid"]);       
          $("#txt-lname").val(answer["lname"].toUpperCase());
          $("#txt-fname").val(answer["fname"].toUpperCase());
          $("#txt-mi").val(answer["mi"]);
          $("#modal-search-clients").modal('hide');
       }
    })
  }); 

  // Search Sale
  $(".salesTransactionTable tbody").on("click", "button.btnSale", function(){
    $("#modal-search-sales").modal("hide");
    $("#trans_type").val("Update");
    var saleid = $(this).attr("saleid");
    var data = new FormData();
    data.append("saleid", saleid);
    $.ajax({
      url:"ajax/sale_get_record.ajax.php",
      method: "POST",
      data: data,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(answer){
        $("#txt-clientid").val(answer["clientid"]);

        $("#txt-lname").val(answer["lname"].toUpperCase());
        $("#txt-fname").val(answer["fname"].toUpperCase());
        $("#txt-mi").val(answer["mi"]);
        $("#txt-saleid").val(answer["saleid"]);

        let purdate = answer["purdate"].split("-");
        purdate = purdate[1] + "/" + purdate[2] + "/" + purdate[0];
        if (purdate == '00/00/0000'){      
          purdate = '';
        }
        $("#date-purdate").val(purdate);

        $("#txt-salestatus").val(answer["salestatus"]);
        $("#txt-lotid").val(answer["lotid"]);
        $("#txt-beneficiary").val(answer["beneficiary"]);
        $("#sel-relation").val(answer["relation"]).trigger('change');
        $("#txt-councilor").val(answer["councilor"]);
        $("#txt-remarks").val(answer["remarks"]);

        let certdate = answer["certdate"].split("-");
        certdate = certdate[1] + "/" + certdate[2] + "/" + certdate[0];
        if (certdate == '00/00/0000'){      
          certdate = '';
        }
        $("#date-certdate").val(certdate);

        $("#txt-certnum").val(answer["certnum"]);
        $("#txt-scode").val(answer["scode"]);
        $("#txt-salecode").val(answer["salecode"]);

        let salestatus = $("#txt-salestatus").val();
        switch (salestatus){
          case "Sold":
            $('#btn-cancel').show();
            $('#btn-transfer').show();
            $('#btn-resale').show();
            break;
          case "Cancelled":
            $('#btn-cancel').hide();
            $('#btn-transfer').hide();
            $('#btn-resale').show();
            disableSaleControls();
            $('#btn-save').prop('disabled', true); 
            break;    
          case "Transferred":
            $('#btn-cancel').show();
            $('#btn-transfer').hide();
            $('#btn-resale').show();
            break;                     
        }

        showSalesHistory();
      }
    })
  });   

  $(".availableLotTable tbody").on("click", "button.btnAvailableLot", function(){
    $("#modal-search-lot").modal("hide");
    var lotid = $(this).attr("lotid");
    $("#txt-lotid").val(lotid);
  }); 

  function new_sale(){
     swal.fire({
        title: 'Do you want to create new sales transaction?',
        type: 'question',
        showCancelButton: true,
        confirmButtonText: 'Yes, Create!',
        cancelButtonText: 'No',
        confirmButtonClass: 'btn btn-outline-success',
        cancelButtonClass: 'btn btn-outline-danger',
        allowOutsideClick: false,
        buttonsStyling: false
     }).then(function(result) {
         if(result.value) {  
           initialize();
           $('#btn-client, #btn-addclient, #btn-lotid, #btn-councilor').prop('disabled', false);
         }
     }); 	
  }   

  function initialize(){
    $('#trans_type').val('New');
    $("#txt-clientid").val('');

    $("#txt-lname").val('');
    $("#txt-fname").val('');
    $("#txt-mi").val('');

    $("#txt-saleid").val('');
    $("#date-purdate").val('');
    
    $("#txt-salestatus").val('Sold');
    $("#txt-lotid").val('');

    $("#txt-beneficiary").val('');   
    $("#sel-relation").val('').trigger('change');
    $("#txt-councilor").val('');
    $("#date-certdate").val('');
    $("#txt-certnum").val('');
    $("#txt-scode").val('');
    $("#txt-salecode").val('');

    $("#txt-remarks").val('');

    $(".salesHistoryTable").DataTable().clear().draw();

    $('#btn-cancel').hide();
    $('#btn-transfer').hide();
    $('#btn-resale').hide();
  }

  function save_sale(){
    swal.fire({
       title: 'Do you want to save new sales transaction?',
       type: 'question',
       showCancelButton: true,
       confirmButtonText: 'Yes, save!',
       cancelButtonText: 'No',
       confirmButtonClass: 'btn btn-outline-success',
       cancelButtonClass: 'btn btn-outline-danger',
       allowOutsideClick: false,
       buttonsStyling: false
    }).then(function(result) {
        if(result.value) {  
          postsale();
        }
    }); 	
  } 

  function postsale(){
    $("#btn-save").prop('disabled', true);       

    var trans_type = $("#trans_type").val();
    var saleid = $("#txt-saleid").val();
    var salestatus = $("#txt-salestatus").val();
    var scode = $("#txt-scode").val();
    var salecode = $("#txt-salecode").val();
    var lotid = $("#txt-lotid").val();
    var clientid = $("#txt-clientid").val();

    let format_purdate = $("#date-purdate").val().split("/");
    format_purdate = format_purdate[2] + "-" + format_purdate[0] + "-" + format_purdate[1];
    var purdate = format_purdate;

    var certnum = $("#txt-certnum").val();

    let format_certdate = $("#date-certdate").val().split("/");
    format_certdate = format_certdate[2] + "-" + format_certdate[0] + "-" + format_certdate[1];
    var certdate = format_certdate;

    var beneficiary = $("#txt-beneficiary").val();
    var relation = $("#sel-relation").val();
    var councilor = $("#txt-councilor").val();
    var remarks = $("#txt-remarks").val();
          
    var sales = new FormData();
    sales.append("trans_type", trans_type);
    sales.append("saleid", saleid);
    sales.append("salestatus", salestatus);
    sales.append("scode", scode);
    sales.append("salecode", salecode);
    sales.append("lotid", lotid);
    sales.append("clientid", clientid);
    sales.append("purdate", purdate);
    sales.append("certnum", certnum);
    sales.append("certdate", certdate);
    sales.append("beneficiary", beneficiary);
    sales.append("relation", relation);
    sales.append("councilor", councilor);  
    sales.append("remarks", remarks);          
    $.ajax({
       url:"ajax/sale_save_record.ajax.php",
       method: "POST",
       data: sales,
       cache: false,
       contentType: false,
       processData: false,
       async: false,
       dataType:"text",
       success:function(answer){
          $("#btn-save").prop('disabled', false);                           
       },
       error: function () {
          alert("Oops. Something went wrong!");
       },
       complete: function () {
          swal.fire({
             title: 'Sales transaction successfully saved!',
             type: 'success',
             allowOutsideClick: false,
             showConfirmButton: false,
             timer: 1500
          })

          initialize(); 
       }
    })   	
  }

  var sales_access = $("#sales-access").val();
  if (sales_access == 'ViewOnly'){
    $('select').prop('disabled', true);

    $('input[type="text"]').prop('readonly', true);
    $('textarea').prop('readonly', true);

    $('button').prop('disabled', true);

    $('#btn-search').prop('disabled', false);
  }

  $('#btn-lotid').hover(
    function() {
        $('#btn-labels').text('List of unsold lots with map locator');
    }, 
    function() {
        $('#btn-labels').text('');
    }
  );

  $('#btn-client').hover(
    function() {
        $('#btn-labels').text('List of registered clients');
    }, 
    function() {
        $('#btn-labels').text('');
    }
  );

  $('#btn-addclient').hover(
    function() {
        $('#btn-labels').text('Register new client');
    }, 
    function() {
        $('#btn-labels').text('');
    }
  );  

  // Sale Cancellation ----------------------------------------
  // Clear date cancelled and remarks when modal form shows
  $('#modal-cancel-sale').on('shown.bs.modal', function () {
    $('#date-cancelled').val('');
    $('#txt-cancelremarks').val('');
  });

  $("#btn-cancelsale").click(function(){
    if ($('#date-cancelled').val() === '' || $('#txt-cancelremarks').val() === '') {
      swal.fire({
        title: 'Date of cancellation and remarks must not be empty!',
        type: 'error',
        allowOutsideClick: false,
        showConfirmButton: false,
        timer: 2000
      })    
    }else{
      swal.fire({
        title: 'Do you want to create new sales transaction?',
        type: 'question',
        showCancelButton: true,
        confirmButtonText: 'Yes, Create!',
        cancelButtonText: 'No',
        confirmButtonClass: 'btn btn-outline-success',
        cancelButtonClass: 'btn btn-outline-danger',
        allowOutsideClick: false,
        buttonsStyling: false
      }).then(function(result) {
         if(result.value) {  
           postsalehistory();
           cancelsale();
           showSalesHistory();
         }
      });
    }
  });

  // Resale or Transfer of Lot -------------------------------------------------
  $('#btn-transfer').click(function() {
    // $('#lbl-transfer-resale').text('LOT TRANSFER');
    // $("#btn-transfer-resale").text("TRANSFER LOT");
    $("#btn-transfer-resale").html('<i class="icon-price-tags2 mr-2"></i>TRANSFER LOT');
  });

  $('#btn-resale').click(function() {
    // $('#lbl-transfer-resale').text('LOT RESALE');
    // $("#btn-transfer-resale").text("RESALE LOT");
    $("#btn-transfer-resale").html('<i class="icon-price-tags2 mr-2"></i>RESALE LOT');
  });

  $('#btn-transfer-resale').click(function() {
    let lname = $("#tr-lname").val();
    let fname = $("#tr-fname").val();
    let purdate = $("#tr-purdate").val();

    if (lname == '' || fname == '' || purdate == ''){
      swal.fire({
        title: 'Lastname, Firstname, and Date must not be empty!',
        type: 'error',
        allowOutsideClick: false,
        showConfirmButton: false,
        timer: 2500
     })
    }else{
      let transaction = $('#btn-transfer-resale').text();
      if (transaction == 'TRANSFER LOT'){
        var title_text = 'Do you want to transfer sale transaction?'
      }else{
        var title_text = 'Do you want to resale selected lot?'
      }
      
      swal.fire({
        title: title_text,
        type: 'question',
        showCancelButton: true,
        confirmButtonText: 'Yes, Create!',
        cancelButtonText: 'No',
        confirmButtonClass: 'btn btn-outline-success',
        cancelButtonClass: 'btn btn-outline-danger',
        allowOutsideClick: false,
        buttonsStyling: false
      }).then(function(result) {
         if(result.value) {  
           postsalehistory();
           transfer_resale();
           showSalesHistory();
         }
      });
    }
  });  

  $('#btn-modal-addclient').click(function() {
    $('#tr-lname, #tr-fname, #tr-mi, #tr-landline, #tr-mobile, #tr-email, #tr-address').prop('readonly', false);
    $('#tr-lname, #tr-fname, #tr-mi, #tr-landline, #tr-mobile, #tr-email, #tr-address, #tr-clientid').val('');
    $('#tr-lname').focus();
  });

  $('#modal-transfer-resale').on('shown.bs.modal', function () {
    $('#tr-lname, #tr-fname, #tr-mi, #tr-landline, #tr-mobile, #tr-email, #tr-address, #tr-clientid, #tr-purdate, #tr-beneficiary, #tr-remarks, #tr-certnum, #tr-scode, #tr-salecode').val('');
    $('#tr-lname, #tr-fname, #tr-mi, #tr-landline, #tr-mobile, #tr-email, #tr-address, #tr-beneficiary, #tr-remarks, #tr-certnum, #tr-scode, #tr-salecode').prop('readonly', false);
    $("#tr-relation").val('').trigger('change');
    $('#tr-lname').focus();
  });

  // Resale Lot - search existing clients
  $('.clientsModalTable tbody').on('dblclick', 'tr', function () {
    var idClient = $(this).attr("idClient");
    var data = new FormData();
    data.append("idClient", idClient);
    $.ajax({
       url:"ajax/get_client_record.ajax.php",
       method: "POST",
       data: data,
       cache: false,
       contentType: false,
       processData: false,
       dataType:"json",
       success:function(answer){      
          $("#tr-clientid").val(answer["clientid"]);       
          $("#tr-lname").val(answer["lname"].toUpperCase());
          $("#tr-fname").val(answer["fname"].toUpperCase());
          $("#tr-mi").val(answer["mi"]);
          $('#tr-lname, #tr-fname, #tr-mi, #tr-landline, #tr-mobile, #tr-email, #tr-address').prop('readonly', true);
          $("#modal-search-clients-transfer-resale").modal('hide');
       }
    })
  }); 

  // This prevents from closing modal-transfer-resale, when modal-search-clients-transfer-resale is being closed
  $("#close-modal-client").click(function(){
    $("#modal-search-clients-transfer-resale").modal('hide');
  });

  function showSalesHistory(){
    let lotid = $("#txt-lotid").val();
 
    let sales_history = new FormData();
    sales_history.append("lotid", lotid);

    $.ajax({
      url:"ajax/sales_history_list.ajax.php",
      method: "POST",
      data: sales_history,
      cache: false,
      contentType: false,
      processData: false,
      async: false,
      dataType:"json",
      success:function(answer){ 
        $(".salesHistoryTable").DataTable().clear();
        for(var i = 0; i < answer.length; i++) {  
          var sh = answer[i];
          var lname = sh.lname;
          var fname = sh.fname;
          var mi = sh.mi;
          var full_name = (mi != '') ? lname + ', ' + fname + ' ' + mi + '.' : lname + ', ' + fname;
          
          var pur_date = sh.purdate;
          var purdate = pur_date.split("-");
          purdate = purdate[1] + "/" + purdate[2] + "/" + purdate[0];

          var salestatus = sh.salestatus;
          var beneficiary = sh.beneficiary;
          // var remarks = sh.remarks;
          var remarks = sh.remarks.length > 50 ? sh.remarks.substring(0, 50) + ' . . .' : sh.remarks;

          var button = "<td><button type='button' class='btn btn-outline btn-sm bg-green-400 border-green-400 text-green-400 btn-icon rounded-round border-2 ml-2 btnSaleDetail' salestatus='"+salestatus+"'><i class='icon-pencil3'></i></button></td>";
          shr.row.add([full_name, salestatus, purdate, beneficiary, remarks, button]);
        }

        shr.draw();   
        $(".salesHistoryTable td").css("padding-top", "3px"); // Adjust the value as needed 
        $(".salesHistoryTable td").css("padding-bottom", "3px"); // Adjust the value as needed   
        
        // Apply the ellipsis effect to the remarks column dynamically
        $(".salesHistoryTable td:nth-child(5)").css({
          "white-space": "nowrap",
          "overflow": "hidden",
          "text-overflow": "ellipsis",
          "max-width": "50px" // Set appropriate width for truncation
        });

        let tableHistory = $('.salesHistoryTable').DataTable();
        tableHistory.columns.adjust();

        // Adjust the icon size with jQuery
        $(".salesHistoryTable .btnSaleDetail i").css({
          "font-size": "10px",  // Set the desired icon size
          "padding": "3px"      // Optional: Adjust padding for spacing around the icon
        });
      }
    })
  }

  function cancelsale(){
    let format_date_cancelled = $("#date-cancelled").val().split("/");
    format_date_cancelled = format_date_cancelled[2] + "-" + format_date_cancelled[0] + "-" + format_date_cancelled[1];
    var datecancelled = format_date_cancelled;
    var cancelremarks = $("#txt-cancelremarks").val();
    var saleid = $("#txt-saleid").val();
    var lotid = $("#txt-lotid").val();

    var sales_cancel = new FormData();
    sales_cancel.append("datecancelled", datecancelled);
    sales_cancel.append("cancelremarks", cancelremarks);
    sales_cancel.append("saleid", saleid);
    sales_cancel.append("lotid", lotid);

    $.ajax({
      url:"ajax/sale_cancel_record.ajax.php",
      method: "POST",
      data: sales_cancel,
      cache: false,
      contentType: false,
      processData: false,
      async: false,
      dataType:"text",
      success:function(answer){    
      },
      error: function () {
         alert("Oops. Something went wrong!");
      },
      complete: function () {
          swal.fire({
            title: 'Sales has been successfully cancelled . .',
            type: 'success',
            allowOutsideClick: false,
            showConfirmButton: false,
            timer: 1500
          })

          $("#txt-remarks").val($("#txt-cancelremarks").val()); 
          $("#date-purdate").val($("#date-cancelled").val());  
          $("#txt-salestatus").val('Cancelled');

          disableSaleControls();
          
          $('#btn-cancel').hide();
          $('#btn-transfer').hide();
          $('#btn-resale').show();

          $('#btn-save').prop('disabled', true); 

          $('#modal-cancel-sale').modal('hide');
      }
    })   	
  }

  function transfer_resale(){
    let transaction = $('#btn-transfer-resale').text();  // RESALE LOT, TRANSFER LOT
    let lotid = $("#txt-lotid").val();
    let saleid = $("#txt-saleid").val();

    let lname = $("#tr-lname").val();
    let fname = $("#tr-fname").val();
    let mi = $("#tr-mi").val();

    let clientid = $("#tr-clientid").val();
    if (clientid == ''){
      var client_status = 'New';
    }else{
      var client_status = 'Existing'
    }

    let landline = $("#tr-landline").val();
    let mobile = $("#tr-mobile").val();
    let email = $("#tr-email").val();
    let address = $("#tr-address").val();

    let format_purdate = $("#tr-purdate").val().split("/");
    format_purdate = format_purdate[2] + "-" + format_purdate[0] + "-" + format_purdate[1];
    let purdate = format_purdate;

    let beneficiary = $("#tr-beneficiary").val();
    let relation = $("#tr-relation").val();
    let certnum = $("#tr-certnum").val();
    let scode = $("#tr-scode").val();
    let salecode = $("#tr-salecode").val();
    let remarks = $("#tr-remarks").val();

    var transfer_resale = new FormData();
    transfer_resale.append("transaction", transaction);
    transfer_resale.append("lotid", lotid);
    transfer_resale.append("saleid", saleid);
    transfer_resale.append("lname", lname);
    transfer_resale.append("fname", fname);
    transfer_resale.append("mi", mi);
    transfer_resale.append("clientid", clientid);
    transfer_resale.append("client_status", client_status);
    transfer_resale.append("landline", landline);
    transfer_resale.append("mobile", mobile);
    transfer_resale.append("email", email);
    transfer_resale.append("address", address);
    transfer_resale.append("purdate", purdate);
    transfer_resale.append("beneficiary", beneficiary);
    transfer_resale.append("relation", relation);
    transfer_resale.append("certnum", certnum);
    transfer_resale.append("scode", scode);
    transfer_resale.append("salecode", salecode);
    transfer_resale.append("remarks", remarks);
    // alert(transaction + ',' + lotid + ',' + lname + ',' + fname + ',' + mi + ',' + clientid + ',' + client_status + ',' + landline + ',' + mobile + ',' + email + ',' + address + ',' + purdate + ',' + beneficiary + ',' + relation + ',' + remarks);
    $.ajax({
      url:"ajax/sale_transfer_resale_save_record.ajax.php",
      method: "POST",
      data: transfer_resale,
      cache: false,
      contentType: false,
      processData: false,
      async: false,
      dataType:"text",
      success:function(answer){     
        let clientid_saleid = answer.split(",");
        let _clientid = clientid_saleid[0];
        let _saleid = clientid_saleid[1];

        $("#txt-clientid").val(_clientid);
        $("#txt-saleid").val(_saleid);
      },
      error: function () {
         alert("Oops. Something went wrong!");
      },
      complete: function () {
         if (transaction == 'RESALE LOT'){
           var msg_text = "Lot resale successfully posted!";
           var trans_text = "Resale";
         }else{
           var msg_text = "Lot transfer successfully posted!";
           var trans_text = "Transferred";
         } 

         swal.fire({
            title: msg_text,
            type: 'success',
            allowOutsideClick: false,
            showConfirmButton: false,
            timer: 1500
         })
         
         $("#txt-lname").val($("#tr-lname").val());
         $("#txt-fname").val($("#tr-fname").val());
         $("#txt-mi").val($("#tr-mi").val());
         $("#date-purdate").val($("#tr-purdate").val()); 
         $("#txt-beneficiary").val($("#tr-beneficiary").val());
         $("#txt-relation").val($("#tr-relation").val());
         $("#txt-certnum").val($("#tr-certnum").val());
         $("#txt-scode").val($("#tr-scode").val());
         $("#txt-salecode").val($("#tr-salecode").val());
         $("#txt-remarks").val($("#tr-remarks").val());  
         $("#txt-salestatus").val(trans_text);

        //  disableSaleControls();
          
         $('#btn-cancel').hide();
         $('#btn-transfer').hide();
         $('#btn-resale').show();

         $('#btn-save').prop('disabled', false); 

         $('#modal-transfer-resale').modal('hide');
      }
    })   	
  }

  function postsalehistory(){
    var saleid = $("#txt-saleid").val();
    var salestatus = $("#txt-salestatus").val();
    var scode = $("#txt-scode").val();
    var salecode = $("#txt-salecode").val();
    var lotid = $("#txt-lotid").val();
    var clientid = $("#txt-clientid").val();

    let format_purdate = $("#date-purdate").val().split("/");
    format_purdate = format_purdate[2] + "-" + format_purdate[0] + "-" + format_purdate[1];
    var purdate = format_purdate;

    var certnum = $("#txt-certnum").val();

    let format_certdate = $("#date-certdate").val().split("/");
    format_certdate = format_certdate[2] + "-" + format_certdate[0] + "-" + format_certdate[1];
    var certdate = format_certdate;

    var beneficiary = $("#txt-beneficiary").val();
    var relation = $("#sel-relation").val();
    var councilor = $("#txt-councilor").val();
    var remarks = $("#txt-remarks").val();
          
    var sales = new FormData();
    sales.append("saleid", saleid);
    sales.append("salestatus", salestatus);
    sales.append("scode", scode);
    sales.append("salecode", salecode);
    sales.append("lotid", lotid);
    sales.append("clientid", clientid);
    sales.append("purdate", purdate);
    sales.append("certnum", certnum);
    sales.append("certdate", certdate);
    sales.append("beneficiary", beneficiary);
    sales.append("relation", relation);
    sales.append("councilor", councilor);  
    sales.append("remarks", remarks);          
    $.ajax({
       url:"ajax/sale_save_history_record.ajax.php",
       method: "POST",
       data: sales,
       cache: false,
       contentType: false,
       processData: false,
       async: false,
       dataType:"text",
       success:function(answer){                          
       },
       error: function () {
          alert("Oops. Something went wrong!");
       },
       complete: function () {
          // swal.fire({
          //    title: 'Sales history posted . . please wait . .',
          //    type: 'success',
          //    allowOutsideClick: false,
          //    showConfirmButton: false,
          //    timer: 1500
          // })
          // initialize(); 
       }
    })   	
  }

  function disableSaleControls(){
    $('input[type="text"], select, textarea').prop('readonly', true); 
    $('#sel-relation, #date-certdate').prop('disabled', true); 
    $('#btn-client, #btn-addclient, #btn-lotid, #btn-councilor').prop('disabled', true);
  }
});    