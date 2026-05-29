<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Suppressions;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Creates a new suppression list
 *
 * POST /suppressions
 */
class CreateSuppressionRequest extends Request implements HasBody
{
    protected Method $method = Method::POST;

    use HasJsonBody;

    public function __construct(
        protected readonly string $name,
        protected readonly ?array $masks = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/suppressions';
    }

    protected function defaultBody(): array
    {
        return array_filter([
            'name' => $this->name,
            'masks' => $this->masks,
        ], static fn ($value): bool => $value !== null);
    }
}
