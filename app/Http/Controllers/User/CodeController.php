<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\User\GeneralService;
use Illuminate\Http\Request;

class CodeController extends Controller
{
    protected $service;

    public function __construct(GeneralService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        
    }

}
