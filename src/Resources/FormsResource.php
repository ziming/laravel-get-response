<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Resources;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Ziming\LaravelGetResponse\Requests\Forms\GetFormListRequest;
use Ziming\LaravelGetResponse\Requests\Forms\GetFormRequest;
use Ziming\LaravelGetResponse\Requests\Forms\GetFormVariantListRequest;

class FormsResource extends BaseResource
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getFormList(
        array $queryParameters = [],
        array $sortParameters = [],
        array $fields = [],
        ?int $perPage = null,
        ?int $page = null,
    ): Response {
        return $this->connector->send(new GetFormListRequest($queryParameters, $sortParameters, $fields, $perPage, $page));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getForm(
        string $formId,
        array $fields = [],
    ): Response {
        return $this->connector->send(new GetFormRequest($formId, $fields));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getFormVariantList(
        string $formId,
        array $fields = [],
    ): Response {
        return $this->connector->send(new GetFormVariantListRequest($formId, $fields));
    }
}
