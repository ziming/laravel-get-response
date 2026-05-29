<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Resources;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Ziming\LaravelGetResponse\Requests\Categories\CreateCategoryRequest;
use Ziming\LaravelGetResponse\Requests\Categories\DeleteCategoryRequest;
use Ziming\LaravelGetResponse\Requests\Categories\GetCategoriesRequest;
use Ziming\LaravelGetResponse\Requests\Categories\GetCategoryRequest;
use Ziming\LaravelGetResponse\Requests\Categories\UpdateCategoryRequest;

class CategoriesResource extends BaseResource
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getCategories(
        string $shopId,
        array $queryParameters = [],
        array $sortParameters = [],
        array $search = [],
        array $fields = [],
        ?int $perPage = null,
        ?int $page = null,
    ): Response {
        return $this->connector->send(new GetCategoriesRequest($shopId, $queryParameters, $sortParameters, $search, $fields, $perPage, $page));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function createCategory(
        string $shopId,
        string $name,
        ?string $categoryId = null,
        ?string $href = null,
        ?string $parentId = null,
        ?bool $isDefault = null,
        ?string $url = null,
        ?string $externalId = null,
        ?string $createdOn = null,
        ?string $updatedOn = null,
    ): Response {
        return $this->connector->send(new CreateCategoryRequest($shopId, $name, $categoryId, $href, $parentId, $isDefault, $url, $externalId, $createdOn, $updatedOn));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function deleteCategory(
        string $shopId,
        string $categoryId,
    ): Response {
        return $this->connector->send(new DeleteCategoryRequest($shopId, $categoryId));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getCategory(
        string $shopId,
        string $categoryId,
        array $fields = [],
    ): Response {
        return $this->connector->send(new GetCategoryRequest($shopId, $categoryId, $fields));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function updateCategory(
        string $shopId,
        string $categoryId,
        ?string $href = null,
        ?string $name = null,
        ?string $parentId = null,
        ?bool $isDefault = null,
        ?string $url = null,
        ?string $externalId = null,
        ?string $createdOn = null,
        ?string $updatedOn = null,
    ): Response {
        return $this->connector->send(new UpdateCategoryRequest($shopId, $categoryId, $href, $name, $parentId, $isDefault, $url, $externalId, $createdOn, $updatedOn));
    }
}
