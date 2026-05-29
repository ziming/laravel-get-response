<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Resources;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Ziming\LaravelGetResponse\Requests\MetaFields\CreateMetaFieldRequest;
use Ziming\LaravelGetResponse\Requests\MetaFields\DeleteMetaFieldRequest;
use Ziming\LaravelGetResponse\Requests\MetaFields\GetMetaFieldRequest;
use Ziming\LaravelGetResponse\Requests\MetaFields\GetMetaFieldsRequest;
use Ziming\LaravelGetResponse\Requests\MetaFields\UpdateMetaFieldRequest;

class MetaFieldsResource extends BaseResource
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getMetaFields(
        string $shopId,
        array $queryParameters = [],
        array $sortParameters = [],
        array $fields = [],
        ?int $perPage = null,
        ?int $page = null,
    ): Response {
        return $this->connector->send(new GetMetaFieldsRequest($shopId, $queryParameters, $sortParameters, $fields, $perPage, $page));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function createMetaField(
        string $shopId,
        string $name,
        string $value,
        string $valueType,
        ?string $href = null,
        ?string $metaFieldId = null,
        ?string $description = null,
    ): Response {
        return $this->connector->send(new CreateMetaFieldRequest($shopId, $name, $value, $valueType, $href, $metaFieldId, $description));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function deleteMetaField(
        string $shopId,
        string $metaFieldId,
    ): Response {
        return $this->connector->send(new DeleteMetaFieldRequest($shopId, $metaFieldId));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getMetaField(
        string $shopId,
        string $metaFieldId,
        array $fields = [],
    ): Response {
        return $this->connector->send(new GetMetaFieldRequest($shopId, $metaFieldId, $fields));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function updateMetaField(
        string $shopId,
        string $metaFieldId,
        ?string $href = null,
        ?string $name = null,
        ?string $value = null,
        ?string $valueType = null,
        ?string $description = null,
        ?string $createdOn = null,
        ?string $updatedOn = null,
    ): Response {
        return $this->connector->send(new UpdateMetaFieldRequest($shopId, $metaFieldId, $href, $name, $value, $valueType, $description, $createdOn, $updatedOn));
    }
}
