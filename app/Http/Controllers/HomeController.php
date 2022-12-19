<?php

namespace App\Http\Controllers;


use App\Repositories\ServiceRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class HomeController extends Controller
{

    private ServiceRepository $serviceRepository;

    /**
     * @param ServiceRepository $serviceRepository
     */
    public function __construct(ServiceRepository $serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
    }


    /**
     * @return Application|Factory|View|RedirectResponse|Redirector
     */
    public function index(): Factory|View|Redirector|Application|RedirectResponse
    {
        $url = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

        if (str_contains($url, '?')) {
            return redirect('/', 301);
        }

        return view('web/home', [
            'title' => 'home',
            'services' => $this->serviceRepository->getAllItems()
        ]);
    }
}
