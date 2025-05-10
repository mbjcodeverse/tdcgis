var pl = $('.transactionProductsTable').DataTable({
    ajax: "ajax/list_all_items.ajax.php",
    autoWidth: true,
    deferRender: true,
    processing: true,
    scrollY: 431,
    pagelength: 25,
    lengthMenu: [[25, 50, -1], [25, 50, "All"]],
    dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
            language: {
                search: '<span>Filter:</span> _INPUT_',
                searchPlaceholder: 'Type to filter...',
                lengthMenu: '<span>Show:</span> _MENU_',
                paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
            }
});

$(function() {
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

          //  var pdesc = answer["pdesc"]+' '+answer["itemcode"];
          //  var price_amount = answer["ucost"];
          //  var price = numberWithCommas(price_amount);

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

  $(".inventory-form").on("keydown keypress blur focus", "input.qty", function(){
      var itemid = $(this).parent().parent().children(".qtyEntry").children().attr("itemid");
      _gblBindNumericClasses('numeric'); 
      listItems(); 
  }) 

  var idRemoveProduct = [];
  localStorage.removeItem("removeProduct");
  $(".inventory-form").on("click", "button.removeProduct", function(){
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

     addingTotalPrices();
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

  $(".inventory-form").submit(function (e) {
      e.preventDefault();
      swal.fire({
          title: 'Do you want to save physical inventory?',
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
            let countedby = $("#sel-countedby").val();

            let format_invdate = $("#date-invdate").val().split("/");
            format_invdate = format_invdate[2] + "-" + format_invdate[0] + "-" + format_invdate[1];
            
            let invdate = format_invdate;
            let invstatus = $("#txt-invstatus").val();
            let remarks = $("#tns-remarks").val();
            let postedby = $("#tns-postedby").val();
            let productlist = $("#productList").val();           

            var inventory = new FormData();
            inventory.append("trans_type", trans_type);
            inventory.append("countedby", countedby);
            inventory.append("invdate", invdate);
            inventory.append("invstatus", invstatus);
            inventory.append("remarks", remarks);
            inventory.append("postedby", postedby);
            inventory.append("productlist", productlist);
           
            $.ajax({
               url:"ajax/inventory_save_record.ajax.php",
               method: "POST",
               data: inventory,
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
                    title: 'Physical inventory successfully saved!',
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