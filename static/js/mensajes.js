function muestra_mensaje( tipo, mensaje ) {
	$( "#mensaje" ).html( "" );

	// switch( tipo ) {
	// 	case "danger" : titulo = "ERROR"; break;
	// 	case "info"   : titulo = "INFORMACIÓN"; break;
	// 	case "warning": titulo = "ADVERTENCIA"; break;
	// 	case "success": titulo = "ÉXITO"; break;
	// 	default       : titulo = "ERROR"; break;
	// }

	$( "#mensaje" ).append( '<div class="alert text-white  bg-'
	+ tipo +' border-'+ tipo +'" role="alert" >' +
		mensaje + '</div>' );

	setTimeout( function() {
		$( ".alert" ).remove();
	}, 5000 );

}
