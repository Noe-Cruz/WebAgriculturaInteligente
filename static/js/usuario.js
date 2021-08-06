$( document ).ready( function(){

    /**OBTENCIÓN DE USERNAME*/
    $.ajax({
        "url"       : appData.base_url + "/getusuario",
        "dataType"  : "json"
    })
    .done( function( json ){
        if( json.nombre != "" ){
            $( "#infoUser" ).html( appData.correo + "<br/>" + json.nombre );
        }
    })
    .fail( function(){
        alert( "ERROR" );
    });
});