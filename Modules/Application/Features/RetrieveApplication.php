<?php

namespace Modules\Application\Features;

use Modules\Application\Repositories\ApplicationRepositoriy;

class RetrieveApplication
{
    protected $appRepo;

    public function __construct() {
        $this->appRepo = new ApplicationRepositoriy();
    }

    public function handle()
    {
        return $this->appRepo->all();
    }
}
