var storage;
$( document ).ready( function(){
    $( "#cargando" ).hide();
    /**CONFIGURACIÓN DE FIREBASE */
    var firebaseConfig = {
        apiKey: "AIzaSyDYgYS6PyAmGGTxj3WFpsTYlLuK7_7W7iE",
        authDomain: "huertoint.firebaseapp.com",
        databaseURL: "https://huertoint-default-rtdb.firebaseio.com",
        projectId: "huertoint",
        storageBucket: "huertoint.appspot.com",
        messagingSenderId: "819049979924",
        appId: "1:819049979924:web:3fddbb8a09d659a8f20701"
        };

    firebase.initializeApp(firebaseConfig);
    storage   = firebase.storage();

    getCultivos();

    /**FUNCIÓN ONCLICK PARA UPDATE E INSERT DE CULTIVOS EN LISTA */
    $( "#modal-boton" ).click( function(){

        if( $( "#accion" ).val() == "insert" && $( "#modal-cultivo" ).val() == "" ){
            error_formulario( "modal-cultivo", "" );
            return false;
        }
        else if(  $( "#accion" ).val() == "insert" && $( "#modal-descripcion" ).val() == "" ){
            error_formulario( "modal-descripcion", "" );
            return false;
        }
        else if( $( "#modal-temperatura-max" ).val() > 50 || $( "#modal-temperatura-max" ).val() < 2 ){
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
            "url"       : appData.base_url + 
                            (	$( "#accion" ).val() == "update" ?
                            "/actualizacultivo" : "/insertdocultivo"  ),
            "dataType"  : "json",
            "type"      : "post",
            "data"      : {
                "uid" : appData.uid,
                "producto"      : $( "#modal-cultivo" ).val(),
                "image"         : $( "#modal-imageURL" ).val(),
                "descripcion"   : $( "#modal-descripcion" ).val(),
                "maxt"          : $( "#modal-temperatura-max" ).val(),
                "mint"          : $( "#modal-temperatura-min" ).val(),
                "maxh"          : $( "#modal-humedad-max" ).val(),
                "minh"          : $( "#modal-humedad-min" ).val(),
                "maxs"          : $( "#modal-suelo-max" ).val(),
                "mins"          : $( "#modal-suelo-min" ).val(),
                "maxa"          : $( "#modal-agua-max" ).val(),
                "mina"          : $( "#modal-agua-min" ).val(),
                "maxl"          : $( "#modal-luz-max" ).val(),
                "minl"          : $( "#modal-luz-min" ).val(),
            }
        })
        .done( function( json ){
            if (json.mensaje){
                $('#cerrar').click();
                $("#table-cultivos > tbody").empty();
                getCultivos();
            }
        })
        .fail( function(){
            alert( "ERROR" );
        });

        return true;
    });

    /**FUNCIÓN ONCLICK PARA DELETE DE CULTIVOS DE LA LISTA */
    $( "#eliminarProducto" ).click( function(){

        $.ajax({
            "url"       : appData.base_url + "/borrarcultivo",
            "dataType"  : "json",
            "type"      : "post",
            "data"      : {
                "uid"       : appData.uid,
                "producto"  : $( this ).attr( "producto" )
            }
        })
        .done( function(json){
            if(json.mensaje){
                $( "#cancelarEliminar" ).click();
                $("#table-cultivos > tbody").empty();
                getCultivos();
            }
        })
        .fail( function(){
            alert("ERROR");
        });
    });
});

/**FUNCIONES PARA LA OBTENCIÓN DE VALORES A TRAVÉS DE VENTANAS MODALES */
function editaCultivo(producto, maxt, mint, maxh, minh, maxs, mins, maxa, mina, maxl, minl){
    $( "#modalCrearSubtitle" ).html( "Actualizar cultivo" );
    $( "#modal-boton" ).html( "Guardar cambios" );
    $( "#modal-cultivo" ).attr("readonly", true);
    $( "#modal-cultivo" ).val(producto);
    $( "#descripcion" ).hide();
    $( "#btn-image" ).hide();
    $( "#image" ).hide();
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
    $( "#accion" ).val( "update" );
}

function eliminaCultivo(producto){
    $( "#modalEliminarLabel" ).html( "Eliminar" );
    $( "#modal-producto" ).html(producto);
    $( "#eliminarProducto" ).attr( "producto", producto );
}

function registrarCultivo(){
    $( "#descripcion" ).show();
    $( "#btn-image" ).show();
    $( "#image" ).show();

    $( "#modalCrearSubtitle" ).html( "Registrar cultivo" );
    $( "#modal-boton" ).html( "Registrar" );
    $( "#modal-cultivo" ).attr("readonly", false);
    $( "#modal-cultivo" ).val("");
    $( "#modal-file" ).val("");
    $( "#modal-descripcion" ).val("");
    $( "#modal-temperatura-max" ).val("");
    $( "#modal-temperatura-min" ).val("");
    $( "#modal-humedad-max" ).val("");
    $( "#modal-humedad-min" ).val("");
    $( "#modal-suelo-max" ).val("");
    $( "#modal-suelo-min" ).val("");
    $( "#modal-agua-max" ).val("");
    $( "#modal-agua-min" ).val("");
    $( "#modal-luz-max" ).val("");
    $( "#modal-luz-min" ).val("");
    $( "#accion" ).val( "insert" );
    
}

function getCultivos() {

    $.ajax({
        "url"       : appData.base_url + "/getcultivos",
        "dataType"  : "json",
        "type"      : "post",
        "data"      : {
            "uid"   :  appData.uid
        }
    })
    .done( function(json){

        if( json.cultivos != "" ){
            
            $( "#lista-vacia" ).hide();
            $.each( json.cultivos, function( i, cultivo ){

                $( "#table-cultivos" ).find( "tbody" ).append(
                    '<tr style="font-size: 1em;">'
                    + '<td class="text-center"><img src="'+ cultivo.image +'" width="150px" height="100px"/></td>'
                    + '<td class="text-center text-capitalize" style="vertical-align: middle; font-size: 2em;">'+ cultivo.producto +'</td>'
                    + '<td style="vertical-align: middle;">'+ cultivo[appData.uid]['humedad']['maximo'] +'%</td>'
                    + '<td style="vertical-align: middle;">'+ cultivo[appData.uid]['humedad']['minimo'] +'%</td>'
                    + '<td style="vertical-align: middle;">'+ cultivo[appData.uid]['suelo']['maximo'] +'%</td>'
                    + '<td style="vertical-align: middle;">'+ cultivo[appData.uid]['suelo']['minimo'] +'%</td>'
                    + '<td style="vertical-align: middle;">'+ cultivo[appData.uid]['luz']['maximo'] +'%</td>'
                    + '<td style="vertical-align: middle;">'+ cultivo[appData.uid]['luz']['minimo'] +'%</td>'
                    + '<td style="vertical-align: middle;">'+ cultivo[appData.uid]['agua']['maximo'] +'%</td>'
                    + '<td style="vertical-align: middle;">'+ cultivo[appData.uid]['agua']['minimo'] +'%</td>'
                    + '<td style="vertical-align: middle;">'+ cultivo[appData.uid]['temperatura']['maximo'] +'°C</td>'
                    + '<td style="vertical-align: middle;">'+ cultivo[appData.uid]['temperatura']['minimo'] +'°C</td>'
                    + '<td style="vertical-align: middle;"><button type="button" class="btn btn-light btn-lg" data-toggle="modal" '
                    + 'data-target="#modalCrear" onclick="editaCultivo(\''
                    +  cultivo.producto          +'\' , \''
                    +  cultivo[appData.uid]['temperatura']['maximo'] +'\' , \'' + cultivo[appData.uid]['temperatura']['minimo'] +'\' , \''
                    +  cultivo[appData.uid]['humedad']['maximo']     +'\' , \'' + cultivo[appData.uid]['humedad']['minimo']     +'\' , \''
                    +  cultivo[appData.uid]['suelo']['maximo']       +'\' , \'' + cultivo[appData.uid]['suelo']['minimo']       +'\' , \''
                    +  cultivo[appData.uid]['agua']['maximo']        +'\' , \'' + cultivo[appData.uid]['agua']['minimo']        +'\' , \''
                    +  cultivo[appData.uid]['luz']['maximo']         +'\' , \'' + cultivo[appData.uid]['luz']['minimo']         +'\' , \''
                    + '\')"'
                    + '><i class="fas fa-edit"></i></button></td>'
                    + '<td style="vertical-align: middle;"><button type="button" class="btn btn-light btn-lg" data-toggle="modal" '
                    + 'data-target="#modalEliminar" onclick="eliminaCultivo(\''+  cultivo.producto +'\')"'
                    + '><i class="fas fa-trash-alt"></i></button></td>'
                    + '</tr>'
                );
            });
        }
        else{
            $( "#lista-vacia" ).show();
        }
    })
    .fail( function(){
        alert( "ERROR" );
    });
}

function subirArchivo(){
    var file = ($( "#modal-file" ))[0].files[0];

    if($( "#modal-file" ).val() == ""){
        alert( "Debe agregar un archivo .jpg|png " );
    }
    else{
        $( "#cargando" ).show();

        var storageRef = storage.ref('/cultivos/' + file.name);
        var uploadTask = storageRef.put(file);

        uploadTask.on('state_changed', function(snapshot){
    
        }, function(error){
            alert(error);
        }, function(){
            uploadTask.snapshot.ref.getDownloadURL()
                .then(function(downloadURL) {
                    $( "#modal-imageURL" ).val( downloadURL );
                    $( "#cargando" ).hide();
                });
        });
    }
}