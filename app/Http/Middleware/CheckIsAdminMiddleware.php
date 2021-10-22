<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckIsAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
       // dd('Estou aqui');
       $user = auth()->user(); // pega o usuario autenticado

       //permite que somente esses e-mails tenham acesso aos produtos
       if(!in_array($user->email, ['jackson.costabezerra@gmail.com', 'meta.collins@example.com'])) {
           return redirect('/');
       }

        return $next($request);
    }
}
