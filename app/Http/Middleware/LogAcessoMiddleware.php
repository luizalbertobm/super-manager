<?php

namespace App\Http\Middleware;

use App\LogAccess;
use App\LogAcesso;
use Closure;

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
        // dd($request);
        $ip =$request->server->get('REMOTE_ADDR');
        $rota =$request->getRequestUri();
        LogAccess::create(['log'=>"IP $ip requisitou a rota $rota"]);

        // return $next($request);

        $resposta = $next($request);
        $resposta->setStatusCode(201, 'Status da resposta modificado');

        return $resposta;
        // dd($resposta);
    }
}
