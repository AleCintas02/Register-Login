$(document).ready(function () {
    // Agregar un método de validación personalizado para verificar que la contraseña contenga al menos 4 letras, una de ellas mayúscula
    $.validator.addMethod(
        "passwordFormat",
        function (value, element) {
            return /[A-Z].*[a-zA-Z].*[a-zA-Z].*[a-zA-Z]/.test(value); // Al menos una mayúscula y 3 letras
        },
        "La contraseña debe contener al menos una mayúscula y como mínimo 4 letras"
    );

    $("#formulario").validate({
        errorClass: "error-message",
        rules: {
            name: "required",
            last_name: "required",
            email: {
                required: true,
                email: true,
            },
            password: {
                required: true,
                minlength: 8, // Mínimo 8 caracteres
                passwordFormat: true, // Utiliza la regla de
            },
            password_confirmation: {
                required: true,
                equalTo: "#password",
            },
            politicas: {
                required: true,
            },
        },
        messages: {
            name: "Por favor ingrese su nombre",
            last_name: "Por favor ingrese su apellido",
            email: {
                required: "Por favor ingrese su correo electrónico",
                email: "Por favor ingrese un correo electrónico válido",
            },
            password: {
                required: "Por favor ingrese su contraseña",
                minlength: "La contraseña debe tener como mínimo 8 caracteres",
            },
            password_confirmation: {
                required: "Por favor confirme su contraseña",
                equalTo: "Las contraseñas no coinciden",
            },
            politicas: {
                required: "Debes aceptar las políticas de privacidad para continuar.",
            },
        },
        errorPlacement: function(error, element) {
            if (element.attr("name") == "politicas") {
                error.insertAfter(element.parent().parent()); // Colocar el mensaje de error después del checkbox de políticas
                error.addClass("error");
            } else {
                error.insertAfter(element); // Usar la ubicación de error predeterminada para otros campos
            }
        },
        submitHandler: function (form) {
            form.submit();
        },
    });

});
