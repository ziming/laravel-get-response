<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Resources;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Ziming\LaravelGetResponse\Requests\Orders\CreateOrderRequest;
use Ziming\LaravelGetResponse\Requests\Orders\DeleteOrderRequest;
use Ziming\LaravelGetResponse\Requests\Orders\GetOrderByIdRequest;
use Ziming\LaravelGetResponse\Requests\Orders\GetOrderListRequest;
use Ziming\LaravelGetResponse\Requests\Orders\UpdateOrderRequest;

class OrdersResource extends BaseResource
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getOrderList(
        string $shopId,
        array $queryParameters = [],
        array $sortParameters = [],
        array $fields = [],
        ?int $perPage = null,
        ?int $page = null,
    ): Response {
        return $this->connector->send(new GetOrderListRequest($shopId, $queryParameters, $sortParameters, $fields, $perPage, $page));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function createOrder(
        string $shopId,
        array $selectedVariants,
        string $contactId,
        float $totalPrice,
        string $currency,
        ?string $orderId = null,
        ?string $href = null,
        ?string $orderUrl = null,
        ?string $externalId = null,
        ?float $totalPriceTax = null,
        ?string $status = null,
        ?string $cartId = null,
        ?string $description = null,
        ?float $shippingPrice = null,
        ?array $shippingAddress = null,
        ?string $billingStatus = null,
        ?array $billingAddress = null,
        ?string $processedAt = null,
        ?array $metaFields = null,
        ?string $additionalFlags = null,
    ): Response {
        return $this->connector->send(new CreateOrderRequest($shopId, $selectedVariants, $contactId, $totalPrice, $currency, $orderId, $href, $orderUrl, $externalId, $totalPriceTax, $status, $cartId, $description, $shippingPrice, $shippingAddress, $billingStatus, $billingAddress, $processedAt, $metaFields, $additionalFlags));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function deleteOrder(
        string $shopId,
        string $orderId,
    ): Response {
        return $this->connector->send(new DeleteOrderRequest($shopId, $orderId));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getOrderById(
        string $shopId,
        string $orderId,
        array $fields = [],
    ): Response {
        return $this->connector->send(new GetOrderByIdRequest($shopId, $orderId, $fields));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function updateOrder(
        string $shopId,
        string $orderId,
        ?string $href = null,
        ?string $contactId = null,
        ?string $orderUrl = null,
        ?string $externalId = null,
        ?float $totalPrice = null,
        ?float $totalPriceTax = null,
        ?string $currency = null,
        ?string $status = null,
        ?string $cartId = null,
        ?string $description = null,
        ?float $shippingPrice = null,
        ?array $shippingAddress = null,
        ?string $billingStatus = null,
        ?array $billingAddress = null,
        ?string $processedAt = null,
        ?array $metaFields = null,
        ?string $additionalFlags = null,
    ): Response {
        return $this->connector->send(new UpdateOrderRequest($shopId, $orderId, $href, $contactId, $orderUrl, $externalId, $totalPrice, $totalPriceTax, $currency, $status, $cartId, $description, $shippingPrice, $shippingAddress, $billingStatus, $billingAddress, $processedAt, $metaFields, $additionalFlags));
    }
}
