<?php

namespace Modules\Job\Features;

use Modules\Job\Repositories\OfferRepository;

class  getSingleOffer
{
    protected $offerRepository;

    public function __construct()
    {
        $this->offerRepository = new OfferRepository();
    }

    public function handle($id)
    {
        return $this->offerRepository->getOffer($id);
    }
}
