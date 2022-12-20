<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Http\Requests\PackageRequest;
use App\Interfaces\TvNetRepositoryInterface;
use App\Repositories\PackageRepository;
use App\Repositories\ServiceRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PackageController extends Controller
{
    private PackageRepository $packageRepository;

    private ServiceRepository $serviceRepository;

    /**
     * @param PackageRepository $packageRepository
     */
    public function __construct(PackageRepository $packageRepository,
                                ServiceRepository $serviceRepository)
    {
        $this->packageRepository = $packageRepository;
        $this->serviceRepository = $serviceRepository;
    }


    public function index(Request $request): View
    {
        $packages = $this->packageRepository->getAllItems();
        $resultPackages = [];

        foreach ($packages as $package) {
            $formattedPackage = [
                'itemId' => $package->id,
                'itemName' => $package->package_name,
                'itemDescription' => $package->package_description,
                'itemDetails' => $package->package_details
            ];
            $resultPackages[$package->id] = $formattedPackage;
        }

        return view('admin/package', [
            'title' => 'Packages',
            'items' => $resultPackages,
            'createRoute' => 'admin.packages.create',
            'updateRoute' => 'admin.packages.edit',
            'detailRoute' => 'admin.packages.show',
            'formRoute' => 'admin.packages.form',
            'itemType' => 'package'
        ]);
    }

    public function form(Request $request) : View
    {
        return view('admin/create-package', [
            'title' => 'Create Package',
            'services' => $this->serviceRepository->getAllItems(),
            'createRoute' => 'admin.packages.create',
            'updateRoute' => 'admin.packages.edit',
            'detailRoute' => 'admin.packages.show',
            'formRoute' => 'admin.packages.form',
            'itemType' => 'package'
        ]);
    }

    public function getPackage(Request $request, int $id) : View
    {
        $package = $this->packageRepository->getItemById($id);
        $services = $this->serviceRepository->getAllItems();

        $formattedItem['id'] = $package->id;
        $formattedItem['itemName'] = $package->package_name;
        $formattedItem['itemDescription'] = $package->package_description;
        $formattedItem['itemDetails'] = $package->package_details;


        return view('admin/create-package', [
            'title' => 'Update Item',
            'item' => $formattedItem,
            'services' => $services,
            'selectedServiceId' => $package->services->id,
            'createRoute' => 'admin.packages.create',
            'updateRoute' => 'admin.packages.edit',
            'detailRoute' => 'admin.packages.show',
            'formRoute' => 'admin.packages.form',
            'itemType' => 'package'
        ]);
    }

    public function createPackage(PackageRequest $request): JsonResponse
    {
        $packageDetails = $request->all();
        $this->packageRepository->createItem($packageDetails);

        return response()->json([
            'status' => true,
            'message' => 'Package Created Successfully',
        ]);
    }

    public function editPackage(PackageRequest $request, int $id): JsonResponse
    {
        $packageDetails = $request->all();
        unset($packageDetails['_token']);
        $package = $this->packageRepository->getItemById($id);

        $this->packageRepository->updateItem($package, $packageDetails);

        return response()->json([
            'status' => true,
            'message' => 'Package Updated Successfully'
        ]);
    }
}
