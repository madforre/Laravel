<?php

namespace App\Http\Middleware;

use Closure;

class CanAccessArticle
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
        // CURL 커맨드 등을 이용하여 직접 Route 에 접근하는 것을 
        // 막아야 한다. 이를 위해 Route 미들웨어를 만들고, 
        // app/Http/Kernel.php 에 Route 미들웨어라고 등록할 것이다.
        $user = $request->user();
        $articleId = $request->route('articles');

        if (! \App\Article::where('id',$articleId)->where('author_id',$user->id)->exists() and ! $user->isAdmin()) {
            flash()->error(trans('errors.forbidden') . ' : ' . trans('errors.forbidden_description'));

            return back();
        }
        return $next($request);
    }
}
