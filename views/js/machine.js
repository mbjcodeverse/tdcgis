$(function() {
   $("#btn-new").click(function(){
      // let image = $('#tns-image')[0].files[0];
      // let image_size = $('#tns-image')[0].files[0].size;
      // let image_name = $('#tns-image')[0].files[0].name;
      // let image_type = $('#tns-image')[0].files[0].type;

      // alert(image_name);
   	  new_machine();
   });

   $("#btn-attributes").click(function(){
       $(".machineAttributes").append(
          '<tr>'+   
          '<td width="30%" style="padding:2px;">'+   
             '<div class="input-group">'+
                '<span style="padding:2px;" class="input-group-prepend"><button type="button" style="color:coral;" class="btn btn-sm btn-light removeAttribute"><i class="icon-undo"></i></button></span>'+         
                '<input type="text" style="padding:2px;" class="form-control attribName" value="" required>'+
              '</div>'+
          '</td>'+            

          '<td width="70%" style="padding:2px;">'+
             '<input type="text" style="padding:2px;padding-right:17px;" class="form-control attribDesc" value="" required>'+
          '</td>' +                                 
        '</tr>') 
        listAttributes();   
        $('.attribName').focus();  
   });

   $("#machine-form").on("change keypress keyup blur", "input.attribName,input.attribDesc", function(){
      listAttributes();
   })

   $("#machine-form").on("click", "button.removeAttribute", function(){
      $(this).parent().parent().parent().parent().remove();
      listAttributes();
   })   

   function listAttributes(){
     var attributeList = [];
     var attribName = $(".attribName");
     var attribDesc = $(".attribDesc");

     if (attribName.length > 0){
       for(var i = 0; i < attribName.length; i++){
         attributeList.push({"attribute" : $(attribName[i]).val(),
                             "detail" : $(attribDesc[i]).val()})
       }
       $("#attributelist").val(JSON.stringify(attributeList));
     }else{
       $("#attributelist").val("");
     }
     $("#btn-save").prop('disabled', false);
   }      

   $("#machine-form").submit(function (e) {
      e.preventDefault();
      save_machine();
   });  

   $("#tns-image").change(function(){
      var newImage = this.files[0]; 
      if (newImage["type"] != "image/jpeg" && newImage["type"] != "image/png"){
        $("#tns-image").val("");
        swal.fire({
          type: "error",
          title: "Error uploading image",
          text: "Image has to be JPEG or PNG!",
          confirmButtonText: "Close",
          confirmButtonClass: 'btn btn-outline-success',
          buttonsStyling: false
        });
      }else if(newImage["size"] > 2000000){
        $("#tns-image").val("");
        swal.fire({
          type: "error",
          title: "Error uploading image",
          text: "Image too big. It has to be less than 2Mb!",
          confirmButtonText: "Close",
          confirmButtonClass: 'btn btn-outline-success',
          buttonsStyling: false
        });
      }else{
        var imgData = new FileReader;
        imgData.readAsDataURL(newImage);
        $(imgData).on("load", function(event){
          var routeImg = event.target.result;
          $(".preview").attr("src", routeImg);
        });
      }
   })     

   function new_machine(){
      swal.fire({
          title: 'Do you want to add new machine?',
          type: 'question',
          showCancelButton: true,
          confirmButtonText: 'Yes, Add it!',
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
     $("#sel-classcode").val('').trigger('change');
     $("#sel-machtype").val('').trigger('change');
     $('#txt-machabbr').val('');
     $('#txt-machinedesc').val('');
     $("#sel-buildingcode").val('').trigger('change');
     $("#chk-isactive").prop( "checked", true); 
     $('#txt-machineid').val('');
     $("#sel-machstatus").val('').trigger('change');
     $('#attributelist').val('');
     $(".machineAttributes").empty();

     $('#trans_type').val('New');
   }

   function save_machine(){
     swal.fire({
         title: 'Do you want to save machine details?',
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

            let classcode = $("#sel-classcode").val();
            let machtype = $("#sel-machtype").val();
            let machabbr = $('#txt-machabbr').val();
            let machinedesc = $('#txt-machinedesc').val();
            let buildingcode = $("#sel-buildingcode").val();
            let machstatus = $("#sel-machstatus").val();
            let attributelist = $("#attributelist").val();
            let image = $('#tns-image')[0].files[0];

            if ($('#num-isactive').prop('checked')){
              var isactive = "1";
            }else{
              var isactive = "0";
            }

            var machine = new FormData();
    		    machine.append("trans_type", trans_type);
    		    machine.append("classcode", classcode);
    		    machine.append("machtype", machtype);
    		    machine.append("machabbr", machabbr);
    		    machine.append("machinedesc", machinedesc);
    		    machine.append("buildingcode", buildingcode);
            machine.append("isactive", isactive);
    		    machine.append("machstatus", machstatus);
            machine.append("image", image);
            machine.append("attributelist", attributelist);

    		    $.ajax({
    		        url:"ajax/machine_save_record.ajax.php",
    		        method: "POST",
    		        data: machine,
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
    		              title: 'Machine details successfully saved!',
    		              type: 'success',
    		              allowOutsideClick: false,
    		              showConfirmButton: false,
    		              timer: 1500
    		           })
    		           initialize(); 
    		        }
		        }) // ajax
         } // if
     });   	
   }
});	