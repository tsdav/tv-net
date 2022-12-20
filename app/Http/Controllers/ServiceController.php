<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Repositories\ServiceRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class ServiceController extends Controller
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
        return view('web/services', [
            'title' => 'service',
            'services' => $this->serviceRepository->getAllItems()
        ]);
    }
}
