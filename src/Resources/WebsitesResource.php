<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Resources;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Ziming\LaravelGetResponse\Requests\Websites\GetWebsiteByIdRequest;
use Ziming\LaravelGetResponse\Requests\Websites\GetWebsitesListRequest;

class WebsitesResource extends BaseResource
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getWebsitesList(
        array $queryParameters = [],
        array $sortParameters = [],
        array $stats = [],
        array $fields = [],
        ?int $perPage = null,
        ?int $page = null,
    ): Response {
        return $this->connector->send(new GetWebsitesListRequest($queryParameters, $sortParameters, $stats, $fields, $perPage, $page));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getWebsiteById(
        string $websiteId,
        array $fields = [],
    ): Response {
        return $this->connector->send(new GetWebsiteByIdRequest($websiteId, $fields));
    }
}
