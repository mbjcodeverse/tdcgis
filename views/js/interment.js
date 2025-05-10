if (!$.fn.DataTable.isDataTable('.intermentListTable')) {
    var ilt = $('.intermentListTable').DataTable({
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


$(function() {
    $('input[type="text"], textarea').css('border', '1px solid rgba(255, 255, 255, 0.3)');

    var decedent_ID = 0;
    initialize();

    $('#lst_date_range').daterangepicker({
        ranges:{
          'All'         : [moment('1970-01-01'), moment()],  // Range from the Unix epoch to today
          'Today'         : [moment(),moment()],
          'Yesterday'     : [moment().subtract(1,'days'), moment().subtract(1,'days')],
          'Last 7 Days'   : [moment().subtract(6,'days'), moment()],
          'This Month'    : [moment().startOf('month'), moment().endOf('month')]
        }
      });

    $("#btn-new").click(function(){
        new_interment();
    }); 

    $("#btn-clear").click(function(){
        clearDecedentEntry();
    }); 

    $('#btn-save').on('click', function() {
        var emptyFields = [];
    
        if ($('#txt-lotid').val().trim() === '') {
            emptyFields.push('Lot ID');
        }
        if ($('#date-interdate').val().trim() === '') {
            emptyFields.push('Interment Date');
        }
        if ($('#sel-location').val().trim() === '') {
            emptyFields.push('Location');
        }
        // if ($('#sel-layer').val().trim() === '') {
        //     emptyFields.push('Layer');
        // }
        if ($('#decedentList').val().trim() === '') {
            emptyFields.push('Decedent');
        }
    
        if (emptyFields.length > 0) {
            var message = 'Fields are empty : ' + emptyFields.join(', ');
            swal.fire({
                title: 'Please fill in all required fields',
                text: message,
                type: 'error',
                confirmButtonText: 'Got it!',
                confirmButtonClass: 'btn btn-outline-danger',
                allowOutsideClick: false,
                buttonsStyling: false
            });
        } else {
            swal.fire({
                title: 'Do you want to save interment?',
                type: 'question',
                showCancelButton: true,
                confirmButtonText: 'Yes, save it!',
                cancelButtonText: 'No',
                confirmButtonClass: 'btn btn-outline-success',
                cancelButtonClass: 'btn btn-outline-danger',
                allowOutsideClick: false,
                buttonsStyling: false
            }).then(function(result) {
                 if(result.value) {  
                   postinterment();
                 }
            }); 	
        }
    });
    
    $('#modal-search-interment').on('shown.bs.modal', function () {
        ilt.search('').draw();
        ilt.table().container().querySelector('.dataTables_filter input').focus(); 
        $("#lst-categorycode").val('').trigger('change');
        $("#lst-reinterred").val('').trigger('change');

        // Set the default range to 'All'
        $('#lst_date_range').data('daterangepicker').setStartDate(moment('1970-01-01'));
        $('#lst_date_range').data('daterangepicker').setEndDate(moment());
    });

    // ----- Search Intermet Selectors -----

    $("#lbl-lst-categorycode").click(function(){
        $("#lst-categorycode").val('').trigger('change');
    });   

    $("#lbl-lst-date-range").click(function(){
        // Set the default range to 'All'
        $('#lst_date_range').data('daterangepicker').setStartDate(moment('1970-01-01'));
        $('#lst_date_range').data('daterangepicker').setEndDate(moment());
        
        ilt.search('').draw();
        ilt.table().container().querySelector('.dataTables_filter input').focus(); 
    });
    
    $("#lbl-lst-reinterred").click(function(){
        $("#lst-reinterred").val('').trigger('change');
    }); 

    // ----- Interment Entry Selectors ------

    $("#lbl-location").click(function(){
        $("#sel-location").val('').trigger('change');
    });

    $("#lbl-layer").click(function(){
        $("#sel-layer").val('').trigger('change');
    });

    // ----- Deceased Entry Selectors ------

    $("#datedied-header").click(function(){
        $("#date-died").val('');
    });      

    $("#relation-header").click(function(){
        $("#sel-relation").val('').trigger('change');
    });  
    
    $("#remains-header").click(function(){
        $("#sel-remains").val('').trigger('change');
    });

    $("#reinterred-header").click(function(){
        $("#sel-reinterred").val('').trigger('change');
    });

    $('#lst-categorycode, #lst_date_range, #lst-reinterred').on("change", function() {
        let categorycode = $("#lst-categorycode").val();
        
        var date_range = $("#lst_date_range").val();

        if (date_range != ''){
            var start_date = date_range.substring(6, 10) + '-' + date_range.substring(0, 2) + '-' + date_range.substring(3, 5);
            var end_date = date_range.substring(19, 23) + '-' + date_range.substring(13, 15) + '-' + date_range.substring(16, 18);
        }else{
            var start_date = '';
            var end_date = '';
        }
        let reinterred = $("#lst-reinterred").val();
        
        var data = new FormData();
        data.append("categorycode", categorycode);
        data.append("start_date", start_date);
        data.append("end_date", end_date);
        data.append("reinterred", reinterred);
        
        $.ajax({
            url: "ajax/interment_list.ajax.php",
            method: "POST",
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(answer) {    
                $(".intermentListTable").DataTable().clear();
                for (var i = 0; i < answer.length; i++) {
                    var il = answer[i];
                    
                    var inter_date = il.interdate;
                    var interdate = inter_date.split("-");
                    interdate = interdate[1] + "/" + interdate[2] + "/" + interdate[0];
    
                    var lotid = il.lotid;    
                    var lname = il.lname;
                    var fname = il.fname;
                    var mi = il.mi;
                    var full_name = (mi != '') ? lname + ', ' + fname + ' ' + mi + '.' : lname + ', ' + fname;
                    // get all Decedent from json, separated with comma
                    var decedentlist = JSON.parse(il.decedentlist).map(item => item.decedent).join(", ");
                    var intermentid = il.intermentid;
                    var saleid = il.saleid;
                    var catdescription = il.catdescription;
    
                    var button = "<td><button type='button' class='btn btn-outline btn-sm bg-green-400 border-green-400 text-green-400 btn-icon rounded-round border-2 ml-2 btnInterment' saleid='" + saleid + "' lotid='" + lotid + "' intermentid='" + intermentid + "'><i class='icon-pencil3'></i></button></td>";
    
                    ilt.row.add([interdate, lotid, full_name, decedentlist, button]); // Add the decedent list as a string
                }
                ilt.draw();
            },
            beforeSend: function() {},
            complete: function() {
                // Apply padding styles after DataTable is drawn - adjust row height of data table
                $(".intermentListTable td").css({
                    "padding-top": "5px",
                    "padding-bottom": "5px"
                });
            },
        });
    });
    
    // Ensure that padding is applied whenever DataTable redraws (e.g., page switch or filtering)
    $(".intermentListTable").on("draw.dt", function () {
        $(".intermentListTable td").css({
            "padding-top": "5px",
            "padding-bottom": "5px"
        });
    });
    
    // Get interment record for editing
    $(".intermentListTable tbody").on("click", "button.btnInterment", function(){
        $("#modal-search-interment").modal("hide");
        $("#trans_type").val("Update");
        var intermentid = $(this).attr("intermentid");
        var data = new FormData();
        data.append("intermentid", intermentid);
        $.ajax({
            url:"ajax/interment_get_record.ajax.php",
            method: "POST",
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            dataType:"json",
            success:function(answer){
                $('.enlisted_decedents').empty();
                $('#trans_type').val('Update');

                $("#txt-saleid").val(answer["saleid"]);

                $("#txt-lname").val(answer["lname"]);
                $("#txt-fname").val(answer["fname"]);
                $("#txt-mi").val(answer["mi"]);

                $("#txt-lotid").val(answer["lotid"]);
                $("#txt-intermentid").val(answer["intermentid"]);

                let inter_date = answer["interdate"];
                let interdate = inter_date.split("-");
                interdate = interdate[1] + "/" + interdate[2] + "/" + interdate[0];
                $("#date-interdate").val(interdate);

                $("#sel-location").val(answer["location"]).trigger('change');
                $("#sel-layer").val(answer["layer"]).trigger('change');
                $("#txt-remarks").val(answer["remarks"]);
                
                let decedent_list = answer["decedentlist"];
                let decedentArray = JSON.parse(decedent_list);

                let decedentID = '';
                decedentArray.forEach(function(row) {
                    decedentID = row.decedentid;

                    $("button.recoverButton[decedentID='"+decedentID+"']").removeClass("btn btn-outline btn-sm bg-green-400 border-green-400 text-green-400 btn-icon rounded-round border-2 ml-2 addDecedent");
                    $("button.recoverButton[decedentID='"+decedentID+"']").addClass("btn btn-outline btn-sm bg-pink-400 border-pink-400 text-pink-400 btn-icon rounded-round border-2 ml-2 enlisted");
            
                    let decedent = row.decedent;
                    let datedied = row.datedied;
                    let relation = row.relation;
                    let remains = row.remains;
                    let reinterred = row.reinterred;
                    let source = row.source;
            
                    $(".enlisted_decedents").append(
                        '<tr>'+   
                            '<td width="25%" style="padding:2px;">'+   
                                '<div class="input-group">'+
                                    '<span style="padding:2px;" class="input-group-prepend"><button type="button" style="color:coral;padding: 0px 7px; margin-top: 0; margin-bottom: 0;" class="btn btn-sm btn-light removeDecedent" decedentID="'+decedentID+'"><i class="icon-undo"></i></button></span>'+         
                                    '<input type="text" style="font-size:1em;padding:2px;" class="form-control decedent" decedentID="'+decedentID+'" name="addDecedent" value="'+decedent+'" readonly required>'+
                                '</div>'+
                            '</td>'+  
                            
                            '<td class="datediedEntry" width="15%" style="padding:2px;">'+
                                '<input type="text" style="font-size:1em;padding:2px;padding-left:13px;text-align:left;color:transparent;text-shadow: 0 0 0 #ffffff;" class="form-control datedied" decedentID="'+decedentID+'" name="datedied" value="'+datedied+'" readonly required>'+
                            '</td>' +
            
                            '<td class="relationEntry" width="15%" style="padding:2px;">'+
                                '<input type="text" style="font-size:1em;padding:2px;padding-left:13px;text-align:left;color:transparent;text-shadow: 0 0 0 #ffffff;" class="form-control relation" decedentID="'+decedentID+'" name="relation" value="'+relation+'" readonly required>'+
                            '</td>' +
            
                            '<td class="remainsEntry" width="10%" style="padding:2px;">'+
                                '<input type="text" style="font-size:1em;padding:2px;padding-left:13px;text-align:left;color:transparent;text-shadow: 0 0 0 #ffffff;" class="form-control remains" decedentID="'+decedentID+'" name="remains" value="'+remains+'" readonly required>'+
                            '</td>' +
            
                            '<td class="reinterredEntry" width="10%" style="padding:2px;">'+
                                '<input type="text" style="font-size:1em;padding:2px;padding-left:13px;text-align:left;color:transparent;text-shadow: 0 0 0 #ffffff;" class="form-control reinterred" decedentID="'+decedentID+'" name="reinterred" value="'+reinterred+'" readonly required>'+
                            '</td>' +
            
                            '<td class="sourceEntry" width="25%" style="padding:2px;">'+
                                '<input type="text" style="font-size:1em;padding:2px;padding-left:13px;text-align:left;color:transparent;text-shadow: 0 0 0 #ffffff;" class="form-control source" decedentID="'+decedentID+'" name="source" value="'+source+'" readonly required>'+
                            '</td>' +
                        '</tr>')
            
                    listDecedents();
                });

                // get last Decedent ID, extract right characters except first character
                // convert to number - when new decedent is added
                // decedent_ID number is incremented by 1
                let numberString = decedentID.substring(1);
                decedent_ID = parseInt(numberString, 10);
            }
        })
    }); 

    function new_interment(){
        swal.fire({
           title: 'Do you want to elist new interment?',
           type: 'question',
           showCancelButton: true,
           confirmButtonText: 'Yes, Enlist!',
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
        decedent_ID = 0;
        $('input[type="text"]').val('');
        $('select').val('').trigger('change');
        $('.enlisted_decedents').empty();
        $('#decedentList').val('');
        $('#btn-append').show();
        $('#btn-edit').hide();
        $('#trans_type').val('New');
    }

    function clearDecedentEntry(){
        $("#txt-decedent").val('');
        $("#date-died").val('');
        $("#sel-relation").val('').trigger('change');
        $("#sel-remains").val('').trigger('change');
        $("#sel-reinterred").val('').trigger('change');
        $("#txt-source").val('');

        $('#btn-append').show();
        $('#btn-edit').hide();

        $("#txt-decedent").focus();
    }

    function checkDecedentEmptyControl() {
        var controls = [
            "#txt-decedent"
        ];

        // var controls = [
        //     "#txt-decedent",
        //     "#date-died",
        //     "#sel-relation",
        //     "#sel-remains",
        //     "#sel-reinterred",
        //     "#txt-source"
        // ];
    
        for (var i = 0; i < controls.length; i++) {
            if ($(controls[i]).val().trim() === "") {
                return true;
            }
        }
        return false;
    }

    $("#btn-append").click(function(){
        if (checkDecedentEmptyControl()) {
            swal.fire({
                title: 'Cannot enlist, incomplete decendent details entry!',
                type: 'error',
                allowOutsideClick: false,
                showConfirmButton: false,
                timer: 1500
            })
        }else{
            swal.fire({
                title: 'Do you want to enlist decedent informatiojn?',
                type: 'question',
                showCancelButton: true,
                confirmButtonText: 'Yes, enlist!',
                cancelButtonText: 'No',
                confirmButtonClass: 'btn btn-outline-success',
                cancelButtonClass: 'btn btn-outline-danger',
                allowOutsideClick: false,
                buttonsStyling: false
             }).then(function(result) {
                 if(result.value) {  
                   enlistDecedentInfo();
                 }
             }); 	
        }
    }); 

    function enlistDecedentInfo(){
        decedent_ID++;
        var decedentID = 'D' + decedent_ID.toString();
        $("button.recoverButton[decedentID='"+decedentID+"']").removeClass("btn btn-outline btn-sm bg-green-400 border-green-400 text-green-400 btn-icon rounded-round border-2 ml-2 addDecedent");
        $("button.recoverButton[decedentID='"+decedentID+"']").addClass("btn btn-outline btn-sm bg-pink-400 border-pink-400 text-pink-400 btn-icon rounded-round border-2 ml-2 enlisted");

        let decedent = $("#txt-decedent").val().trim();
        let datedied = $("#date-died").val().trim();
        let relation = $("#sel-relation").val().trim();
        let remains = $("#sel-remains").val().trim();
        let reinterred = $("#sel-reinterred").val().trim();
        let source = $("#txt-source").val().trim();

        $(".enlisted_decedents").append(
            '<tr>'+   
                '<td width="25%" style="padding:2px;">'+   
                    '<div class="input-group">'+
                        '<span style="padding:2px;" class="input-group-prepend"><button type="button" style="color:coral;padding: 0px 7px; margin-top: 0; margin-bottom: 0;" class="btn btn-sm btn-light removeDecedent" decedentID="'+decedentID+'"><i class="icon-undo"></i></button></span>'+         
                        '<input type="text" style="font-size:1em;padding:2px;" class="form-control decedent" decedentID="'+decedentID+'" name="addDecedent" value="'+decedent+'" readonly required>'+
                    '</div>'+
                '</td>'+  
                
                '<td class="datediedEntry" width="15%" style="padding:2px;">'+
                    '<input type="text" style="font-size:1em;padding:2px;padding-left:13px;text-align:left;color:transparent;text-shadow: 0 0 0 #ffffff;" class="form-control datedied" decedentID="'+decedentID+'" name="datedied" value="'+datedied+'" readonly required>'+
                '</td>' +

                '<td class="relationEntry" width="15%" style="padding:2px;">'+
                    '<input type="text" style="font-size:1em;padding:2px;padding-left:13px;text-align:left;color:transparent;text-shadow: 0 0 0 #ffffff;" class="form-control relation" decedentID="'+decedentID+'" name="relation" value="'+relation+'" readonly required>'+
                '</td>' +

                '<td class="remainsEntry" width="10%" style="padding:2px;">'+
                    '<input type="text" style="font-size:1em;padding:2px;padding-left:13px;text-align:left;color:transparent;text-shadow: 0 0 0 #ffffff;" class="form-control remains" decedentID="'+decedentID+'" name="remains" value="'+remains+'" readonly required>'+
                '</td>' +

                '<td class="reinterredEntry" width="10%" style="padding:2px;">'+
                    '<input type="text" style="font-size:1em;padding:2px;padding-left:13px;text-align:left;color:transparent;text-shadow: 0 0 0 #ffffff;" class="form-control reinterred" decedentID="'+decedentID+'" name="reinterred" value="'+reinterred+'" readonly required>'+
                '</td>' +

                '<td class="sourceEntry" width="25%" style="padding:2px;">'+
                    '<input type="text" style="font-size:1em;padding:2px;padding-left:13px;text-align:left;color:transparent;text-shadow: 0 0 0 #ffffff;" class="form-control source" decedentID="'+decedentID+'" name="source" value="'+source+'" readonly required>'+
                '</td>' +
            '</tr>')

        listDecedents();
        clearDecedentEntry();    
    }

    function listDecedents(){
        let decedentList = [];
	    let decedent = $(".decedent");
        let datedied = $(".datedied");
        let relation = $(".relation");
        let remains = $(".remains");
        let reinterred = $(".reinterred");
        let source = $(".source");

        let num_entries = decedent.length; 
	    if (num_entries > 0){
            for(var i = 0; i < num_entries; i++){
                let _decedentid = $(decedent[i]).attr("decedentID")
                let _decedent = $(decedent[i]).val();
                let _datedied = $(datedied[i]).val();
                let _relation = $(relation[i]).val();
                let _remains = $(remains[i]).val();
                let _reinterred = $(reinterred[i]).val();
                let _source = $(source[i]).val();

                decedentList.push({"decedentid" : _decedentid,
                                   "decedent" : _decedent,
                                   "datedied" : _datedied,
                                   "relation" : _relation,
                                   "remains" : _remains,
                                   "reinterred" : _reinterred,
                                   "source" : _source});
                
                $("#decedentList").val(JSON.stringify(decedentList));
            }
        }else{
            $("#decedentList").val('');
        }
    }

    function postinterment(){
        $("#btn-save").prop('disabled', true);       
    
        let trans_type = $("#trans_type").val();
        let userid = $("#userid").val();

        let lotid = $("#txt-lotid").val();

        let saleid = $("#txt-saleid").val();
        let intermentid = $("#txt-intermentid").val();
    
        let format_interdate = $("#date-interdate").val().split("/");
        format_interdate = format_interdate[2] + "-" + format_interdate[0] + "-" + format_interdate[1];
        let interdate = format_interdate;

        // if (interdate == '00/00/0000') {      
        //     interdate = '';
        // }

        let location = $("#sel-location").val();
        let layer = $("#sel-layer").val();
        let remarks = $("#txt-remarks").val();
        let decedentlist = $("#decedentList").val();
              
        var interment = new FormData();
        interment.append("trans_type", trans_type);
        interment.append("userid", userid);
        interment.append("lotid", lotid);
        interment.append("intermentid", intermentid);
        interment.append("saleid", saleid);
        interment.append("interdate", interdate);
        interment.append("location", location);
        interment.append("layer", layer);
        interment.append("remarks", remarks);
        interment.append("decedentlist", decedentlist);

        // alert(trans_type + ',' + saleid + ',' + intermentid + ',' + interdate + ',' + location + ',' + layer + ',' + remarks + ',' + decedentlist);
        
        $.ajax({
           url:"ajax/interment_save_record.ajax.php",
           method: "POST",
           data: interment,
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
                 title: 'Interment details successfully saved!',
                 type: 'success',
                 allowOutsideClick: false,
                 showConfirmButton: false,
                 timer: 1500
              })
              initialize(); 
           }
        })   	
    }

    // Remove decedent from Table -------------------------------------------------------------
    var idRemoveDecedent = [];
    localStorage.removeItem("removeDecedent");
    $("#form-interment").on("click", "button.removeDecedent", function(){
        $(this).parent().parent().parent().parent().remove();

        var decedentid = $(this).attr("decedentid");

        if(localStorage.getItem("removeDecedent") == null){
            idRemoveDecedent = [];
        }else{
            idRemoveDecedent.concat(localStorage.getItem("removeDecedent"))
        }

        idRemoveDecedent.push({"decedentid":decedentid});
        localStorage.setItem("removeDecedent", JSON.stringify(idRemoveDecedent));

        $("button.recoverButton[decedentid='"+decedentid+"']").removeClass('btn btn-outline btn-sm bg-pink-400 border-pink-400 text-pink-400 btn-icon rounded-round border-2 ml-2 enlisted');
        $("button.recoverButton[decedentid='"+decedentid+"']").addClass('btn btn-outline btn-sm bg-green-400 border-green-400 text-green-400 btn-icon rounded-round border-2 ml-2 addDecedent');

        listDecedents();
        clearDecedentEntry();
        
        let a = document.getElementById("decedent_list");
        let rows = a.rows.length;
    })  

    // Select decedent info for editing --------------------------------------------------
    $('#decedent_list').on('dblclick', 'tr', function() {
        // Get the decedentID of the clicked row
        var decedentID = $(this).find(".decedent").attr("decedentID");
        
        // Find the corresponding data for that decedent
        var decedent = $(this).find(".decedent").val();
        var datedied = $(this).find(".datedied").val();
        var relation = $(this).find(".relation").val();
        var remains = $(this).find(".remains").val();
        var reinterred = $(this).find(".reinterred").val();
        var source = $(this).find(".source").val();
    
        // Populate the textbox with the decedent's name (or other details as needed)
        $("#txt-decedent").val(decedent);   
        $("#date-died").val(datedied);      
        $("#sel-relation").val(relation).trigger('change');  
        $("#sel-remains").val(remains).trigger('change');    
        $("#sel-reinterred").val(reinterred).trigger('change');  
        $("#txt-source").val(source); 
        
        $('#btn-append').hide();
        $('#btn-edit').show();

        window.currentDecedentID = decedentID;

        $(this).find('td').each(function() {
            $(this).css('color', 'cyan');  // You can change 'cyan' to any neon color you prefer
        });
    });

    $("#btn-edit").click(function(){
        saveUpdatedDecedentData();
    });

    // Function to save updated data and update the table
    function saveUpdatedDecedentData() {
        // Get the updated values from the form fields
        var decedent = $("#txt-decedent").val().trim();
        var datedied = $("#date-died").val().trim();
        var relation = $("#sel-relation").val().trim();
        var remains = $("#sel-remains").val().trim();
        var reinterred = $("#sel-reinterred").val().trim();
        var source = $("#txt-source").val().trim();

        // Update the corresponding row in the table
        var row = $("#decedent_list").find("tr").filter(function() {
            return $(this).find(".decedent").attr("decedentID") == window.currentDecedentID;
        });

        // Update the row with the new values
        $(row).find(".decedent").val(decedent);
        $(row).find(".datedied").val(datedied);
        $(row).find(".relation").val(relation);
        $(row).find(".remains").val(remains);
        $(row).find(".reinterred").val(reinterred);
        $(row).find(".source").val(source);

        // Optionally, update the text value inside the row (to be displayed)
        $(row).find(".decedent").val(decedent);
        $(row).find(".datedied").val(datedied);
        $(row).find(".relation").val(relation);
        $(row).find(".remains").val(remains);
        $(row).find(".reinterred").val(reinterred);
        $(row).find(".source").val(source);

        listDecedents();
        clearDecedentEntry();

        swal.fire({
            title: 'Decedent details updated successfully!',
            type: 'success',
            showConfirmButton: false,
            timer: 1500
        });
    }

    // ==== SEARCH SALES ====================================================================
    $("#lbl-sale-categorycode").click(function(){
        $("#sale-categorycode").val('').trigger('change');
    });
  
    $("#lbl-sale-classcode").click(function(){
        $("#sale-classcode").val('').trigger('change');
    });   
    
    $("#lbl-sale-salestatus").click(function(){
        $("#sale-salestatus").val('').trigger('change');
    });  
    
    $('#modal-search-sales').on('shown.bs.modal', function () {
        stl.search('').draw();  // clear datatable filter textbox
        stl.table().container().querySelector('.dataTables_filter input').focus(); // set focus
        $("#sale-salestatus").val('').trigger('change');
    });

    $('#sale-categorycode, #sale_date_range, #sale-classcode, #sale-salestatus').on("change", function(){
        let categorycode = $("#sale-categorycode").val();
  
        let date_range = $("#sale_date_range").val();
        let start_date = date_range.substring(6, 10) + '-' + date_range.substring(0, 2) + '-' + date_range.substring(3, 5);
        let end_date = date_range.substring(19, 23) + '-' + date_range.substring(13, 15) + '-' + date_range.substring(16, 18);
  
        let classcode = $("#sale-classcode").val();
        let salestatus = $("#sale-salestatus").val();    
  
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
                    var salestatus = st.salestatus;
                    
                    var beneficiary = st.beneficiary;
                    var latitude = st.latitude;
                    var longitude = st.longitude;
                    // let salestatus = st.salestatus;
  
                    var button = "<td><button type='button' class='btn btn-outline btn-sm bg-green-400 border-green-400 text-green-400 btn-icon rounded-round border-2 ml-2 btnSale' saleid='"+saleid+"' lotid='"+lotid+"' latitude='"+latitude+"' longitude='"+longitude+"'><i class='icon-pencil3'></i></button></td>";  
                    stl.row.add([full_name, purdate, lotid, catdescription, salestatus, beneficiary, button]);
                  }
                  stl.draw();
              },
              beforeSend: function() {
              },  
              complete: function() {
                // Apply padding styles after DataTable is drawn - adjust row height of data table
                $(".salesTransactionTable td").css({
                    "padding-top": "5px",
                    "padding-bottom": "5px"
                });
              }, 
        })    
    });   
  
    // Ensure that padding is applied whenever DataTable redraws (e.g., page switch or filtering)
    $(".salesTransactionTable").on("draw.dt", function () {
      $(".salesTransactionTable td").css({
          "padding-top": "5px",
          "padding-bottom": "5px"
      });
    });   
    
    // Search Sale
    $(".salesTransactionTable tbody").on("click", "button.btnSale", function(){
        $("#modal-search-sales").modal("hide");
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
                $("#txt-lname").val(answer["lname"].toUpperCase());
                $("#txt-fname").val(answer["fname"].toUpperCase());
                $("#txt-mi").val(answer["mi"]);
                $("#txt-saleid").val(answer["saleid"]);
                $("#txt-lotid").val(answer["lotid"]);
            }
        })
    }); 

    function formatDateOnBlur(inputSelector) {
        $(document).on('blur', inputSelector, function () {
            var dateValue = $(this).val().trim();
            
            // If the input is empty, do not consider it an error and exit the function early
            if (dateValue === "") {
                return;
            }
        
            // Restrict input to numbers and slashes only
            dateValue = dateValue.replace(/[^0-9\/]/g, '');
        
            // Check if the date is in the MM/DD/YYYY format or not
            var datePattern = /^(\d{1,2})\/(\d{1,2})\/(\d{2,4})$/;
            var match = dateValue.match(datePattern);
        
            var errorMessages = [];
        
            if (match) {
                var month = match[1].padStart(2, '0');   // Ensure month is two digits
                var day = match[2].padStart(2, '0');     // Ensure day is two digits
                var year = match[3];  // Don't modify the year, leave it as is
        
                // Validate the year
                if (year.length !== 4) {
                    errorMessages.push('Please enter a valid 4-digit year.');
                }
        
                // Validate the month
                if (month < 1 || month > 12) {
                    errorMessages.push('Please enter a valid month (01-12).');
                }
        
                // Validate the days in the month (considering leap years for February)
                var daysInMonth = {
                    '01': 31, '02': (year % 4 === 0 && (year % 100 !== 0 || year % 400 === 0)) ? 29 : 28, 
                    '03': 31, '04': 30, '05': 31, '06': 30, '07': 31, '08': 31, '09': 30, 
                    '10': 31, '11': 30, '12': 31
                };
        
                // Validate the day for the given month
                if (day < 1 || day > daysInMonth[month]) {
                    errorMessages.push('Please enter a valid day for the given month.');
                }
        
                // If there are any error messages, display them in a single alert
                if (errorMessages.length > 0) {
                    alert(errorMessages.join('\n'));
                    $(this).val('');  // Clear the input field after alert
                    $(this).focus();  // Focus back on the input field after clearing
                    return;
                }
        
                // If everything is valid, format the date and update the input field
                var correctedDate = month + '/' + day + '/' + year;
                $(this).val(correctedDate);
            } else {
                // If the input does not match the MM/DD/YYYY format
                alert('Please enter the date in MM/DD/YYYY format.');
                $(this).val('');  // Clear the input field after alert
                $(this).focus();  // Focus back on the input field after clearing
            }
        });
    }
    
    formatDateOnBlur('#date-interdate');
    formatDateOnBlur('#date-died');
});     