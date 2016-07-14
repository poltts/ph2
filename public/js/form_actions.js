
function send_form() {

	$.ajax({
     type: "POST",
	 url: "../../ajax/process_form.php",
	 data: $('form.contact').serialize(),
	    success: function(msg){
	        $("#messages > span").html(msg);
	    },
	 	error: function(msg){	 		
	        $("#messages > span").html(msg);
	 	}
    });
}