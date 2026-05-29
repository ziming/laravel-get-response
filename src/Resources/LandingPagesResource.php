<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Resources;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Ziming\LaravelGetResponse\Requests\LandingPages\GetLpsByIdRequest;
use Ziming\LaravelGetResponse\Requests\LandingPages\GetLpsListRequest;

class LandingPagesResource extends BaseResource
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getLpsList(
        array $queryParameters = [],
        array $sortParameters = [],
        array $stats = [],
        array $fields = [],
        ?int $perPage = null,
        ?int $page = null,
    ): Response {
        return $this->connector->send(new GetLpsListRequest($queryParameters, $sortParameters, $stats, $fields, $perPage, $page));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getLpsById(
        string $lpsId,
        array $fields = [],
    ): Response {
        return $this->connector->send(new GetLpsByIdRequest($lpsId, $fields));
    }
}
