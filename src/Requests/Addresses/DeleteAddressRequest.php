<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Addresses;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Delete address
 *
 * DELETE /addresses/{addressId}
 */
class DeleteAddressRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(
        protected readonly string $addressId,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/addresses/'.$this->addressId;
    }
}
