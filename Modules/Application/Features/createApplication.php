<?php

namespace Modules\Application\Features;

use Modules\Application\Repositories\ApplicationRepositoriy;

class createApplication
{
    protected $appRepo;

    public function __construct() {
        $this->appRepo = new ApplicationRepositoriy();
    }

    public function handle($user_id,$offer_id)
    {
        return $this->appRepo->create($user_id,$offer_id);
    }
}
