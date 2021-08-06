$( document ).ready( function(){
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
    var realtime    = firebase.database();

    realtime.ref("sensores/" + appData.uid + "/temperatura")                             
        .on('value', function(snap) {     
            $( "#tempActual" ).html( snap.val() + " °C");
        });

    /**PORCENTAJES*/
    realtime.ref("sensores/" + appData.uid)                             
         .on('value', function(snap) { 
            
            var suelo   = snap.val().suelo;
            var agua    = snap.val().agua;
            var luz     = snap.val().luz;
            var humedad = snap.val().humedad;

    /**GRÁFICA PROCENTAJES*/
            Highcharts.chart({
    
                chart: {
                    type: 'solidgauge',
                    height: '120%',
                    renderTo: 'porcentajes'
                },
            
                title: {
                    text: 'Niveles',
                    style: {
                        color: '#4AA96C'
                    }
                },
            
                tooltip: {
                    borderWidth: 0,
                    backgroundColor: 'none',
                    shadow: false,
                    style: {
                        fontSize: '12px'
                    },
                    valueSuffix: '%',
                    pointFormat: '{series.name}<br><span style="font-size:2em; color: {point.color}; font-weight: bold">{point.y}</span>',
                    positioner: function (labelWidth) {
                        return {
                            x: (this.chart.chartWidth - labelWidth) / 2,
                            y: (this.chart.plotHeight / 2) + 15
                        };
                    }
                },
            
                pane: {
                    startAngle: 0,
                    endAngle: 360,
                    background: [{ // Track for Move
                        outerRadius: '117%',
                        innerRadius: '97%',
                        backgroundColor: Highcharts.color("#FF005C")
                            .setOpacity(0.3)
                            .get(),
                        borderWidth: 0
                    }, { // Track for Move
                        outerRadius: '96%',
                        innerRadius: '76%',
                        backgroundColor: Highcharts.color("#7C83FD")
                            .setOpacity(0.3)
                            .get(),
                        borderWidth: 0
                    }, { // Track for Exercise
                        outerRadius: '75%',
                        innerRadius: '55%',
                        backgroundColor: Highcharts.color("#FFAA4C")
                            .setOpacity(0.3)
                            .get(),
                        borderWidth: 0
                    }, { // Track for Stand
                        outerRadius: '54%',
                        innerRadius: '34%',
                        backgroundColor: Highcharts.color("#96BAFF")
                            .setOpacity(0.3)
                            .get(),
                        borderWidth: 0
                    }]
                },
            
                yAxis: {
                    min: 0,
                    max: 100,
                    lineWidth: 0,
                    tickPositions: []
                },
            
                plotOptions: {
                    solidgauge: {
                        dataLabels: {
                            enabled: false
                        },
                        linecap: 'round',
                        stickyTracking: false,
                        rounded: true
                    }
                },
            
                series: [{
                    name: 'Humedad Suelo',
                    data: [{
                        color: "#FF005C",
                        radius: '117%',
                        innerRadius: '97%',
                        y: suelo 
                    }]
                }, {
                    name: 'Agua',
                    data: [{
                        color: "#7C83FD",
                        radius: '96%',
                        innerRadius: '76%',
                        y : agua   
                    }]
                }, {
                    name: 'Luz',
                    data: [{
                        color: "#FFAA4C",
                        radius: '75%',
                        innerRadius: '55%',
                        y: luz 
                    }]
                }, {
                    name: 'Humedad',
                    data: [{
                        color: "#96BAFF",
                        radius: '54%',
                        innerRadius: '34%',
                        y: humedad
                    }]
                }]
            });
        });

    realtime.ref("sensores/" + appData.uid + "/data")                             
    .on('value', function(snap) { 

    /**GRÁFICA TEMPERATURAS */
        Highcharts.chart({
            chart: {
                type: 'line',
                renderTo: 'temperatura'
            },
            title: {
                text: ''
            },
            xAxis: {
                categories: ['02:00', '04:00', '06:00', '08:00', '10:00', '12:00', '14:00', '16:00', '18:00', '20:00', '22:00', '24:00']
            },
            yAxis: {
                title: {
                    text: 'Temperature (°C)'
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: false
                }
            },
            series: [{
                color: "#4AA96C",
                name: 'Temperatura Ambiente',
                data: snap.val()
            }]
        });

    });


    /**DATE*/

    var time = new Date();

    if( time.getHours() >= 0 && time.getHours() <= 12){
        $( "#saludo" ).html( "¡Buenos días!" );
    }
    if( time.getHours() >= 13 && time.getHours() <= 20 ){
        $( "#saludo" ).html( "¡Buenas tardes!" );
    }
    if( time.getHours() >= 21 ){
        $( "#saludo" ).html( "¡Buenas noches!" );
    }

    var date = new Date();

    var mes = date.getMonth() + 1;
    $( "#fechaActual" ).html( date.getDate() + '/' + mes + '/' + date.getFullYear() );


    /**VERIFICACIÓN DEL ESTADO DEL MÓDULO */
    $( "#estado" ).html("");
    $( "#estado" ).css( "color", "gray" );
    $( "#estado" ).append(
        '<i class="fas fa-spinner fa-pulse fa-2x"></i>'
    );

    $.ajax({
        "url"       : appData.base_url + "/verificamodulo",
        "dataType"  : "json",
        "type"      : "post",
        "data"      : {
            "uid"       : appData.uid
        }
    })
    .done( function( json ){
        if( json.response != "nulo"){
            $( "#estado" ).html( "CONECTADO" );
            $( "#estado" ).css( "color", "green" );
        }
        else{
            $( "#estado" ).html( "DESCONECTADO" );
            $( "#estado" ).css( "color", "red" );
        }
    })
    .fail( function(){
        alert( "ERROR" );
        $( "#estado" ).html( "DESCONECTADO" );
        $( "#estado" ).css( "color", "red" );
    });

  
    /**ACTUALIZACIÓN DEL ID DE MÓDULO */  
    $( "#btn-modulo" ).click( function(){

        if( $( "#idModulo" ).val() == "" ){
            error_formulario( "idModulo", "Ingrese el ID se su módulo");
            return false;
        }

        $( "#estado" ).html("");
        $( "#estado" ).css( "color", "gray" );
        $( "#estado" ).append(
            '<i class="fas fa-spinner fa-pulse fa-2x"></i>'
        );

        $.ajax({
            "url"       : appData.base_url + "/agregamodulo",
            "dataType"  : "json",
            "type"      : "post",
            "data"      : {
                "uid"       : appData.uid,
                "modulo"    : $( "#idModulo" ).val()
            }
        })
        .done( function( json ){
            if( json.response == true){
                $( "#estado" ).html( "CONECTADO" );
                $( "#estado" ).css( "color", "green" );
            }
            else{
                $( "#modalMensaje" ).modal( "show" );
                $( "#modalMensajeBody" ).html( "Ocurrió un error, inténtelo más tarde" );
                $( "#estado" ).html( "DESCONECTADO" );
                $( "#estado" ).css( "color", "red" );
            }
        })
        .fail( function(){
            $( "#modalMensaje" ).modal( "show" );
            $( "#modalMensajeBody" ).html( "Ocurrió un error, inténtelo más tarde" );
            $( "#estado" ).html( "DESCONECTADO" );
            $( "#estado" ).css( "color", "red" );
        });

        return true;
    });
});
