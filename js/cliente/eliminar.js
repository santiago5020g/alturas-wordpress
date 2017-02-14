$(document).ready(function(){

		$(".eliminar").click(function(){
		var r = confirm('Esta seguro de eliminar el registro?')
		if (r == true) {
			user = $(this).attr('usr');
			$.ajax({
			  method: "POST",
			  url: "../cliente/eliminar.php?id="+user,
			  data: { name: "John", location: "Boston" }
			})
			  .done(function( msg ) {
			    $("#mensaje").attr('class','alert alert-success');
			    $("#mensaje").html(msg);
			    $("#"+user).fadeOut( "slow" );
			  });
		    return true;
		} else {
			
		    return false;
		}

			});
});

