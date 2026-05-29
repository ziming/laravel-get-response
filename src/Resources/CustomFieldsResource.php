<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Resources;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Ziming\LaravelGetResponse\Requests\CustomFields\CreateCustomFieldRequest;
use Ziming\LaravelGetResponse\Requests\CustomFields\DeleteCustomFieldRequest;
use Ziming\LaravelGetResponse\Requests\CustomFields\GetCustomFieldByIdRequest;
use Ziming\LaravelGetResponse\Requests\CustomFields\GetCustomFieldListRequest;
use Ziming\LaravelGetResponse\Requests\CustomFields\UpdateCustomFieldRequest;

class CustomFieldsResource extends BaseResource
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getCustomFieldList(
        array $queryParameters = [],
        array $sortParameters = [],
        array $fields = [],
        ?int $perPage = null,
        ?int $page = null,
    ): Response {
        return $this->connector->send(new GetCustomFieldListRequest($queryParameters, $sortParameters, $fields, $perPage, $page));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function createCustomField(
        string $name,
        string $type,
        string $format,
        string $hidden,
        array $values,
        ?string $customFieldId = null,
        ?string $href = null,
        ?string $valueType = null,
        ?string $fieldType = null,
    ): Response {
        return $this->connector->send(new CreateCustomFieldRequest($name, $type, $format, $hidden, $values, $customFieldId, $href, $valueType, $fieldType));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function deleteCustomField(
        string $customFieldId,
    ): Response {
        return $this->connector->send(new DeleteCustomFieldRequest($customFieldId));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getCustomFieldById(
        string $customFieldId,
        array $fields = [],
    ): Response {
        return $this->connector->send(new GetCustomFieldByIdRequest($customFieldId, $fields));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function updateCustomField(
        string $customFieldId,
        string $hidden,
        array $values,
    ): Response {
        return $this->connector->send(new UpdateCustomFieldRequest($customFieldId, $hidden, $values));
    }
}
