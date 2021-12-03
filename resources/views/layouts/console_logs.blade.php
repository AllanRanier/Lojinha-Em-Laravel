@if(@$errors->getMessages()['message_exception'][0])
<script type="text/javascript">
// detalha no console do navegador o erro retornado do backend, substituindo caracteres invalidos
var errors = "Erro do Controlador Laravel: {{ @$errors->getMessages()['message_exception'][0] }}".replaceAll('&#039;', "'");
console.log(errors);
</script>
@endif




