<?php

namespace Modules\Application\Repositories;

use Modules\Application\Models\UserApplication;

class ApplicationRepositoriy
{
    public function all()
    {
        return UserApplication::all();
    }

    public function create($user_id,$offer_id)
    {
        $application = UserApplication::create([
            'user_id'=>$user_id,
            'offer_id'=>$offer_id
        ]);

        return $application;
    }
}

