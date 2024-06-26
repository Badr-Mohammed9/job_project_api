<?php

namespace Modules\Job\Features;

use Modules\Job\Repositories\OfferRepository;

class FilterOffer
{
    protected $filterRepository;

    public function __construct( )
    {
        $this->filterRepository = new OfferRepository();
    }

    public function handle($validated)
    {
        return $this->filterRepository->filter($validated);
    }
}

