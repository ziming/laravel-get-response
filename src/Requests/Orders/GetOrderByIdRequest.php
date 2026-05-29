<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Orders;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get a single order by ID
 *
 * GET /shops/{shopId}/orders/{orderId}
 */
class GetOrderByIdRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly string $shopId,
        protected readonly string $orderId,
        protected readonly array $fields = [],
    ) {}

    public function resolveEndpoint(): string
    {
        return '/shops/'.$this->shopId.'/orders/'.$this->orderId;
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'fields' => implode(',', $this->fields),
        ]);
    }
}
