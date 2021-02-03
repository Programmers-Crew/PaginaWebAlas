$(document).ready(function(){
      var precio = $('#precio');
      var  precioSel = $('#precioSel');

      
      $('#puntoFinal').change(function(){
          var puntoFinal_id = $(this).val(); 
          var puntoInicio_id = $('#puntoInicio').val();
        if(puntoFinal_id !== ''){ 
          $.ajax({
            data: {puntoFinal_id,puntoInicio_id}, 
            dataType: 'html', 
            type: 'POST', 
            url: 'index.php?a=llenarPrecio' 
          }).done(function(data){ 

              precio.html(data); 
          });
          

        }   
      });


    });

    $(document).ready(function(){
      var puntoFinal = $('#puntoFinal');
      var puntoFinalSel = $('#puntoFinalSel');

      
      $('#puntoInicio').change(function(){
        var puntoInicio_id = $(this).val(); 

        if(puntoInicio_id !== ''){ 
          $.ajax({
            data: {puntoInicio_id:puntoInicio_id}, //variables o parametros a enviar, formato => nombre_de_variable:contenido
            dataType: 'html', //tipo de datos que esperamos de regreso
            type: 'POST', //mandar variables como post o get
            url: 'index.php?a=llenarPuntoFinal' //url que recibe las variables
          }).done(function(data){ //metodo que se ejecuta cuando ajax ha completado su ejecucion             

              puntoFinal.html(data); 
          });

        }   
      });

    });

    $(".motoVistas").bind("webkitAnimationEnd mozAnimationEnd animationEnd", function(){
      $(this).removeClass("animationxs")  
      
      
  })

  $(".motoVistas").hover(function(){
      $(this).addClass("animationxs");        
      
  });
  $(".moto").bind("webkitAnimationEnd mozAnimationEnd animationEnd", function(){
    $(this).removeClass("animationx")  
    
    
})

$(".moto").hover(function(){
    $(this).addClass("animationx");        
    
});

var fichero = document.getElementById("fichero");
var texto = document.getElementById("texto");

fichero.onchange = function () {
    texto.innerHTML = fichero.files[0].name;
};