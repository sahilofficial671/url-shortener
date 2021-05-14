<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Url;
use App\Models\Analytic;
use Log;

class UrlController extends Controller
{
    /**
     *  This will validate and submit new url for aliasing
     *
     *  @param Request $request
     *  @param mixed
     */
    public function submit(Request $request)
    {
        try {
            $validated = $request->validate([
                'url' => 'required|url',
                'max_hits' => 'required|integer',
            ]);

            $url = parse_url($request->url);

            $model = Url::create([
                'protocol' => $url['scheme'],
                'domain' => $url['host'],
                'path' => $url['path'],
                'query' => isset($url['query']) ? $url['query'] : null,
                'max_hits' => $request->max_hits,
                'hits' => 0,
                'alias' => $this->generateAlias(),
                'status' => true
            ]);

            return back()->with([
                'success' => 'Succefully Hashed!',
                'actualUrl' => $model->getFullUrl(),
                'aliasedUrl' => $model->getAliasedUrl(),
            ]);
        } catch (\Exception $e) {
            Log::error(sprintf('Something went wrong in: %s, Message: . %s, Line: %s %s, Request: %s', self::class, $e->getMessage(), $e->getLine(), $e->getFile(), json_encode($request->all())));
            return back()->with(['error' => 'Something went wrong!',]);
        }

    }

    /**
     *  This will fetch and redirect as per given aliased url
     *
     *  @param Request $request
     *  @param string $alias
     *  @return \Symfony\Component\HttpKernel\Exception\HttpException|\Illuminate\Http\RedirectResponse
     */
    public function get(Request $request, String $alias)
    {
        $url = URL::where('alias', $alias)->firstOrFail();

        // If allowed to hit
        if($url->max_hits > $url->hits){
            $url->update([
                'hits' => $url->hits + 1
            ]);

            return $url->redirectToFullUrl();
        }

        return abort(404);
    }

    /**
     *  This generate alias for full url and also check for duplicates.
     *  @return string
     */
    public function generateAlias()
    {
        $alias = substr(md5(time()), 0, 6);

        if(Url::byAlias('$alias')->get()->count()){
            $this->generateAlias();
        }

        return $alias;
    }
}
