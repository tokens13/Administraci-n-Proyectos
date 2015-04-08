$(function(){
	
	$("button[name='eliminar']").hover(function() {
	$( this ).addClass( "btn-danger" );
	}, function() {
	$( this ).removeClass( "btn-danger" );
	}
	);
	
	$("button[name='agregar']").click(function() {
		alert('agregar');
	});	
	
});

