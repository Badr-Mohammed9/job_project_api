<?php

namespace Modules\Job\Repositories;

use Illuminate\Support\Facades\DB;
use Modules\Job\Models\Offer;

class OfferRepository
{
    public function create(array $data)
    {
        return Offer::create($data);
    }

    public function filter($validated)
    {
        $query = DB::table('offers')
            ->where('name', 'ILIKE',  $validated['name'] . '%')
            ->whereBetween('salary', [$validated['salaryFrom'], $validated['salaryTo']]);

        if ($validated['exp'] && $validated['exp'] !== 'all') {
            $query->where('exp', $validated['exp']);
        }

        if ($validated['category'] && $validated['category'] !== 'all') {
            $query->where('category', $validated['category']);
        }

        $jobs = $query->get();

        return response()->json($jobs);
    }

    public function all()
    {
        return Offer::all();
    }
}
