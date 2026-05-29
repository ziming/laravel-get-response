<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Resources;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Ziming\LaravelGetResponse\Requests\Shops\CreateShopRequest;
use Ziming\LaravelGetResponse\Requests\Shops\DeleteShopRequest;
use Ziming\LaravelGetResponse\Requests\Shops\GetShopByIdRequest;
use Ziming\LaravelGetResponse\Requests\Shops\GetShopListRequest;
use Ziming\LaravelGetResponse\Requests\Shops\UpdateShopRequest;

class ShopsResource extends BaseResource
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getShopList(
        array $queryParameters = [],
        array $sortParameters = [],
        array $fields = [],
        ?int $perPage = null,
        ?int $page = null,
    ): Response {
        return $this->connector->send(new GetShopListRequest($queryParameters, $sortParameters, $fields, $perPage, $page));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function createShop(
        string $name,
        string $locale,
        string $currency,
        ?string $shopId = null,
        ?string $href = null,
        ?string $createdOn = null,
        ?string $updatedOn = null,
    ): Response {
        return $this->connector->send(new CreateShopRequest($name, $locale, $currency, $shopId, $href, $createdOn, $updatedOn));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function deleteShop(
        string $shopId,
    ): Response {
        return $this->connector->send(new DeleteShopRequest($shopId));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getShopById(
        string $shopId,
        array $fields = [],
    ): Response {
        return $this->connector->send(new GetShopByIdRequest($shopId, $fields));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function updateShop(
        string $shopId,
        ?string $href = null,
        ?string $name = null,
        ?string $locale = null,
        ?string $currency = null,
        ?string $createdOn = null,
        ?string $updatedOn = null,
    ): Response {
        return $this->connector->send(new UpdateShopRequest($shopId, $href, $name, $locale, $currency, $createdOn, $updatedOn));
    }
}
