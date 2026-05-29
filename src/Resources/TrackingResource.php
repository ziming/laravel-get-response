<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Resources;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Ziming\LaravelGetResponse\Requests\Tracking\GetFacebookPixelListRequest;
use Ziming\LaravelGetResponse\Requests\Tracking\GetTrackingRequest;

class TrackingResource extends BaseResource
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getTracking(): Response
    {
        return $this->connector->send(new GetTrackingRequest);
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getFacebookPixelList(): Response
    {
        return $this->connector->send(new GetFacebookPixelListRequest);
    }
}
