<?php

namespace Modules\Job\Features;

use Modules\Job\Repositories\OfferRepository;

class CreateOffer
{
    protected $offerRepository;

    public function __construct()
    {
        $this->offerRepository = new OfferRepository();
    }

    public function handle(array $data)
    {
        return $this->offerRepository->create($data);
    }
}
