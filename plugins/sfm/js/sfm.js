$( document ).ready(function() {
    
     /* automatic submit form */
    $('#file').change(function() {
	$('#uploadform').submit();
      });
    
    
    $("#drop-area").on('dragenter', function (e){
    e.preventDefault();
    });

    $("#drop-area").on('dragover', function (e){
    e.preventDefault();
    });

    $("#drop-area").on('drop', function (e){	
    e.preventDefault();
    var sfmfile = e.originalEvent.dataTransfer.files;
    createFormData(sfmfile);
    });
    
    var percent = $('.percent');
    var status = $('#status');
    
    /* ajax form */      
    //$('.sfmform').ajaxForm({
    $(".sfmform").livequery(function() { $(this).ajaxForm({
	    
	success: function(data) {
	    status.html(data);
	    $('.myFiles').load(document.URL +  ' .myFiles');
	    
	},
       
		       
    });
    });
    
     
    
   
    /* show used storage in progressbar */
    $width=$("#myBar").data('width');
    $("#myBar").css("width",$width+"%");
    
        
});

    