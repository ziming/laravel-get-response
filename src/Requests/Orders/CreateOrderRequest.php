<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Orders;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create order
 *
 * POST /shops/{shopId}/orders
 */
class CreateOrderRequest extends Request implements HasBody
{
    protected Method $method = Method::POST;

    use HasJsonBody;

    public function __construct(
        protected readonly string $shopId,
        protected readonly array $selectedVariants,
        protected readonly string $contactId,
        protected readonly float $totalPrice,
        protected readonly string $currency,
        protected readonly ?string $orderId = null,
        protected readonly ?string $href = null,
        protected readonly ?string $orderUrl = null,
        protected readonly ?string $externalId = null,
        protected readonly ?float $totalPriceTax = null,
        protected readonly ?string $status = null,
        protected readonly ?string $cartId = null,
        protected readonly ?string $description = null,
        protected readonly ?float $shippingPrice = null,
        protected readonly ?array $shippingAddress = null,
        protected readonly ?string $billingStatus = null,
        protected readonly ?array $billingAddress = null,
        protected readonly ?string $processedAt = null,
        protected readonly ?array $metaFields = null,
        protected readonly ?string $additionalFlags = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/shops/'.$this->shopId.'/orders';
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'additionalFlags' => $this->additionalFlags,
        ]);
    }

    protected function defaultBody(): array
    {
        return array_filter([
            'selectedVariants' => $this->selectedVariants,
            'contactId' => $this->contactId,
            'totalPrice' => $this->totalPrice,
            'currency' => $this->currency,
            'orderId' => $this->orderId,
            'href' => $this->href,
            'orderUrl' => $this->orderUrl,
            'externalId' => $this->externalId,
            'totalPriceTax' => $this->totalPriceTax,
            'status' => $this->status,
            'cartId' => $this->cartId,
            'description' => $this->description,
            'shippingPrice' => $this->shippingPrice,
            'shippingAddress' => $this->shippingAddress,
            'billingStatus' => $this->billingStatus,
            'billingAddress' => $this->billingAddress,
            'processedAt' => $this->processedAt,
            'metaFields' => $this->metaFields,
        ], static fn ($value): bool => $value !== null);
    }
}
