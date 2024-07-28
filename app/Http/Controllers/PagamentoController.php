<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class PagamentoController extends Controller
{
    public function gerarToken(Request $request)
    {
        // Gerar um UUID como token de pagamento
        $token = Uuid::uuid4()->toString();

        // Aqui você pode salvar o token no banco de dados com informações adicionais,
        // como ID do produto, ID do usuário, etc.

        return response()->json([
            'payment_token' => $token,
            'expires_in' => 3600 // Tempo de expiração em segundos
        ]);
    }
}
