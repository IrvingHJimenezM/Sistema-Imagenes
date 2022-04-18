var tipoComentario=0;
var Tc=0;
var VarOper=0;
$('document').ready(function () {

    
    $('#ComentarioLLegada').click( function() {
       tipoComentario = 1;
       Tc=1;
       Accion=3;
       var IdCaja=$('#ValorId').val();
       var parametros={"TipoComentario":Tc,"IdCaja":IdCaja,"Accion":Accion}
       $.ajax({
           url:'/Sistema Imagenes/php/Comentario.php',
           type:"POST",
           data:parametros,
           sucess: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            $("#Modal_de_Comentarios .modal-body h3").text(response);
           }
       });

    });

    $('#ComentarioLLegada2').click( function() {
        tipoComentario = 2;
        Tc=2;
     });

     $('#ComentarioDescargada').click( function() {
        tipoComentario = 3;
        Tc=3;
     });
     $('#ComentarioDescargada2').click( function() {
        tipoComentario = 4;
        Tc=4;
     });
     $('#ComentarioCargada').click( function() {
        tipoComentario = 5;
        Tc=5;
     });
     $('#ComentarioCargada2').click( function() {
        tipoComentario = 6;
        Tc=6;
     });
     $('#ComentarioSello').click( function() {
        tipoComentario = 7;
        Tc=7;
     });
     $('#ComentarioSello2').click( function() {
        tipoComentario = 8;
        Tc=8;
     });

     $('#FotoLLegada').click( function() {
        VarOper=1;
     });
     $('#FotoLLegada2').click( function() {
        VarOper=2;
     });
     $('#FotoDescargada').click( function() {
        VarOper=3;
     });
     $('#FotoDescargada2').click( function() {
        VarOper=4;
     });
     $('#FotoCargada').click( function() {
        VarOper=5;
     });
     $('#FotoCargada2').click( function() {
        VarOper=6;
     });
     $('#FotoSello').click( function() {
        VarOper=7;
     });
     $('#FotoSello2').click( function() {
        VarOper=8;
     });

    $('#GuardarComentario').click( function() {
        
        var Comentario=$('#MdComentario').val();
        var IdCaja=$('#ValorId').val();
        if (Comentario =="") {
            alert("Falto Escribir Comentario");
        }
         else 
        {
            accion=1;
            $.post('/Sistema Imagenes/php/Comentario.php',
                {TC:tipoComentario,Coment:Comentario,ValorIdCaja:IdCaja,Accion:accion},
                alert("Comentario Guardado Correctamente")
            );
            $("#Modal_de_Comentarios").modal("hide");
            $('#TablaCaja').load("/Sistema Imagenes/Agregar.php");
        }
       
    });
    $('#EliminarComentario').click( function() {
        var IdCaja=$('#ValorId').val();
        accion=2;
        if (confirm('¿Desea Borrar el Comentario?')) {
            $.post('/Sistema Imagenes/php/Comentario.php',
            {TC:tipoComentario,ValorIdCaja:IdCaja,Accion:accion},
                alert("Comentario Borrado")
           );
          
        }
         else 
        {
            alert("Comentario No Borrado");
        }
        $("#Modal_de_Comentarios").modal("hide");
        location.reload();
        
       
    });
    $('#BtnGuardarFotografia').click( function() {
        
        var Foto=$('#camera').val();
        var IdCaja=$('#ValorId').val();
        var Usuario=$('#ValorUser').val();
        if (Foto =="") {
            alert("Fotografia NO Capturada");
        }
         else 
        {
            console.log(Foto);
            $.post('/Sistema Imagenes/php/Fotografia.php',
                {Fotografia:Foto,ValorIdCaja:IdCaja,VOper:VarOper,User:Usuario},
                alert("Fotografia Guardada Correctamente")
                
            );
            $("#Modal_de_Fotografia").modal("hide");
            location.reload();
           
            
        }
       
    });

    


});