<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\ServiceRequest;
use App\Repositories\ServiceRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ServiceController
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
     * @return View
     */
    public function index() : View
    {
        $services = $this->serviceRepository->getAllItems();
        $resultServices = [];

        foreach ($services as $service) {
            $formattedService = [
                'itemId' => $service->id,
                'itemName' => $service->service_name,
                'itemDescription' => $service->service_description,
            ];
            $resultServices[$service->id] = $formattedService;
        }

        return view('admin/package', [
            'title' => 'Services',
            'items' => $resultServices,
            'createRoute' => 'admin.services.create',
            'updateRoute' => 'admin.services.edit',
            'detailRoute' => 'admin.services.show',
            'itemType' => 'service'
        ]);
    }

    public function form() : View
    {
        return view('admin/create-package', [
            'title' => 'Create Service',
            'createRoute' => 'admin.services.create',
            'updateRoute' => 'admin.services.edit',
            'detailRoute' => 'admin.services.show',
            'itemType' => 'service'

        ]);
    }

    public function createService(ServiceRequest $request): JsonResponse
    {
        $serviceDetails = $request->all();
        $this->serviceRepository->createItem($serviceDetails);

        return response()->json([
            'status' => true,
            'message' => 'Service Created Successfully',
        ]);

    }

    public function editService(Request $request, int $id)
    {
        $serviceDetails = $request->all();
        unset($serviceDetails['_token']);
        $service = $this->serviceRepository->getItemById($id);

        $this->serviceRepository->updateItem($service, $serviceDetails);

        return response()->json([
            'status' => true,
            'message' => 'Package Updated Successfully'
        ]);
    }

    public function getService(Request $request, int $id) : View
    {
        $service = $this->serviceRepository->getItemById($id);

        $formattedItem['id'] = $service->id;
        $formattedItem['itemName'] = $service->service_name;
        $formattedItem['itemDescription'] = $service->service_description;
        $formattedItem['itemDetails'] = $service->service_details;


        return view('admin/create-package', [
            'title' => 'Update Item',
            'item' => $formattedItem,
            'createRoute' => 'admin.services.create',
            'updateRoute' => 'admin.services.edit',
            'detailRoute' => 'admin.services.show',
            'itemType' => 'service'
        ]);
    }

}
