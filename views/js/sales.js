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

$('#modal-search-clients').on('shown.bs.modal', function () {
   var tableclients = $('.clientsTable').DataTable();
   tableclients.columns.adjust();
});

$(function() {
  $('#lst_date_range').daterangepicker({
    ranges:{
      'Today'         : [moment(),moment()],
      'Yesterday'     : [moment().subtract(1,'days'), moment().subtract(1,'days')],
      'Last 7 Days'   : [moment().subtract(6,'days'), moment()],
      'This Month'    : [moment().startOf('month'), moment().endOf('month')]
    }
  });

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
      $("#lst-salestatus").val('Sold').trigger('change');
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
            url:"ajax/sales_transaction_list.ajax.php",   
            method: "POST",                
            data: data,                    
            cache: false,                  
            contentType: false,            
            processData: false,            
            dataType:"json",               
            success:function(answer){
                $(".salesTransactionTable").DataTable().clear();
                for(var i = 0; i < answer.length; i++) {  
                  var st = answer[i];
                  var saleid = st.saleid;
                  var lotid = st.lotid;
                  
                  var pur_date = st.purdate;
                  var purdate = pur_date.split("-");
                  purdate = purdate[1] + "/" + purdate[2] + "/" + purdate[0];
                  
                  // var full_name = st.full_name;
                  var lname = st.lname;
                  var fname = st.fname;
                  var mi = st.mi;
                  var full_name = (mi != '') ? lname + ', ' + fname + ' ' + mi + '.' : lname + ', ' + fname;

                  var catdescription = st.catdescription;
                  
                  var beneficiary = st.beneficiary;
                  var latitude = st.latitude;
                  var longitude = st.longitude;
                  // let salestatus = st.salestatus;

                  var button = "<td><button type='button' class='btn btn-outline btn-sm bg-green-400 border-green-400 text-green-400 btn-icon rounded-round border-2 ml-2 btnSale' saleid='"+saleid+"' lotid='"+lotid+"' latitude='"+latitude+"' longitude='"+longitude+"'><i class='icon-pencil3'></i></button></td>";  
                  stl.row.add([full_name, purdate, lotid, catdescription, beneficiary, button]);
                }
                stl.draw();

              //   notice.update(options);
              //   notice.remove();
              //   return;
            },
            beforeSend: function() {
            },  
            complete: function() {
            }, 
      })    
  });   

  $("#btn-new").click(function(){
    new_sale();
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
          $("#txt-lname").val(answer["lname"]);
          $("#txt-fname").val(answer["fname"]);
          $("#txt-mi").val(answer["mi"]);
          $("#modal-search-clients").modal('hide');
       }
    })
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
         }
     }); 	
  }   

  function initialize(){
    $("#txt-lname").val('');
    $("#txt-fname").val('');
    $("#txt-mi").val('');

    $("#txt-saleid").val('');
    
    $("#sel-salestatus").val('').trigger('change');
    $("#txt-lotid").val('');
    $("#txt-catdescription").val('');
    $("#txt-classname").val('');

    $("#txt-lotnum").val('');
    $("#txt-letter").val('');

    $("#txt-blname").val('');
    $("#txt-bfname").val('');
    $("#txt-bmi").val('');   

    $("#sel-relation").val('').trigger('change');

    $("#txt-councilor").val('');
    $("#txt-certnum").val('');
    $("#txt-scode").val('');
    $("#txt-salecode").val('');

    $("#txt-remarks").val('');
  }
});    