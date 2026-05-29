<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Accounts;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * List of timezones
 *
 * GET /accounts/timezones
 */
class GetTimezonesRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly array $fields = [],
    ) {}

    public function resolveEndpoint(): string
    {
        return '/accounts/timezones';
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'fields' => implode(',', $this->fields),
        ]);
    }
}
