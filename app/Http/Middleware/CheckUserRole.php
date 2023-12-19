<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\DB;
use Closure;

class CheckUserRole
{
public function handle($request, Closure $next)
{
    $user = $this->customAuthenticationLogic();
  if (!$user) {
            // User is not authenticated, redirect to login
            return redirect('login');
        }
    if ($user && $user->role_Id === 1) {
        // Admins have access to all pages
        return $next($request);
    } elseif ($user && $user->role_Id === 2) {
        // Agents can access the 'AddTask' and 'Task' routes
        if ($request->routeIs('AddTask') || $request->routeIs('Task') || $request->routeIs('TaskEarning')|| $request->routeIs('StoreTask')||$request->routeIs('EditTask') ||$request->routeIs('UpdateTask') ||$request->routeIs('DeleteTask') ||$request->routeIs('DeleteUploadTask')||$request->routeIs('approvedTask')) {
            return $next($request);
        } else {
            return redirect('access');
        }
    } elseif ($user && $user->role_id === 3) {
        // Normal users have no access to any page
        return redirect('access');
    }


    return abort(401, 'Unauthorized');
}
     private function customAuthenticationLogic()
    {
        // Implement your custom authentication logic here using your DB queries
        // For example:

        $email = session('Email');

        // Query your database to authenticate the user
        $user = DB::table('users')
            ->where('Email', $email)
            ->first();

        return $user;
    }
}

