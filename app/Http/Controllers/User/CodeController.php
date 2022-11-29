<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\CodeStoreRequest;
use App\Models\Code;
use App\Services\User\CodeService;
use Illuminate\Http\Request;

class CodeController extends Controller
{
    protected $service;

    public function __construct(CodeService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $res = $this->service->getCodes();

        return response()->jsonApi($res, 200);
    }

    public function store(CodeStoreRequest $request)
    {
        $res = $this->service->save($request);

        return response()->jsonApi($res, "Saving Failed!");
    }

    public function view(Request $request, Code $code)
    {
        return response()->jsonApi($code, "Entity not found!", 404);
    }

}
