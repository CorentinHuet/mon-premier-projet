<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckContact
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->mail == '' or $request->titre == '' or $request->texte == '') {
            return redirect()->back()->with('error', 'Votre demande n\'a pas été prise en compte.');
        } else {
            return redirect()->back()->with('success', 'Votre demande a bien été prise en compte.');
        }

        return $next($request);
    }
}
