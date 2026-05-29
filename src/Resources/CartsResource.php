<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Resources;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Ziming\LaravelGetResponse\Requests\Carts\CreateCartRequest;
use Ziming\LaravelGetResponse\Requests\Carts\DeleteCartRequest;
use Ziming\LaravelGetResponse\Requests\Carts\GetCartRequest;
use Ziming\LaravelGetResponse\Requests\Carts\GetCartsRequest;
use Ziming\LaravelGetResponse\Requests\Carts\UpdateCartRequest;

class CartsResource extends BaseResource
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getCarts(
        string $shopId,
        array $queryParameters = [],
        array $sortParameters = [],
        array $fields = [],
        ?int $perPage = null,
        ?int $page = null,
    ): Response {
        return $this->connector->send(new GetCartsRequest($shopId, $queryParameters, $sortParameters, $fields, $perPage, $page));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function createCart(
        string $shopId,
        string $contactId,
        float $totalPrice,
        string $currency,
        array $selectedVariants,
        ?string $cartId = null,
        ?string $href = null,
        ?float $totalTaxPrice = null,
        ?string $externalId = null,
        ?string $cartUrl = null,
        ?string $createdOn = null,
        ?string $updatedOn = null,
    ): Response {
        return $this->connector->send(new CreateCartRequest($shopId, $contactId, $totalPrice, $currency, $selectedVariants, $cartId, $href, $totalTaxPrice, $externalId, $cartUrl, $createdOn, $updatedOn));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function deleteCart(
        string $shopId,
        string $cartId,
    ): Response {
        return $this->connector->send(new DeleteCartRequest($shopId, $cartId));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getCart(
        string $shopId,
        string $cartId,
        array $fields = [],
    ): Response {
        return $this->connector->send(new GetCartRequest($shopId, $cartId, $fields));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function updateCart(
        string $shopId,
        string $cartId,
        ?string $href = null,
        ?string $contactId = null,
        ?float $totalPrice = null,
        ?float $totalTaxPrice = null,
        ?string $currency = null,
        ?array $selectedVariants = null,
        ?string $externalId = null,
        ?string $cartUrl = null,
        ?string $createdOn = null,
        ?string $updatedOn = null,
    ): Response {
        return $this->connector->send(new UpdateCartRequest($shopId, $cartId, $href, $contactId, $totalPrice, $totalTaxPrice, $currency, $selectedVariants, $externalId, $cartUrl, $createdOn, $updatedOn));
    }
}
