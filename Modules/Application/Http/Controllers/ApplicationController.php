<?php

namespace Modules\Application\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Application\Features\RetrieveApplication;
use Modules\Application\Models\UserApplication;

class ApplicationController extends Controller
{
    public function getAllApplications()
    {
        return (new RetrieveApplication())->handle();
    }
}
