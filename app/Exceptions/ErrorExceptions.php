<?php

namespace App\Exceptions;

use Exception;

class ErrorExceptions extends Exception
{
    // construtor da minha exception -> exemplo de uso: throw new MinhaException('meu_erro');
    public function __construct($message)
    {
        parent::__construct($message, 0, null);
    }

    // retorna a mensagem da exception em pergutues
    public static function menssage_BR($exception)
    {

        $erro = $exception->getMessage();

        // array om os retornos das exceptions em portugues
        $exceptions = [
            'Division by zero' => 'Não existe divisão por zero',
            'Unknown database' => 'Banco de dados desconhecido',
            'Access denied' => 'Acesso negado',
            'Base table or view not found' => 'Tabela base ou visualização não encontrada',
            'Column not found' => 'Coluna não encontrada',
            'cannot be null' => 'Preencher os campos que são obrigatórios',
            'Call to undefined method' => 'Chamada para algum método indefinido',
            'Undefined variable' => 'Alguma variável não foi definida',
            'Integrity constraint violation' => 'Violação de restrição ou duplicidade de dados no banco',
            'Invalid datetime format' => 'Algum formato de campo está inválido',
            "doesn't have a default value" => 'Existe campo que não possui um valor padrão',
            'Data truncated for column' => 'Dados truncado ou em formato inválido na coluna do banco',
            'Connection refused' => 'Erro de conexão com o banco de dados',
            'Data too long for column' => 'Existe algum campo com informações longas',
            'Creating default object from empty value' => 'Erro no backend: Definindo atributo em objeto nao definido',
            'The file "" does not exist' => 'O arquivo não existe, favor verificar as configurações de upload no servidor',
            'No such file or directory' => 'Está faltando um arquivo ou diretório no servidor',
            'JPEG library reports unrecoverable error' => 'A imagem não é um arquivo JPEG válido',
            'Numeric value out of range' => 'valor numérico fora do intervalo estipulado em banco',
            'Non-static method' => 'Método não estático chamado',
        ];

        // percorre o array em busca da exception recebida para setar o retorno em portugues
        foreach ($exceptions as $erro_en => $erro_pt) {
            if (strpos($erro, $erro_en) !== false) {
                $erro = $erro_pt;
            }
        }

        return $erro;
    }
}
