<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Accounts;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Enable or update callbacks configuration
 *
 * POST /accounts/callbacks
 */
class UpdateCallbacksRequest extends Request implements HasBody
{
    protected Method $method = Method::POST;

    use HasJsonBody;

    public function __construct(
        protected readonly ?string $url = null,
        protected readonly ?array $actions = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/accounts/callbacks';
    }

    protected function defaultBody(): array
    {
        return array_filter([
            'url' => $this->url,
            'actions' => $this->actions,
        ], static fn ($value): bool => $value !== null);
    }
}
