<?php

namespace App\Traits;

trait HasRedirections{

    /**
     *  Return Full URL.
     *  @return \Illuminate\Http\RedirectResponse
     */
    public function redirectToFullUrl()
    {
        return redirect()->to($this->getFullUrl());
    }
}
