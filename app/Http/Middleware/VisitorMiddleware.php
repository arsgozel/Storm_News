<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\UserAgent;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Jenssegers\Agent\Agent;
use Symfony\Component\HttpFoundation\Response;

class VisitorMiddleware
{

    public function handle(Request $request, Closure $next)
    {
        $requestUserAgent = $request->header('User-Agent');
        $requestIpAddress = $request->ip();

        $agent = new Agent();
        $agent->setUserAgent($requestUserAgent);
        $browser = $agent->browser();
        $platform = $agent->platform();
        $userAgent = UserAgent::firstOrCreate([
            'browser_login' => $agent->browser() ?: null,
            'browser_version' => $agent->version($browser) ?: null,
            'device_login' => $agent->platform() ?: null,
            'device_version' => $agent->version($platform) ?: null,
        ]);

        $visitor = Visitor::firstOrCreate([
            'user_agent_id' => $userAgent->id,
            'ip_address' => $requestIpAddress,
        ]);
        $visitor->requests += 1;
        $visitor->update();

        return $next($request);
    }
}
