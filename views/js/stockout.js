var pl = $('.transactionProductsTable').DataTable({
    ajax: "ajax/list_all_items.ajax.php",
    autoWidth: true,
    deferRender: true,
    processing: true,
    scrollY: 431,
    pagelength: 25,
    lengthMenu: [[25, 50, -1], [25, 50, "All"]],
    dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"p>',
            language: {
                search: '<span>Filter:</span> _INPUT_',
                searchPlaceholder: 'Type to filter...',
                lengthMenu: '<span>Show:</span> _MENU_',
                paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
            }
});

if (!$.fn.DataTable.isDataTable('.releasingTransactionTable')) {
  var pt = $('.releasingTransactionTable').DataTable({
      deferRender: true,
      processing: true,
      autoWidth: true,
      scrollY: 360,
      pagelength: 25,
      lengthMenu: [[25, 50], [25, 50]],
      dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
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

$(function() {
  $('#lst_date_range').daterangepicker({
    ranges:{
      'Today'         : [moment(),moment()],
      'Yesterday'     : [moment().subtract(1,'days'), moment().subtract(1,'days')],
      'Last 7 Days'   : [moment().subtract(6,'days'), moment()],
      'This Month'    : [moment().startOf('month'), moment().endOf('month')]
    }
  })

 // When browsing Purchase Order - set Status to Pending | Partial
   // This will prevent AJAX from running twice
  $("#btn-search").click(function(){
    $(".releasingTransactionTable").DataTable().clear();
    pt.draw();
    $('#lst-reqstatus').val('Posted').trigger('change');
  });   

  $("#lbl-lst-machineid").click(function(){
      $("#lst-machineid").val('').trigger('change');
  }); 

  $("#lbl-lst-empid").click(function(){
      $("#lst-empid").val('').trigger('change');
  });

  $("#lbl-lst-reqstatus").click(function(){
      $("#lst-reqstatus").val('').trigger('change');
  });      

  $("#btn-undo").click(function(){
      $('#sel-machineid').val('').trigger('change');
  });   
  
  // Hide Item ID column - Show modal form Stock Card
  // pl.column(2).visible(false);	
  // $('.transactionProductsTable tbody').on('dblclick', 'tr', function () {
  //   let idx = pl.row(this).index();  
  //   let itemid = pl.cell(idx, 2).data();			// get Item ID - hidden column  
  //   $('#stockcard').modal('show');      
  // });  

  // Search Stock Withdrawal - Modal Form dynamic selector
  $('#lst-machineid, #lst_date_range, #lst-empid, #lst-reqstatus').on("change", function(){
    let machineid = $("#lst-machineid").val();

    let date_range = $("#lst_date_range").val();
    let start_date = date_range.substring(6, 10) + '-' + date_range.substring(0, 2) + '-' + date_range.substring(3, 5);
    let end_date = date_range.substring(19, 23) + '-' + date_range.substring(13, 15) + '-' + date_range.substring(16, 18);

    let empid = $("#lst-empid").val();
    let reqstatus = $("#lst-reqstatus").val();

    var percent = 0;
    var notice = new PNotify({
        text: "Fetching records...",
        addclass: 'stack-left-right bg-primary border-primary',
        type: 'info',
        icon: 'icon-spinner4 spinner',
        hide: false,
        buttons: {
            closer: false,
            sticker: false
        },
        opacity: .9,
        width: "190px"
    });      

    var data = new FormData();
    data.append("machineid", machineid);
    data.append("start_date", start_date);
    data.append("end_date", end_date);
    data.append("empid", empid);
    data.append("reqstatus", reqstatus);

    $.ajax({
        url:"ajax/releasing_transaction_list.ajax.php",   
        method: "POST",                
        data: data,                    
        cache: false,                  
        contentType: false,            
        processData: false,            
        dataType:"json",               
        success:function(answer){
              $(".releasingTransactionTable").DataTable().clear();
              for(var i = 0; i < answer.length; i++) {
                percent = Math.round(i/answer.length*100);
                var options = {
                  text: percent + "% complete."
                };

                let sw = answer[i];
                let req_date = sw.reqdate;
                let reqdate = req_date.split("-");
                reqdate = reqdate[1] + "/" + reqdate[2] + "/" + reqdate[0];

                let requestor = sw.request_by;
                let reqnumber = sw.reqnumber;
                let machinedesc = sw.machinedesc;
                let reqstatus = sw.reqstatus;

                var button = "<td><button type='button' class='btn btn-outline btn-sm bg-green-400 border-green-400 text-green-400 btn-icon rounded-round border-2 ml-2 btnEditReleasing' reqnumber='"+reqnumber+"'><i class='icon-pencil3'></i></button></td>";  
                pt.row.add([reqdate, requestor, reqnumber, machinedesc, reqstatus, button]); 
              }
              pt.draw();

              notice.update(options);
              notice.remove();
              return;
        },
        beforeSend: function() {
        },  
        complete: function() {
        }, 
    })    
  });  

  // Get Stock Withdrawal Record
  $(".releasingTransactionTable tbody").on('click', '.btnEditReleasing', function () {
    var reqnumber = $(this).attr("reqnumber");
    var data = new FormData();
    data.append("reqnumber", reqnumber);
    $.ajax({
      url:"ajax/releasing_get_record.ajax.php",
      method: "POST",
      data: data,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(answer){
          $("#sel-requestby").val(answer["requestby"]).trigger('change');

          let reqdate = answer["reqdate"].split("-");
          reqdate = reqdate[1] + "/" + reqdate[2] + "/" + reqdate[0];
          if (reqdate == '00/00/0000'){      
            reqdate = '';
          }
          $("#date-reqdate").val(reqdate);
          $("#txt-reqstatus").val(answer["reqstatus"]);
          $("#txt-reqnumber").val(answer["reqnumber"]);
          $("#sel-machineid").val(answer["machineid"]).trigger('change');
          $("#tns-remarks").val(answer["remarks"]);

          $("#productList").val(answer["productlist"]);

          $(".enlisted_products").empty();

          // Reload products table - restore all button to Green
          // After the data is retrieved - selected products turned Red (Deactivated)
          $(".transactionProductsTable").DataTable().ajax.reload();
          
          var data_items = new FormData();
          data_items.append("reqnumber", reqnumber);
          $.ajax({
            url:"ajax/releasing_get_items.ajax.php",
            method: "POST",
            data: data_items,
            cache: false,
            contentType: false,
            processData: false,
            dataType:"json",
            success:function(products){
              for(var p = 0; p < products.length; p++) {
                var product = products[p];
                var itemid = product.itemid;

                var product_name = product.pdesc;
                var meas_1 = product.meas1;

                var meas1 = meas_1.toUpperCase();
                var pdesc = product_name + ' (' + meas1 + ')';

                var qty = numberWithCommas(product.qty);

                $(".enlisted_products").append(
                    '<tr>'+   
                    '<td width="50%" style="padding:2px;">'+   
                      '<div class="input-group">'+
                          '<span style="padding:2px;" class="input-group-prepend"><button type="button" style="color:coral;" class="btn btn-sm btn-light removeProduct" itemid="'+itemid+'"><i class="icon-undo"></i></button></span>'+         
                          '<input type="text" style="padding:2px;" class="form-control pdesc" itemid="'+itemid+'" name="addProduct" value="'+pdesc+'" readonly required>'+
                        '</div>'+
                    '</td>'+            

                    '<td class="qtyEntry" width="15%" style="padding:2px;">'+
                      '<input type="text" style="padding:2px;padding-right:17px;text-align:right;color:transparent;text-shadow: 0 0 0 #ffffff;" class="form-control qty numeric" itemid="'+itemid+'" name="qty" value="'+qty+'" required>'+
                    '</td>' +                                 
                '</tr>');
                    
              }
              // listProducts();                   
              removeAddedProducts();
            }
          });    

          // let postatus = $("#txt-postatus").val();
          // switch (postatus){
          //   case 'Pending':
          //     $("#btn-save").prop('disabled', false);

          //     if (($("#user_type").val() == 'Administrator')||($("#user_type").val() == 'Super Administrator')){
          //       $("#btn-cancel").prop('disabled', false);
          //     }else{
          //       $("#btn-cancel").prop('disabled', true);
          //     }  

          //     $("#btn-close").prop('disabled', true);
          //     break;
          //   case 'Cancelled':
          //     $("#btn-save").prop('disabled', true);
          //     $("#btn-cancel").prop('disabled', true);
          //     $("#btn-close").prop('disabled', true);
          //     break;
          //   case 'Closed':
          //     $("#btn-save").prop('disabled', true);
          //     $("#btn-cancel").prop('disabled', true);
          //     $("#btn-close").prop('disabled', true);
          //     break;                      
          //   case 'Partial':
          //     $("#btn-save").prop('disabled', false);
          //     $("#btn-cancel").prop('disabled', true);

          //     if (($("#user_type").val() == 'Administrator')||($("#user_type").val() == 'Super Administrator')){
          //       $("#btn-close").prop('disabled', false);
          //     }else{
          //       $("#btn-close").prop('disabled', true);
          //     }
          //     break;  
          //   case 'Completed':
          //     $("#btn-save").prop('disabled', true);
          //     $("#btn-cancel").prop('disabled', true);
          //     $("#btn-close").prop('disabled', true);
          //     break;                                          
          // }

          $("#modal-search-releasing").modal('hide');
      }
    });
  });  

  $(".transactionProductsTable tbody").on("click", "button.addProduct", function(){
     var itemid = $(this).attr("itemid");
  
     $(this).removeClass("btn btn-outline btn-sm bg-green-400 border-green-400 text-green-400 btn-icon rounded-round border-2 ml-2 addProduct");
     $(this).addClass("btn btn-outline btn-sm bg-pink-400 border-pink-400 text-pink-400 btn-icon rounded-round border-2 ml-2");

     var data = new FormData();
     data.append("itemid", itemid);
     $.ajax({
      url:"ajax/get_product_details.ajax.php", 
        method: "POST",
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        dataType:"json",
        success:function(answer){
          let meas = answer["meas2"];
          var pdesc = answer["pdesc"] + ' (' + meas.toUpperCase() + ')';
          var price_amount = answer["ucost"];
          var price = numberWithCommas(price_amount);

           $(".enlisted_products").append(
            '<tr>'+   
            '<td width="80%" style="padding:2px;">'+   
               '<div class="input-group">'+
                  '<span style="padding:2px;" class="input-group-prepend"><button type="button" style="color:coral;" class="btn btn-sm btn-light removeProduct" itemid="'+itemid+'"><i class="icon-undo"></i></button></span>'+         
                  '<input type="text" style="padding:2px;" class="form-control pdesc" itemid="'+itemid+'" name="addProduct" value="'+pdesc+'" readonly required>'+
                '</div>'+
            '</td>'+            

            '<td class="qtyEntry" width="20%" style="padding:2px;">'+
               '<input type="text" style="padding:2px;padding-right:17px;text-align:right;color:transparent;text-shadow: 0 0 0 #ffffff;" class="form-control qty numeric" itemid="'+itemid+'" name="qty" value="0.00" required>'+
            '</td>' +                               
          '</tr>')

          listItems();
          $('.qty').focus();
        }
     })
  });

  $(".stockout-form").on("keydown keypress blur focus", "input.qty", function(){
      var itemid = $(this).parent().parent().children(".qtyEntry").children().attr("itemid");
      _gblBindNumericClasses('numeric'); 
      listItems(); 
  })

  var idRemoveProduct = [];
  localStorage.removeItem("removeProduct");
  $(".stockout-form").on("click", "button.removeProduct", function(){
     $(this).parent().parent().parent().parent().remove();
     var itemid = $(this).attr("itemid");

     if(localStorage.getItem("removeProduct") == null){
       idRemoveProduct = [];
     }else{
       idRemoveProduct.concat(localStorage.getItem("removeProduct"))
     }

     idRemoveProduct.push({"itemid":itemid});
     localStorage.setItem("removeProduct", JSON.stringify(idRemoveProduct));

     $("button.recoverButton[itemid='"+itemid+"']").removeClass('btn btn-outline btn-sm bg-pink-400 border-pink-400 text-pink-400 btn-icon rounded-round border-2 ml-2');
     $("button.recoverButton[itemid='"+itemid+"']").addClass('btn btn-outline btn-sm bg-green-400 border-green-400 text-green-400 btn-icon rounded-round border-2 ml-2 addProduct');

     listItems();
    
     var a = document.getElementById("product_list");
     var rows = a.rows.length;
  })

  $(".transactionProductsTable").on("draw.dt", function(){
     if(localStorage.getItem("removeProduct") != null){
      var listIdProducts = JSON.parse(localStorage.getItem("removeProduct"));
      for(var i = 0; i < listIdProducts.length; i++){
        $("button.recoverButton[itemid='"+listIdProducts[i]["itemid"]+"']").removeClass('btn btn-outline btn-sm bg-pink-400 border-pink-400 text-pink-400 btn-icon rounded-round border-2 ml-2');
        $("button.recoverButton[itemid='"+listIdProducts[i]["itemid"]+"']").addClass('tn btn-outline btn-sm bg-green-400 border-green-400 text-green-400 btn-icon rounded-round border-2 ml-2 addProduct');
      }
     }
  })  

  // Remove Added Products
  function removeAddedProducts(){
     var itemid = $(".removeProduct");     
     var tableButtons = $(".transactionProductsTable tbody button.addProduct");
     for(var i = 0; i < itemid.length; i++){
       var button = $(itemid[i]).attr("itemid");
       for(var j = 0; j < tableButtons.length; j ++){
         if($(tableButtons[j]).attr("itemid") == button){
           $(tableButtons[j]).removeClass("tn btn-outline btn-sm bg-green-400 border-green-400 text-green-400 btn-icon rounded-round border-2 ml-2 addProduct");
           $(tableButtons[j]).addClass("btn btn-outline btn-sm bg-pink-400 border-pink-400 text-pink-400 btn-icon rounded-round border-2 ml-2");
         }
      }
     }
  }

  $('.transactionProductsTable').on('draw.dt', function(){
    removeAddedProducts();
  })      

  function listItems(){
      var productList = [];
      var description = $(".pdesc");
      var quantity = $(".qty");

      var hasZeroQty = false;

      var num_entries = description.length; 
      if (num_entries > 0){
       for(var i = 0; i < num_entries; i++){
        var txt_qty = $(quantity[i]).val();

        // Check if Qty or Price = 0.00
        if ((txt_qty == "0.00")||!(txt_qty)){  
          var hasZeroQty = true;
        }
        var qty = parseFloat(txt_qty.replaceAll(",",""));

        productList.push({"qty" : qty.toFixed(2),
                          "itemid" : $(description[i]).attr("itemid")})      
       }

       $("#productList").val(JSON.stringify(productList));

       if (hasZeroQty){
         $("#btn-save").prop('disabled', true);
       }else{
         $("#btn-save").prop('disabled', false);
       }
      }else{
       $("#btn-save").prop('disabled', true);
     }
  } 

  $(".stockout-form").submit(function (e) {
      e.preventDefault();
      swal.fire({
          title: 'Do you want to save stock withdrawal transaction?',
          type: 'question',
          showCancelButton: true,
          confirmButtonText: 'Yes, Save it!',
          cancelButtonText: 'Cancel!',
          confirmButtonClass: 'btn btn-outline-success',
          cancelButtonClass: 'btn btn-outline-danger',
          allowOutsideClick: false,
          buttonsStyling: false
      }).then(function(result) {
          if(result.value) {
            let trans_type = $("#trans_type").val();
            let machineid = $("#sel-machineid").val();
            let requestby = $("#sel-requestby").val();

            let format_reqdate = $("#date-reqdate").val().split("/");
            format_reqdate = format_reqdate[2] + "-" + format_reqdate[0] + "-" + format_reqdate[1];
            
            let reqdate = format_reqdate;
            let reqstatus = $("#txt-reqstatus").val();
            let remarks = $("#tns-remarks").val();
            let postedby = $("#tns-postedby").val();
            let productlist = $("#productList").val();           

            var stockout = new FormData();
            stockout.append("trans_type", trans_type);
            stockout.append("machineid", machineid);
            stockout.append("requestby", requestby);
            stockout.append("reqdate", reqdate);
            stockout.append("reqstatus", reqstatus);
            stockout.append("remarks", remarks);
            stockout.append("postedby", postedby);
            stockout.append("productlist", productlist);
           
            $.ajax({
               url:"ajax/stockout_save_record.ajax.php",
               method: "POST",
               data: stockout,
               cache: false,
               contentType: false,
               processData: false,
               dataType:"text",
               success:function(answer){
               },
               error: function () {
                  alert("Oops. Something went wrong!");
               },
               complete: function () {
                 swal.fire({
                    title: 'Stock withdrawal transaction successfully saved!',
                    type: 'success',
                    confirmButtonText: 'Proceed',
                    confirmButtonClass: 'btn btn-outline-success',
                    allowOutsideClick: false,
                    buttonsStyling: false
                 }).then(function(result){
                    if(result.value) {              
                      $("#btn-new").click();
                    }
                 }) 
               }
            })
          }
      });
  });       

});    