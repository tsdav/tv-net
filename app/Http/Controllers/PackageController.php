<?php

namespace App\Http\Controllers;

use App\Repositories\PackageRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
class PackageController extends Controller
{

    private PackageRepository $packageRepository;

    /**
     * @param PackageRepository $packageRepository
     */
    public function __construct(PackageRepository $packageRepository)
    {
        $this->packageRepository = $packageRepository;
    }


    /**
     * @return Application|Factory|View|RedirectResponse|Redirector
     */
    public function index(): Factory|View|Redirector|Application|RedirectResponse
    {
        $packages = $this->packageRepository->getAllItems();
        return view('web/packages', [
            'title' => 'package',
            'packages' => $packages
        ]);
    }
}
