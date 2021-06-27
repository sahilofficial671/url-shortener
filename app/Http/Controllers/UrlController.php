<?php

namespace App\Http\Controllers;

use App\Models\Analytic;
use App\Models\Url;
use Illuminate\Http\Request;
use Log;

class UrlController extends Controller
{
    /**
     *  This will validate and submit new url for aliasing.
     *
     *  @param Request $request
     *  @param mixed
     */
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'url' => 'required|url',
            'max_hits' => 'required|integer',
        ]);

        $url = parse_url($request->url);

        $model = Url::create([
            'protocol'   => $url['scheme'],
            'domain'     => $url['host'],
            'path'       => $url['path'],
            'query'      => $url['query'] ?? null,
            'max_hits'   => $request->max_hits,
            'hits'       => 0,
            'alias'      => $this->generateAlias(),
            'created_by' => Auth::id(),
            'status'     => true,
        ]);

        return back()->with([
            'success'    => 'Succefully Hashed!',
            'actualUrl'  => $model->getFullUrl(),
            'aliasedUrl' => $model->getAliasedUrl(),
        ]);
    }

    /**
     *  This will fetch and redirect as per given aliased url.
     *
     *  @param  Request $request
     *  @param  string  $alias
     *  @return \Symfony\Component\HttpKernel\Exception\HttpException|\Illuminate\Http\RedirectResponse
     */
    public function get(Request $request, string $alias)
    {
        $url = URL::where('alias', $alias)->firstOrFail();

        if ($url->isHitAllowed()) {
            $url->increment('hits');

            return $url->redirectToFullUrl();
        }

        return abort(403);
    }

    /**
     *  This generate alias for full url and also check for duplicates.
     *  @return string
     */
    public function generateAlias()
    {
        $alias = substr(md5(time()), 0, 6);

        if (Url::byAlias($alias)->get()->isNotEmpty()) {
            $this->generateAlias();
        }

        return $alias;
    }
}
