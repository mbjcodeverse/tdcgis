$(function() {
   $('input[type="text"], textarea').css('border', '1px solid rgba(255, 255, 255, 0.3)');

   $('#txt-catdescription').focus();

   $('#form-category input[id^="txt"]').on("keypress", function (e) {
      return _helper.isString(e) ? true : e.preventDefault();
   });  

   $("#btn-new").click(function(){
     $('#txt-catdescription').val(''); 
     $('#num-categorycode').val('');

     $('#trans_type').val('New');
     $('#num-id').val('');
     $('#txt-catdescription').focus();
   });

   $('.categoryTable tbody').on('dblclick', 'tr', function () {
	  var idCategory = $(this).attr("idCategory");
	  var data = new FormData();
      data.append("idCategory", idCategory);
      $.ajax({
     	 url:"ajax/get_category_record.ajax.php",
      	 method: "POST",
      	 data: data,
      	 cache: false,
      	 contentType: false,
      	 processData: false,
      	 dataType:"json",
      	 success:function(answer){
      	 	$("#num-id").val(answer["id"]);
      	 	$("#txt-catdescription").val(answer["catdescription"]);
      	 	$("#num-categorycode").val(answer["categorycode"]);

      	 	$("#trans_type").val("Update");
          $("#modal-search-category").modal('hide');
      	}
      })
   }); 

   var lotinfo_access = $("#lotinfo-access").val();
   if (lotinfo_access == 'ViewOnly'){
     $('input[type="text"]').prop('readonly', true);
     $('button').prop('disabled', true);
     $('#btn-search').prop('disabled', false);
   }
});
