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
    });
</script>
