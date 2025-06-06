<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

// class AuthorizeUser
// {
//     /**
//      * Handle an incoming request.
//      *
//      * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
//      */
//     public function handle(Request $request, Closure $next, $role = ''): Response
//     {
//         $user = $request->user(); // ambil data user yg login
//         // fungsi user() diambil dari UserModel.php
//         if ($user->hasRole($role)) { // cek apakah user punya role yg diinginkan
//             return $next($request);
//         }

//         // jika tidak punya role, maka tampilkan error 403
//         abort(403, 'Forbidden. Kamu tidak punya akses ke halaman ini');
//     }
// }

class AuthorizeUser {
 public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $allowedRoles = [];
        foreach ($roles as $role) {
            $allowedRoles = array_merge($allowedRoles, explode(',', $role));
        }

        $userRole = $request->user()->getRole(); // Misalnya: "MNG", "STF", dll

        if (in_array($userRole, $allowedRoles)) {
            return $next($request);
        }

        abort(code: 403, message: 'Forbidden. Kamu tidak mempunyai akses ke halaman ini');
    }

}