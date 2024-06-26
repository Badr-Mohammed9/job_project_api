<?php

namespace Modules\Job\Features;

use Modules\Job\Repositories\OfferRepository;

class GetOffers
{
    protected $offerRepository;

    public function __construct()
    {
        $this->offerRepository = new OfferRepository();
    }

    public function handle()
    {
        return $this->offerRepository->all();
    }
}
