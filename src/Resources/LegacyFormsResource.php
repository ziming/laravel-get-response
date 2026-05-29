<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Resources;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Ziming\LaravelGetResponse\Requests\LegacyForms\GetLegacyFormByIdRequest;
use Ziming\LaravelGetResponse\Requests\LegacyForms\GetLegacyFormListRequest;

class LegacyFormsResource extends BaseResource
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getLegacyFormList(
        array $queryParameters = [],
        array $sortParameters = [],
        array $fields = [],
        ?int $perPage = null,
        ?int $page = null,
    ): Response {
        return $this->connector->send(new GetLegacyFormListRequest($queryParameters, $sortParameters, $fields, $perPage, $page));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getLegacyFormById(
        string $webformId,
        array $fields = [],
    ): Response {
        return $this->connector->send(new GetLegacyFormByIdRequest($webformId, $fields));
    }
}
