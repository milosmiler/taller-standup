$('form').parsley();

$(document).ready(function(){

	$('.form-index').submit(function(e){
        e.preventDefault();
        var nombre = $("input[name$='nombre']").val();
        var email = $("input[name$='email']").val();
        var telefono = $("input[name$='telefono']").val();
        var cursos = $(".input-select").val();
        //alert(nombre+" "+email+" "+telefono+" "+cursos);
        $.ajax({
            type: "POST",
            url: "php/register.php",
            data: {nombre:nombre, email:email, telefono: telefono, curso:cursos},
            dataType: "JSON",
            success: function(data) {
              if(data.succesfull == true){
               	  $('.overlay').css('display','block');
                  $("input[name$='nombre']").val('');
                  $("input[name$='email']").val('');
                  $("input[name$='telefono']").val('');
                  $(".input-select").val('');
              }else{
                  $('.overlay').css('display','block');
                  $('.popup').html('<p>ALGO HA SALIDO MAL PORFAVOR INTENTALO DE NUEVO MAS TARDE</p>')
                  $("input[name$='nombre']").val('');
                  $("input[name$='email']").val('');
                  $("input[name$='telefono']").val('');
                  $(".input-select").val('');
              }
            },
            error: function(err) {
            console.log('algo mal');
            alert(err);
            }
        });
    });

     var numeros = /[0-9]/;
     var letras = /^[a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ_\s]+$/;
    
    $(document).on('keypress', '.number', function (e){
        tecla = (document.all) ? e.keyCode : e.which; 
        if (tecla==8){
        return true;
        }
         tecla = String.fromCharCode(e.keyCode);
         if(numeros.test(tecla)){
         }else{
             e.preventDefault();
             
         }
      });
    
    $(document).on('keypress', '.letras', function(e){
        tecla = (document.all) ? e.keyCode : e.which; 
        if (tecla==8){
        return true;
        }
        tecla = String.fromCharCode(e.keyCode);
         if(letras.test(tecla)){    
         }else{
             e.preventDefault();
             
         }
    });

    var correo = /^[a-zA-Z0-9\._-]+@[a-zA-Z0-9-]{2,}[.][a-zA-Z]{2,4}$/; 

    $(document).on('keypress', '.email', function(e){
       
        tecla = (document.all) ? e.keyCode : e.which; 
        if (tecla==8){
        $(this).removeClass('valid');
        return true;
        }
        
        if (tecla==13){
            return true;
          if(email.test(this.value)){
           $(this).addClass('valid');
          }else{
           $(this).removeClass('valid');
          }
        
        }
        
         if(correo.test(this.value)){
           $(this).addClass('valid');
         }else{   
           $(this).removeClass('valid');
         }

        validate();
    });


    $('.email').change(function() {


        if(correo.test(this.value)){
           $(this).addClass('valid');
         }else{   
           $(this).removeClass('valid'); 
         }

         validate();
    });


    $(document).on('keypress', '.vali', function(e){

        tecla = (document.all) ? e.keyCode : e.which; 
        if (tecla==8){
        $(this).removeClass('valid');
        return true;
        }
        
        if($(this).val().length >= 5){
            $(this).addClass('valid');
        }else{
            $(this).removeClass('valid');
        }

        validate();
    });

    $('.vali').change(function() {
        
        if($(this).val().length >= 5){
            $(this).addClass('valid');
        }else{
            $(this).removeClass('valid');
        }

         validate();
    })

    $(document).on('keypress', '.cel', function(e){
        
        tecla = (document.all) ? e.keyCode : e.which; 
        if (tecla==8){
        $(this).removeClass('valid');
        return true;
        }
        
        if($(this).val().length == 10){
            $(this).addClass('valid');
            e.preventDefault();
        }else{
            $(this).removeClass('valid');
        }
        validate();
    });
    
    $('.cel').change(function() {

        
        
        if($(this).val().length == 10){
            $(this).addClass('valid');
        }else{
            $(this).removeClass('valid');
        }
        validate();
    });


    function validate(){
        var status = true;
        $('.registro div div input').each(function(){
            if(!$(this).hasClass('valid')){
                status= false;
            }
        });
        
        if(status == true){
          $('.enviar').removeClass('disabled');
          $('.enviar').addClass('active');
        }else{
          $('.enviar').addClass('disabled');
          $('.enviar').removeClass('active');
        }
    }

});