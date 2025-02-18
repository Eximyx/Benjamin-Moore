<?php

namespace App\Http\Controllers\Admin\ModelControllers;

use App\DataTransferObjects\ModelDTO\LeadDTO;
use App\Http\Requests\LeadsRequest;
use App\Http\Resources\ModelResources\LeadResource;
use App\Mail\TestMail;
use App\Services\Admin\ModelServices\LeadsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Mail;

class LeadsController extends BaseAdminController
{
    /**
     * @param LeadsService $service
     */
    public function __construct(LeadsService $service)
    {
        parent::__construct($service, LeadDTO::class, LeadResource::class, LeadsRequest::class);
    }

    public function store(Request $request): JsonResponse|JsonResource
    {
        Mail::to($request->input('contact_info'))->send(new TestMail);

        return parent::store($request);
    }
}
