$(document).ready(function(){
	$("#disconnect_button").click(function(){
		$.ajax({
			url: "traitement/disconnect.php",
			success: function(data){
				window.location.reload(true);
			}
		});
	})
})