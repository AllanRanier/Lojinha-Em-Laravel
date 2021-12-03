<script type="text/javascript">
    $(document).ready(function() {
        $('#email').blur(function() {
            let email = $(this).val();
            if (this.value) {
                $.ajax({
                        url: "/api/clientes/get/email/" + email,
                        type: 'GET',
                        dataType: 'json',
                        data: {
                            email: email
                        }
                    })
                    .done(function(result) {
                        if (result != null) {
                            $('#email').addClass("is-invalid");
                            $('#email_valido').removeClass("d-block").addClass("d-none");
                            $('#email_invalido').removeClass("d-none").addClass("d-block");
                        } else {
                            $('#email').removeClass("is-invalid"); //.addClass("is-valid")
                            $('#email_invalido').removeClass("d-block").addClass("d-none");
                        }
                    }).fail(function(e) {
                        console.log(e);
                    })
            }
        })

        $('#username').blur(function() {
            let username = $(this).val();
            if (this.value) {
                $.ajax({
                        url: "/api/usuarios/get/username/" + username,
                        type: 'GET',
                        dataType: 'json',
                        data: {
                            username: username
                        }
                    })
                    .done(function(result) {
                        if (result != null) {
                            console.log('aqui é invalido')
                            $('#username').addClass("is-invalid");
                            $('#username_valido').removeClass("d-block").addClass("d-none");
                            $('#username_invalido').removeClass("d-none").addClass("d-block");
                        } else {
                            $('#username').removeClass("is-invalid"); //.addClass("is-valid")
                            $('#username_invalido').removeClass("d-block").addClass("d-none");
                        }
                    }).fail(function(e) {
                        console.log(e);
                    })
            }
        })
    });
</script>
