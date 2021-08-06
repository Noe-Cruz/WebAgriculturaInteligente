$( document ).ready( function(){

    /**VALIDACION Y AUTENTIFICACIÓN DE CREDENCIALES POR MEDIO DE FIREBASE */
    $( "#btn-iniciosesion" ).click( function(){

        if( $( "#correo" ).val() == "" ){
            muestra_mensaje( "danger", "Ingrese una dirección de correo electrónico" );
            return false;
        }
        else if( $( "#contrasenia" ).val() == "" ){
            muestra_mensaje( "danger", "Ingrese la contraseña para su cuenta" );
            return false;       
        }

        $( "#btn-iniciosesion" ).hide();
        $( "#btn-iniciogoogle" ).hide();
        $( "#div-iniciosesion" ).append(
            '<i class="fas fa-spinner fa-pulse fa-2x"></i>'
        );
        $.ajax({
            "url"       : appData.base_url + "/creasesion",
            "dataType"  : "json",
            "type"      : "post",
            "data"      : {
                "correo"        : $( "#correo" ).val(),
                "contrasenia"   : $( "#contrasenia" ).val()
            }
        })
        .done( function( json ){
            if( json.response.registered == true ){
                $( location ).attr( "href", appData.base_url + "/creasession/" + 
                json.response.localId + "/" +
                json.response.email + "/" +
                json.response.idToken);
            }
            else if ( json.response == "INVALID_PASSWORD" ){
               muestra_mensaje( "danger", "Contraseña inválida" );
                $( "#btn-iniciosesion" ).show();
                $( "#btn-iniciogoogle" ).show();
                $( "#div-iniciosesion" ).hide();
            }
            else if ( json.response == "EMAIL_NOT_FOUND" ){
                muestra_mensaje( "danger", "Cuenta inexistente" );
                $( "#btn-iniciosesion" ).show();
                $( "#btn-iniciogoogle" ).show();
                $( "#div-iniciosesion" ).hide();
            }
            else if ( json.response == "INVALID_EMAIL" ){
                muestra_mensaje( "danger", "Formato de correo electrónico inválido" );
                $( "#btn-iniciosesion" ).show();
                $( "#btn-iniciogoogle" ).show();
                $( "#div-iniciosesion" ).hide();
            }
        })
        .fail( function(){
            alert( "ERROR" );
        })
    });

    return true;

});
