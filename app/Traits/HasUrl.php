<?php

namespace App\Traits;

trait HasUrl
{
    /**
     *  Return Full URL.
     *  @return string
     */
    public function getFullUrl()
    {
        $url = sprintf('%s://%s%s', $this->protocol, $this->domain, $this->path);

        if ($this->hasQuery()) {
            $url = $url.'?'.$this->query;
        }

        return $url;
    }

    /**
     *  Return Aliased URL.
     *  @return string
     */
    public function getAliasedUrl()
    {
        return sprintf('%s/u/%s', config('app.url'), $this->alias);
    }

    /**
     *  If user can use the url.
     *  @return bool
     */
    public function isHitAllowed()
    {
        return $this->max_hits > $this->hits;
    }

    /**
     *  Checks if query string.
     *  @return bool
     */
    public function hasQuery()
    {
        return isset($this->query);
    }

    /**
     *  Return Full URL.
     *  @return \Illuminate\Http\RedirectResponse
     */
    public function redirectToFullUrl()
    {
        return redirect()->to($this->getFullUrl());
    }
}
