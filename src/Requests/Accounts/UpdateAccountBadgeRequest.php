<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Accounts;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Turn on/off the GetResponse Badge
 *
 * POST /accounts/badge
 */
class UpdateAccountBadgeRequest extends Request implements HasBody
{
    protected Method $method = Method::POST;

    use HasJsonBody;

    public function __construct(
        protected readonly string $status,
        protected readonly ?string $type = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/accounts/badge';
    }

    protected function defaultBody(): array
    {
        return array_filter([
            'status' => $this->status,
            'type' => $this->type,
        ], static fn ($value): bool => $value !== null);
    }
}
