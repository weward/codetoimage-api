<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
use App\Models\CodeStyle;
use App\Services\GeneralService;
use App\Services\User\CodeStyleService;
use Illuminate\Http\Request;

class CodeStyleController extends Controller
{
    protected $service;

    public function __construct(CodeStyleService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $styles = $this->service->getCodeStyles();
        
        return response()->jsonApi($styles);
    }

    

}
