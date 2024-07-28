<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    protected $except = [
        '/compra/detalhes',  // Certifique-se de que a URL está correta e corresponde exatamente à sua rota
        '/compra/pagar'
    ];


}
