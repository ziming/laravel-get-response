<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Resources;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Ziming\LaravelGetResponse\Requests\Webinars\GetWebinarByIdRequest;
use Ziming\LaravelGetResponse\Requests\Webinars\GetWebinarListRequest;

class WebinarsResource extends BaseResource
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getWebinarList(
        array $queryParameters = [],
        array $sortParameters = [],
        array $fields = [],
        ?int $perPage = null,
        ?int $page = null,
    ): Response {
        return $this->connector->send(new GetWebinarListRequest($queryParameters, $sortParameters, $fields, $perPage, $page));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getWebinarById(
        string $webinarId,
        array $fields = [],
    ): Response {
        return $this->connector->send(new GetWebinarByIdRequest($webinarId, $fields));
    }
}
