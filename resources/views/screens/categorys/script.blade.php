<script type="text/javascript">
    $(document).ready(function() {
        $('#nameCategory').blur(function() {
            let nameCategory = $(this).val();

            console.log(nameCategory)
            if (this.value) {
                $.ajax({
                        url: "/api/categorias/get/category/" + nameCategory,
                        type: 'GET',
                        dataType: 'json',
                        data: {
                            nameCategory: nameCategory
                        }
                    })
                    .done(function(result) {
                        if (result != null) {
                            $('#nameCategory').addClass("is-invalid");
                            $('#nameCategory_valido').removeClass("d-block").addClass("d-none");
                            $('#nameCategory_invalido').removeClass("d-none").addClass("d-block");
                        } else {
                            $('#nameCategory').removeClass("is-invalid"); //.addClass("is-valid")
                            $('#nameCategory_invalido').removeClass("d-block").addClass("d-none");
                        }
                    }).fail(function(e) {
                        console.log(e);
                    })
            }
        })
    });
</script>
