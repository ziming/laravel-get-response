<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Resources;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Ziming\LaravelGetResponse\Requests\GdprFields\GetGDPRFieldListRequest;
use Ziming\LaravelGetResponse\Requests\GdprFields\GetGDPRFieldRequest;

class GdprFieldsResource extends BaseResource
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getGDPRFieldList(
        array $sortParameters = [],
        array $fields = [],
        ?int $perPage = null,
        ?int $page = null,
    ): Response {
        return $this->connector->send(new GetGDPRFieldListRequest($sortParameters, $fields, $perPage, $page));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getGDPRField(
        string $gdprFieldId,
        array $fields = [],
    ): Response {
        return $this->connector->send(new GetGDPRFieldRequest($gdprFieldId, $fields));
    }
}
