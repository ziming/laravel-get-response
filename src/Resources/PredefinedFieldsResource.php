<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Resources;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Ziming\LaravelGetResponse\Requests\PredefinedFields\CreatePredefinedFieldRequest;
use Ziming\LaravelGetResponse\Requests\PredefinedFields\DeletePredefinedFieldRequest;
use Ziming\LaravelGetResponse\Requests\PredefinedFields\GetPredefinedFieldByIdRequest;
use Ziming\LaravelGetResponse\Requests\PredefinedFields\GetPredefinedFieldListRequest;
use Ziming\LaravelGetResponse\Requests\PredefinedFields\UpdatePredefinedFieldRequest;

class PredefinedFieldsResource extends BaseResource
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getPredefinedFieldList(
        array $queryParameters = [],
        array $sortParameters = [],
        array $fields = [],
        ?int $perPage = null,
        ?int $page = null,
    ): Response {
        return $this->connector->send(new GetPredefinedFieldListRequest($queryParameters, $sortParameters, $fields, $perPage, $page));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function createPredefinedField(
        string $name,
        string $value,
        array $campaign,
        ?string $predefinedFieldId = null,
        ?string $href = null,
    ): Response {
        return $this->connector->send(new CreatePredefinedFieldRequest($name, $value, $campaign, $predefinedFieldId, $href));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function deletePredefinedField(
        string $predefinedFieldId,
    ): Response {
        return $this->connector->send(new DeletePredefinedFieldRequest($predefinedFieldId));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getPredefinedFieldById(
        string $predefinedFieldId,
        array $fields = [],
    ): Response {
        return $this->connector->send(new GetPredefinedFieldByIdRequest($predefinedFieldId, $fields));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function updatePredefinedField(
        string $predefinedFieldId,
        string $value,
    ): Response {
        return $this->connector->send(new UpdatePredefinedFieldRequest($predefinedFieldId, $value));
    }
}
