<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\CodeStoreRequest;
use App\Services\User\CodeService;
use Illuminate\Http\Request;

class CodeController extends Controller
{
    protected $service;

    public function __construct(CodeService $service)
    {
        $this->service = $service;
    }

    public function store(CodeStoreRequest $request)
    {
        $res = $this->service->save($request);

        if ($res) {
            return response()->json($res, 200);
        }

        return response()->json('Saving failed!', 500);
    }

}
