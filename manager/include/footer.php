<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://malsup.github.io/jquery.form.js"></script> 
<script src="<?=$adminpath;?>tinymce/jquery.tinymce.min.js"></script>
<script src="<?=$adminpath;?>tinymce/tinymce.min.js"></script>
<script src="<?=$adminpath;?>tinymce/imageload.js"></script>
<script type="text/javascript" src="<?=$adminpath;?>ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?=$adminpath;?>ckeditor/adapters/jquery.js"></script>
<script src="https://cdn.datatables.net/2.2.1/js/dataTables.min.js"></script>
<script>

var url = window.location.href;
	
// tiny text editor 
tinymce.init({
selector: ".textarea",
setup: function (editor) {
    editor.on('change', function () {
        editor.save();
    });
}
});

// form submit trigger on save data for tiny text editor
$('form').bind('form-pre-serialize', function(e) {
    tinyMCE.triggerSave();
});


// show message after submit form with ajax form
$('#submitForm').ajaxForm({
	beforeSubmit: function() {
		$('.msgbox').html("<div class='loading-wrapper'><span class='loading_span'></span><p>Please wailt...</p></div>");
	 },
    success: function(data) {
     	$('.msgbox').html(data);
    },
}); 

$('#loginSubmit').ajaxForm({
	beforeSubmit: function() {
		$('.loginerr').html("<span class='loading_span'></span>");
	 },
    success: function(data) {
    	var data = JSON.parse(data);
    	if(data.status){
    		window.location.href="<?=$path;?>manager/dashboard";
    	}else{
     		$('.loginerr').html(data.msg);
     		setTimeout(function(){
     			$('.loginerr').html("<input type='submit' name='login' value='Login'>");
     		},1500);
    	}
    },
}); 
	
	
// show and hide password 
$(document).on('click', '.showhidepassword', function(e){
    e.preventDefault();
    if($(this).prev().attr('type')=='password'){
        $(this).prev().attr('type', 'text');
        $(this).removeClass('bi-eye-slash').addClass('bi-eye');
    }else{
        $(this).prev().attr('type', 'password');            
        $(this).addClass('bi-eye-slash').removeClass('bi-eye');
    }
})    

// data table plugin
let table = new DataTable('#myTable', {
	ordering:  false
});

	
// submenu toggle 
$(document).on('click', '.mlink', function(){
	$(".smdiv").each(function(){
		$(this).slideUp(500);
	})

	if($(this).next().css('display')=='none'){
		$(this).next().slideDown(500);
	}else{
		$(this).next().slideUp(500);
	}
	
})


// ============= delete all selected data ===============================
var selectedrow = "";
var checkedValues = "";
$(document).on('click', '#parentcheckbox', function () {
    $('.childcheckbox').prop('checked', this.checked);
    checkedValues = $('.childcheckbox:checked').map(function () {
        return $(this).val(); // Return the value of each checkbox
    }).get(); // Convert to a regular array

    // Log or display the values
    // console.log(checkedValues);
    selectedrow = checkedValues.join(', ');

    let checkedCount = $('.childcheckbox:checked').length;
    // Show or hide the "Delete" button based on the count
    if (checkedCount >= 2) {
        $('#deleteBtn').show(); // Show the button
    } else {
        $('#deleteBtn').hide(); // Hide the button
    }
});


// If any individual checkbox is unchecked, uncheck "Check All"
$('.childcheckbox').on('click', function () {
    if ($('.childcheckbox:checked').length !== $('.childcheckbox').length) {
        $('#parentcheckbox').prop('checked', false);
    } else {
        $('#parentcheckbox').prop('checked', true);
    }
    checkedValues = $('.childcheckbox:checked').map(function () {
        return $(this).val(); // Return the value of each checkbox
    }).get(); // Convert to a regular array

    // Log or display the values
    // console.log(checkedValues);
    selectedrow = checkedValues.join(', ');

    let checkedCount = $('.childcheckbox:checked').length;
    // Show or hide the "Delete" button based on the count
    if (checkedCount >= 2) {
        $('#deleteBtn').show(); // Show the button
    } else {
        $('#deleteBtn').hide(); // Hide the button
    }
});

$(document).on('click', '#deleteBtn', function(){
	var tbl=$(this).data('table');
	swal({
		title: "Are you sure?",
		text: "You want to delete selected records.",
		icon: "warning",
		showCancelButton: true,
		confirmButtonClass: "btn-danger",
		confirmButtonText: "Yes, delete it!",
		closeOnConfirm: false,
		buttons: true,
		dangerMode: true,
	}).then((willDelete) => {
	  if (willDelete) {
	   jQuery.ajax({
			url : url,
			type : "POST",
			data : {
				deleteselecteddata : 1,
				ids : selectedrow,
				tbl : tbl,
			},
			dataType : "html",
			success : function(data){
				if(data){
					selectedrow.split(", ").forEach(function(id){
				 		$("#remove"+id).hide();
					})
					swal('Deleted Successfully', 'Click `OK` to Close', 'success');
					// location.reload();
				}else if(data){
					swal("Failed to Deleted!", "Failed to Deleted Data.", "error");
				}
			}
		})
	  }
	});
})

// ============= delete all selected data ===============================

		
$(document).on("click", ".delbtn", function(){
	var id = $(this).attr('ide');
	var tbl = $(this).data('table');
	swal({
		title: "Are you sure?",
		text: "Your will not be able to recover!",
		icon: "warning",
		showCancelButton: true,
		confirmButtonClass: "btn-danger",
		confirmButtonText: "Yes, delete it!",
		closeOnConfirm: false,
		buttons: true,
		dangerMode: true,
	}).then((willDelete) => {
	  if (willDelete) {
	   jQuery.ajax({
			url : url,
			type : "POST",
			data : {
				deletedata : 1,
				id : id,
				tbl : tbl,
			},
			dataType : "html",
			success : function(data){

				if(data){
				 	$("#remove"+id).hide();
					swal('Deleted Successfully', 'Click `OK` to Close', 'success');
					// location.reload();
				}else if(data){
					swal("Failed to Deleted!", "Failed to Deleted Data.", "error");
				}
			}
		})
	  }
	});
});
		
		
		
		
$(document).on("click", ".imgquestion", function(){
	$(this).find('input').click();
	// alert('ok');
})
		

$(document).on("click", ".imgquestion .imgInput, .imgquestion .imgclose", function(e){
	e.stopPropagation();
})


$(document).on("change", ".imgInput", function(){
    var $input = $(this);
    var inputFiles = this.files;
    if(inputFiles == undefined || inputFiles.length == 0) return;
    var inputFile = inputFiles[0];
    var reader = new FileReader();
    reader.onload = function(event) {
        $input.next().attr("src", event.target.result);
    };
    reader.onerror = function(event) {
        alert("I AM ERROR: " + event.target.error.code);
    };
    reader.readAsDataURL(inputFile);

   	$(this).prev().addClass('active');

})

 // add multiple images
// $(document).on("change", ".imgInputMultiple", function(){
//     var $input = $(this);
//     var inputFiles = this.files;
//     var imglength = inputFiles.length;
//     if(inputFiles == undefined || inputFiles.length == 0) return;
//     var inputFile = inputFiles[0];
//     var reader = new FileReader();
//     reader.onload = function(event) {
//         $input.next().attr("src", event.target.result);
//     };
//     reader.onerror = function(event) {
//         alert("I AM ERROR: " + event.target.error.code);
//     };
//     reader.readAsDataURL(inputFile);

//    	$(this).prev().addClass('active');

// })

$(document).on("click", ".multi-imgquestion", function(){
	$(this).find('input').click();
	// alert('ok');
})

$(document).on("click", ".multi-imgquestion .imgInputMultiple, .multi-imgquestion .imgclose", function(e){
	e.stopPropagation();
})

$(document).on("change", ".imgInputMultiple", function(){
        var files = $(this)[0].files;
        $("#gal-container").empty();
        if(files.length > 0){
            for(var i = 0; i < files.length; i++){
                var reader = new FileReader();
                reader.onload = function(e){
                    $("<div class='gal-preview'><img src='" + e.target.result + "'><a href='javascript:' class='ri-delete-bin-line delete'></a><input type='number' min='1' value='0' name='order[]' id='ordernumber'></div>").appendTo("#gal-container");
                };
                reader.readAsDataURL(files[i]);
            }
           $('.multi-imgquestion').hide();
           $('.clearallimgdiv').show();
        }
    });
	$("#gal-container").on("click", ".delete", function(){
		var length = $('.delete').length;
        $(this).parent(".gal-preview").remove();
        $("#file-input").val(""); // Clear input value if needed
        if(length <= 1){
        	$('.imgquestion').show();
          	$('.clearallimgdiv').hide();
        }
    });
	$("#clrimgs").on("click", function(){
        $('.clearallimgdiv').hide();
        $(".delete").each(function(){
        	$("#gal-container .gal-preview").remove();
        })
        $('.imgquestion').show();
	})


// ============= remove image from file input ===================
$(document).on("click", ".imgclose", function(){
	$(this).next().val('');
	$(this).next().next().attr('src', '<?=$adminpath;?>images/preview.jpg');
	$(this).removeClass('active')
	
});


$(document).on("input",".answer-text", function(){
	console.log($(this).val());
})



// update table data status active or inactive
$(document).on('change', '.form-check-input', function(){
var getId = $(this).attr('ide');
var table = $(this).data('table');
// alert(getId+", "+table);
// return false;
$.ajax({
	url:url,
	type: "POST",
	data : {updateStatus: 1, id:getId, table:table},
	success: function(data){
		
	}
});
})



// update table data status active or inactive
$(document).on('change', '#child-category', function(){
var getVal = $(this).val();
$.ajax({
	url:url,
	type: "POST",
	data : {fetchCategory: 1, catid:getVal},
	success: function(data){
		$('#subcategory').html(data);
	}
});
})

</script>

</body>
</html>