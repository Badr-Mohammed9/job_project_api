<?php

namespace Modules\Job\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class OfferController extends Controller
{
    public function filter(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'exp' => 'nullable|string',
            'category' => 'nullable|string',
            'salaryFrom' => 'required|integer',
            'salaryTo' => 'required|integer',
        ]);

        $name = $validated['name'];
        $exp = $validated['exp'];
        $category = $validated['category'];
        $salaryFrom = $validated['salaryFrom'];
        $salaryTo = $validated['salaryTo'];

        $query =DB::table('offers')
            ->where('name', 'ILIKE',  $name . '%')
            ->whereBetween('salary', [$salaryFrom, $salaryTo]);

        if ($exp and $exp !== 'all') {
            $query->where('exp', $exp);
        }

        if ($category and $category !== 'all') {
            $query->where('category', $category);
        }

        $jobs = $query->get();

        return response()->json($jobs);
    }

    // function detial(Job $job)
    // {
    //     return $job;
    // }

    // function create(Request $request)
    // {
    //     if (Gate::allows('create-job')) {
    //         $data = $request->validate([
    //             'name' => 'required|string',
    //             'exp' => 'required|string',
    //             'category' => 'required|string',
    //             'salary' => 'required|integer',
    //         ]);

    //         $data['user_id'] = $request->user()->id;

    //         $job = Job::create($data);

    //         return $job;
    //     }
    //     return response()->json(['message'=>'unAuthorized user']);

    // }
}
