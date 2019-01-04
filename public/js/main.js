$('form').parsley();

$(document).ready(function(){


	$('.form-index').submit(function(e){
        e.preventDefault();
        var nombre = $("input[name$='nombre']").val();
        var email = $("input[name$='email']").val();
        var telefono = $("input[name$='telefono']").val();
        var cursos = $(".input-select").val();
        // alert(nombre+" "+email+" "+telefono+" "+cursos);
        $.ajax({
            type: "POST",
            url: "php/register.php",
            data: {nombre:nombre, email:email, telefono: telefono, curso:cursos},
            dataType: "JSON",
            success: function(data) {
              if(data.succesfull == true){
               	  
                  $("input[name$='nombre']").val('');
                  $("input[name$='email']").val('');
                  $("input[name$='telefono']").val('');
                  $(".input-select").val('');
                  alert('datos enviados correctamente');
              }else{

                  $("input[name$='nombre']").val('');
                  $("input[name$='email']").val('');
                  $("input[name$='telefono']").val('');
                  $(".input-select").val('');
                  alert('algo ha salido mal');
              }
            },
            error: function(err) {
            alert(err);
            }
        });
    });


});