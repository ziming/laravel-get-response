<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Addresses;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get an address by ID
 *
 * GET /addresses/{addressId}
 */
class GetAddressRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly string $addressId,
        protected readonly array $fields = [],
    ) {}

    public function resolveEndpoint(): string
    {
        return '/addresses/'.$this->addressId;
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'fields' => implode(',', $this->fields),
        ]);
    }
}
