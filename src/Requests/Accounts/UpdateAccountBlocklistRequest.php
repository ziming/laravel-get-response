<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Accounts;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Update account blocklist
 *
 * POST /accounts/blocklists
 */
class UpdateAccountBlocklistRequest extends Request implements HasBody
{
    protected Method $method = Method::POST;

    use HasJsonBody;

    public function __construct(
        protected readonly array $masks,
        protected readonly ?string $additionalFlags = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/accounts/blocklists';
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'additionalFlags' => $this->additionalFlags,
        ]);
    }

    protected function defaultBody(): array
    {
        return [
            'masks' => $this->masks,
        ];
    }
}
