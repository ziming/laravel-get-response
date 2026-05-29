<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Resources;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Ziming\LaravelGetResponse\Requests\ClickTracks\GetClickTrackByIdRequest;
use Ziming\LaravelGetResponse\Requests\ClickTracks\GetClickTrackListRequest;

class ClickTracksResource extends BaseResource
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getClickTrackList(
        array $queryParameters = [],
        array $sortParameters = [],
        array $fields = [],
        ?int $perPage = null,
        ?int $page = null,
    ): Response {
        return $this->connector->send(new GetClickTrackListRequest($queryParameters, $sortParameters, $fields, $perPage, $page));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getClickTrackById(
        string $clickTrackId,
        array $fields = [],
    ): Response {
        return $this->connector->send(new GetClickTrackByIdRequest($clickTrackId, $fields));
    }
}
