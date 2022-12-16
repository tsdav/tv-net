<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class AboutController extends Controller
{
    /**
     * @return Application|Factory|View|RedirectResponse|Redirector
     */
    public function index(): Factory|View|Redirector|Application|RedirectResponse
    {
        return view('web/about', [
            'title' => 'Մեր մասին'
        ]);
    }
}
