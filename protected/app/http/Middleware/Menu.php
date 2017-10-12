<?php

namespace App\Http\Middleware;

use Closure;

class Menu
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $menu_id)
    {
        $akses = new \App\CekAkses();
        if ($akses->get($menu_id) != true) {
            return redirect('home');
        }        
        return $next($request);
    }
}
