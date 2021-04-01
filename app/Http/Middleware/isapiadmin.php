<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class isapiadmin
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
        if(isset($request->access_token) &&$request->access_token!=null )
        {
            $user=User::where('access_toke',$request->access_token)
                ->where('is_admin',1)->first();
            if($user)
                return $next($request);
        }
        
        return response()->json(['error'=>'dont have permission']);
    }

}
