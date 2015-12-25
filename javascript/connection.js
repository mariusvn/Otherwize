$(document).ready(function(){
	$("#pass_input").keypress(function(event) {
	    if (event.which == 13) {
	        event.preventDefault();
	        $("#connectForm").submit();
	    }
	});
	$("#mail_input").keypress(function(event) {
	    if (event.which == 13) {
	        event.preventDefault();
	        $("#connectForm").submit();
	    }
	});
	$("#submit_btn").click(function(){
		$("#connectForm").submit();
	})
	$("#connectForm").submit(function(e){
        e.preventDefault();
        var actionUrl = e.currentTarget.action;
        var methode = $(this).attr("method");
        $.ajax({
        	method: methode,
        	url: actionUrl,
        	data: {
        		mail: $("#mail_input").val(),
        		pass: $('#pass_input').val()
        	},
        	success: function(data){
        		if(data == "success"){
        			window.location.href = "index.php";
        		}else{
        			alert(data);
        		}
        	},
        	error: function(e, data){
        		alert(data);
        	}
        });
    });
});