$( document ).ready( function(){

    cargaCatalogo();

    /**FUNCIÓN ONCLICK PARA INSERT DE CULTIVOS A LISTA DE USUARIO*/
    $( "#agregar" ).click( function(){

        if( $( "#modal-temperatura-max" ).val() > 50 || $( "#modal-temperatura-max" ).val() < 2 ){
            error_formulario( "modal-temperatura-max", "" );
            return false;
        }
        else if( $( "#modal-temperatura-min" ).val() < 1 || $( "#modal-temperatura-min" ).val() > 49 ){
            error_formulario( "modal-temperatura-max", "" );
            return false;       
        }
        else if( $( "#modal-humedad-max" ).val() > 90 || $( "#modal-humedad-max" ).val() < 22 ){
            error_formulario( "modal-humedad-max", "" );
            return false;       
        }
        else if( $( "#modal-humedad-min" ).val() < 20 || $( "#modal-humedad-min" ).val() > 89 ){
            error_formulario( "modal-humedad-max", "" );
            return false;       
        }
        else if( $( "#modal-suelo-max" ).val() > 100 || $( "#modal-suelo-max" ).val() < 2 ){
            error_formulario( "modal-suelo-max", "" );
            return false;       
        }
        else if( $( "#modal-suelo-min" ).val() < 1 || $( "#modal-suelo-min" ).val() > 99 ){
            error_formulario( "modal-suelo-max", "" );
            return false;       
        }
        else if( $( "#modal-agua-max" ).val() > 100 || $( "#modal-agua-max" ).val() < 2 ){
            error_formulario( "modal-agua-max", "" );
            return false;       
        }
        else if( $( "#modal-agua-min" ).val() < 1 || $( "#modal-agua-min" ).val() > 99 ){
            error_formulario( "modal-agua-max", "" );
            return false;       
        }
        else if( $( "#modal-luz-max" ).val() > 100 || $( "#modal-luz-max" ).val() < 2 ){
            error_formulario( "modal-luz-max", "" );
            return false;       
        }
        else if( $( "#modal-luz-min" ).val() < 1 || $( "#modal-luz-min" ).val() > 99 ){
            error_formulario( "modal-luz-max", "" );
            return false;       
        }


        $.ajax({
            "url"       : appData.base_url + "/insertacultivo",
            "dataType"  : "json",
            "type"      : "post",
            "data"      : {
                "uid" : appData.uid,
                "producto" : $( "#modal-cultivo" ).val(),
                "maxt" : $( "#modal-temperatura-max" ).val(),
                "mint" : $( "#modal-temperatura-min" ).val(),
                "maxh" : $( "#modal-humedad-max" ).val(),
                "minh" : $( "#modal-humedad-min" ).val(),
                "maxs" : $( "#modal-suelo-max" ).val(),
                "mins" : $( "#modal-suelo-min" ).val(),
                "maxa" : $( "#modal-agua-max" ).val(),
                "mina" : $( "#modal-agua-min" ).val(),
                "maxl" : $( "#modal-luz-max" ).val(),
                "minl" : $( "#modal-luz-min" ).val(),
            }
        })
        .done( function( json ){
            if (json.mensaje){
                $( "#modalMensaje" ).modal( "show" );
                $( "#modalMensajeBody" ).html( "El producto ha sido agregado" );
                $('#cerrar').click();
            }
        })
        .fail( function(){
            alert( "ERROR" );
        });
    });

    return true;
});

/**FUNCIÓN CARGAR CATÁLOGO */
function cargaCatalogo(){
    $.ajax({
        "url"       : appData.base_url + "/getcatalogo",
        "dataType"  : "json"
    })
    .done( function( json ){
        $.each( json.cultivos, function( i, cultivo ){
            $( "#catalogo" ).append(
                '<div class="col-md-4 mb-5">'
                + '<div class="card" style="width: 22rem;">'
                + '<img class="card-img-top" src="'
                +       cultivo.image +'" alt="'
                +       cultivo.producto +'" width="22rem" height="200px">'
                + '<div class="card-body">'
                + '    <p class="card-text text-capitalize font-weight-bold " style="font-size: 2rem;">'
                +           cultivo.producto +'</p>'
                + '    <p class="card-text font-weight-bold"> Parámetros recomendables: <br\>'
                + 'Temperatura: _____________ '
                +           cultivo.longitudes.temperatura.maximo + '°C / ' + cultivo.longitudes.temperatura.minimo + '°C<br\> ' 
                + 'Humedad Ambiente: ______ '
                +           cultivo.longitudes.humedad.maximo + '% / ' + cultivo.longitudes.humedad.minimo + '%<br\> ' 
                + 'Humedad del suelo: _______'
                +           cultivo.longitudes.suelo.maximo  + '% / ' + cultivo.longitudes.suelo.minimo + '%<br\> ' 
                + 'Nivel de agua: ____________ '
                +           cultivo.longitudes.agua.maximo + '% / ' + cultivo.longitudes.agua.minimo + '%<br\> ' 
                + 'Nivel de luz: ______________  '
                +           cultivo.longitudes.luz.maximo + '% / ' + cultivo.longitudes.luz.minimo + '%<br\> ' 
                + '</p>'

                /**BUTTON AGREGAR */
                + '<div align="center">'

                /**BUTTON INFO */
                + '<button type="button", class="btn btn-primary" data-toggle="modal" data-target="#modalInfo"'
                + 'onclick="cargaInfo(\''+ cultivo.producto +'\', \''+ cultivo.descripcion +'\')">'
                + '<i class="fas fa-info-circle"></i>&nbsp;Información'
                + '</button>&nbsp;&nbsp;'
                /**BUTTON INFO */

                + '<button type="button" class="btn btn-success" data-toggle="modal" '
                + 'data-target="#agregarProducto" onclick="agregarProducto(\''
                +  cultivo.producto          +'\' , \''
                +  cultivo.longitudes.temperatura.maximo +'\' , \'' + cultivo.longitudes.temperatura.minimo +'\' , \''
                +  cultivo.longitudes.humedad.maximo     +'\' , \'' + cultivo.longitudes.humedad.minimo     +'\' , \''
                +  cultivo.longitudes.suelo.maximo       +'\' , \'' + cultivo.longitudes.suelo.minimo       +'\' , \''
                +  cultivo.longitudes.agua.maximo        +'\' , \'' + cultivo.longitudes.agua.minimo        +'\' , \''
                +  cultivo.longitudes.luz.maximo         +'\' , \'' + cultivo.longitudes.luz.minimo         +'\' , \''
                + '\')">'
                + '<i class="fas fa-plus-circle"></i> &nbsp;Agregar '
                +' </button>'
                /**BUTTON AGREGAR */

                + '</div>'
                + '</div>'
                + '</div>'
                + '</div>'
            );
        });
    })
    .fail( function(){
        alert("ERROR");
    });
}

function agregarProducto( producto, maxt, mint, maxh, minh, maxs, mins, maxa, mina, maxl, minl ){
    $( "#modal-cultivo" ).attr("readonly", true);
    $( "#modal-cultivo" ).val(producto);
    $( "#modal-temperatura-max" ).val(maxt);
    $( "#modal-temperatura-min" ).val(mint);
    $( "#modal-humedad-max" ).val(maxh);
    $( "#modal-humedad-min" ).val(minh);
    $( "#modal-suelo-max" ).val(maxs);
    $( "#modal-suelo-min" ).val(mins);
    $( "#modal-agua-max" ).val(maxa);
    $( "#modal-agua-min" ).val(mina);
    $( "#modal-luz-max" ).val(maxl);
    $( "#modal-luz-min" ).val(minl);
}

function cargaInfo( nombre, descripcion ){

    if( descripcion != "undefined" ){
        $( "#modalInfoSubtitle" ).html( nombre);
        $( "#modalInfoBody" ).html( descripcion );
    }
    else{
        $( "#modalInfoSubtitle" ).html( nombre);
        $( "#modalInfoBody" ).html( "No existe información acerca de este producto"  );
    }
}