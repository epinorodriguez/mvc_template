$(document).ready(function(){



	console.log('js usuario');



	$('#form_iniciar_sesion').bootstrapValidator({
        message: 'Este valor no es valido',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            rut: {
                validators: {
                    id: {
                        country: 'CL',
                        message: 'Rut invalido! debe tener este formato: 11111111-1'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'El apellido paterno es obligatorio'
                    }
                }
            }
        }
    }).on('success.form.bv', function(e) {
            // Prevent submit form
            e.preventDefault();

            var form     = $(e.target),
                validator = form.data('bootstrapValidator');
            
            console.log(form.serialize());

            $.ajax( {
			      type: "POST",
			      url: '/mvc_template/usuario/iniciar',
			      data: form.serialize(),
			      success: function( response ) {
			        console.log( response );
			      }
			});

        });

});