<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Orders;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Delete order
 *
 * DELETE /shops/{shopId}/orders/{orderId}
 */
class DeleteOrderRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(
        protected readonly string $shopId,
        protected readonly string $orderId,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/shops/'.$this->shopId.'/orders/'.$this->orderId;
    }
}
