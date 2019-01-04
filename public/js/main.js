$('form').parsley();

$(document).ready(function(){


	$('.form-index').submit(function(e){
        e.preventDefault();
        var nombre = $("input[name$='nombre']").val();
        var email = $("input[name$='email']").val();
        var telefono = $("input[name$='telefono']").val();
        var cursos = $(".input-select").val();
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
            alert(err);
            }
        });
    });


});