<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Interfaces\AdminRepositoryInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    private AdminRepositoryInterface $adminRepository;

    /**
     * @param AdminRepositoryInterface $adminRepository
     */
    public function __construct(AdminRepositoryInterface $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }


    /**
     * @param Request $request
     */
    public function index(Request $request)
    {
        return view('admin.home', [
            'title' => 'AdminPanel',
            'admin' => $request->session()->get('admin')
        ]);
    }

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function login(Request $request): View|Factory|Application
    {
        $data['title'] = 'Admin login';

        if (!empty($request->session()->get('error', ''))) {
            $data['error'] = "Unknown login or password";
        }

        return view('admin.login', compact('data'));
    }

    public function authenticate(AdminRequest $request): RedirectResponse
    {
        $admin = $this->adminRepository->getAdminByLoginPassword($request->get('email'), $request->get('password'));
        if (!$admin) {
            return redirect()->route('login')->with('error', 'Unknown login or password');
        }

        $request->session()->put('adminLoggedIn', true);
        $request->session()->put('admin', $admin);

        return redirect()->route('admin.report');
    }
}
