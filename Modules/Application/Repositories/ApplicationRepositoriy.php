<?php

namespace Modules\Application\Repositories;

use Modules\Application\Models\UserApplication;

class ApplicationRepositoriy
{
    public function all()
    {
        return UserApplication::all();
    }
}

