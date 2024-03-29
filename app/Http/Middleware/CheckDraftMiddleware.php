<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Story;

class CheckDraftMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $routeName = $request->route()->getName();
        $routeParams = $request->route()->parameters();


        if ($routeName == 'stories.show' && isset($routeParams['story'])) {

            return $next($request);
        }


        $storyId = $request->route('story');
        $story = Story::findOrFail($storyId);

        if ($story->status != 'DRAFT') {
            return redirect()->route('stories.index')->with('error', 'You are not allowed to edit after submit.');
        }

        return $next($request);
    }
}
