$( document ).ready( function(){

    /**EVENTO ONCLICK PARA EL REGISTRO A TRÁVES DE FIREBASE AUTH */
    $( "#btn-registrar" ).click( function(){

        if( $( "#nombre" ).val() == "" ){
            muestra_mensaje( "danger", "El nombre completo es requerido" );
            return false;
        }
        else if ( $( "#nombre" ).val().length < 7 ){
            muestra_mensaje( "danger", "Debe incluir al menos un apellido" );
            return false;
        }
        else if ( $( "#correo" ).val() == "" ){
            muestra_mensaje( "danger", "La dirección de correo electrónico es requerida" );
            return false;
        }
        else if ( $( "#contrasenia" ).val() == "" ){
            muestra_mensaje( "danger", "La contraseña es requerida" );
            return false;
        }

        $( "#btn-registrar" ).hide();
        $( "#div-registrar" ).append(
            '<i class="fas fa-spinner fa-pulse fa-2x"></i>'
        );
        $.ajax({
            "url"       : appData.base_url + "/registrousuario",
            "dataType"  : "json",
            "type"      : "post",
            "data"      : {
                "nombre"        : $( "#nombre" ).val(),
                "correo"        : $( "#correo" ).val(),
                "contrasenia"   : $( "#contrasenia" ).val()
            }
        })
        .done( function( json ){

            if( json.mensaje == true ){
                $( "#modalMensaje" ).modal( "show" );
                $( "#modalMensajeTittle" ).html( "¡ÉXITO!" );
                $( "#modalMensajeBody" ).html( "Su registro ha sido ¡EXITOSO!" );
                $( "#btn-registrar" ).show();
                $( "#div-registrar" ).hide();
            }
            else if ( json.mensaje == "The email address is already in use by another account." ){
                muestra_mensaje("danger", "La dirección de correo electrónico ya está en uso." );
                $( "#btn-registrar" ).show();
                $( "#div-registrar" ).hide();
            }
            else if ( json.mensaje == "A password must be a string with at least 6 characters."){
                muestra_mensaje("danger", "La contraseña debe ser de al menos 6 caracteres." );
                $( "#btn-registrar" ).show();
                $( "#div-registrar" ).hide();
            }
            else if( json.mensaje == "The email address is invalid." ){
                muestra_mensaje("danger", "La dirección de correo electrónico no es válida." );
                $( "#btn-registrar" ).show();
                $( "#div-registrar" ).hide();
            }

        })
        .fail( function(){
            alert( "ERROR" );
        });
    });
    return true;
});