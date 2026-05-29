<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Resources;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Ziming\LaravelGetResponse\Requests\LegacyLandingPages\GetLandingPageByIdRequest;
use Ziming\LaravelGetResponse\Requests\LegacyLandingPages\GetLandingPageListRequest;

class LegacyLandingPagesResource extends BaseResource
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getLandingPageList(
        array $queryParameters = [],
        array $sortParameters = [],
        array $fields = [],
        ?int $perPage = null,
        ?int $page = null,
    ): Response {
        return $this->connector->send(new GetLandingPageListRequest($queryParameters, $sortParameters, $fields, $perPage, $page));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getLandingPageById(
        string $landingPageId,
        array $fields = [],
    ): Response {
        return $this->connector->send(new GetLandingPageByIdRequest($landingPageId, $fields));
    }
}
