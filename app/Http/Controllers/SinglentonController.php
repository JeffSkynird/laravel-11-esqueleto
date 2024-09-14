<?php

namespace App\Http\Controllers;

use App\Services\SinglentonService;
use Illuminate\Http\Request;

class SinglentonController extends Controller
{
    protected SinglentonService $singlentonService;
    
    public function __construct(SinglentonService $singlentonService)
    {
        $this->singlentonService = $singlentonService;
    }

    public function callAPI()
    {
        return $this->singlentonService->callAPI();
    }
}
