<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Tags;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Add a new tag
 *
 * POST /tags
 */
class CreateTagRequest extends Request implements HasBody
{
    protected Method $method = Method::POST;

    use HasJsonBody;

    public function __construct(
        protected readonly string $name,
        protected readonly ?string $color = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/tags';
    }

    protected function defaultBody(): array
    {
        return array_filter([
            'name' => $this->name,
            'color' => $this->color,
        ], static fn ($value): bool => $value !== null);
    }
}
