<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Shops;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Delete shop
 *
 * DELETE /shops/{shopId}
 */
class DeleteShopRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(
        protected readonly string $shopId,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/shops/'.$this->shopId;
    }
}
