<?php

namespace App\Http\Middleware;

use Closure;
use App\LogAcesso;

class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //$request - manipular
        //return $next($request);
        //response - manipular
        
        $ip = $request->server->get('REMOTE_ADDR');
        $rota = $request->getRequestUri();
        LogAcesso::create(['log' => "IP $ip requisitou a rota $rota"]);

        //return $next($request);
        //return Response('Chegamos no middleware e finilizamos no próprio middleware');
        $resposta = $next($request);

        $resposta->setStatusCode(201, "O status da resposta e o texto da resposta foram modificados!!");
        return $resposta;
    }
}
