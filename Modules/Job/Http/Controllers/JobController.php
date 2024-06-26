<?php

namespace Modules\Job\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Job\Features\CreateOffer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Modules\Job\Features\FilterOffer;
use Modules\Job\Http\Requests\CreateOfferRequest;
use Modules\Job\Http\Requests\FilterOfferRequest;
use Modules\Job\Models\Offer;

class JobController extends Controller
{
    public function filter(FilterOfferRequest $request)
    {
        $validated = $request->validated();

        $jobs = (new FilterOffer())->handle($validated);

        return response()->json($jobs);
    }

    // function detial(Job $job)
    // {
    //     return $job;
    // }

    public function create(CreateOfferRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = $request->user()->id;

        $offer = (new CreateOffer())->handle($data);

        return response()->json($offer, 201);
    }
}
