<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Accounts;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Returns account blocklist masks
 *
 * GET /accounts/blocklists
 */
class GetAccountBlocklistRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly array $queryParameters = [],
    ) {}

    public function resolveEndpoint(): string
    {
        return '/accounts/blocklists';
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'query' => $this->queryParameters,
        ]);
    }
}
