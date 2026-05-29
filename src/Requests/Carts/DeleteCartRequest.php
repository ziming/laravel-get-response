<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Carts;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Delete cart
 *
 * DELETE /shops/{shopId}/carts/{cartId}
 */
class DeleteCartRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(
        protected readonly string $shopId,
        protected readonly string $cartId,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/shops/'.$this->shopId.'/carts/'.$this->cartId;
    }
}
