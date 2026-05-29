<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Resources;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Ziming\LaravelGetResponse\Requests\Products\CreateProductRequest;
use Ziming\LaravelGetResponse\Requests\Products\DeleteProductRequest;
use Ziming\LaravelGetResponse\Requests\Products\GetProductByIdRequest;
use Ziming\LaravelGetResponse\Requests\Products\GetProductListRequest;
use Ziming\LaravelGetResponse\Requests\Products\UpdateProductRequest;
use Ziming\LaravelGetResponse\Requests\Products\UpsertMetaFieldsRequest;
use Ziming\LaravelGetResponse\Requests\Products\UpsertProductCategoriesRequest;

class ProductsResource extends BaseResource
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getProductList(
        string $shopId,
        array $queryParameters = [],
        array $sortParameters = [],
        array $fields = [],
        ?int $perPage = null,
        ?int $page = null,
    ): Response {
        return $this->connector->send(new GetProductListRequest($shopId, $queryParameters, $sortParameters, $fields, $perPage, $page));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function createProduct(
        string $shopId,
        string $name,
        array $variants,
        ?string $productId = null,
        ?string $href = null,
        ?string $type = null,
        ?string $url = null,
        ?string $vendor = null,
        ?string $externalId = null,
        ?array $categories = null,
        ?array $metaFields = null,
        ?string $createdOn = null,
        ?string $updatedOn = null,
    ): Response {
        return $this->connector->send(new CreateProductRequest($shopId, $name, $variants, $productId, $href, $type, $url, $vendor, $externalId, $categories, $metaFields, $createdOn, $updatedOn));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function deleteProduct(
        string $shopId,
        string $productId,
    ): Response {
        return $this->connector->send(new DeleteProductRequest($shopId, $productId));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getProductById(
        string $shopId,
        string $productId,
        array $fields = [],
    ): Response {
        return $this->connector->send(new GetProductByIdRequest($shopId, $productId, $fields));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function updateProduct(
        string $shopId,
        string $productId,
        ?string $href = null,
        ?string $name = null,
        ?string $type = null,
        ?string $url = null,
        ?string $vendor = null,
        ?string $externalId = null,
        ?array $categories = null,
        ?array $variants = null,
        ?array $metaFields = null,
        ?string $createdOn = null,
        ?string $updatedOn = null,
    ): Response {
        return $this->connector->send(new UpdateProductRequest($shopId, $productId, $href, $name, $type, $url, $vendor, $externalId, $categories, $variants, $metaFields, $createdOn, $updatedOn));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function upsertProductCategories(
        string $shopId,
        string $productId,
        array $categories,
    ): Response {
        return $this->connector->send(new UpsertProductCategoriesRequest($shopId, $productId, $categories));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function upsertMetaFields(
        string $shopId,
        string $productId,
        array $metaFields,
    ): Response {
        return $this->connector->send(new UpsertMetaFieldsRequest($shopId, $productId, $metaFields));
    }
}
