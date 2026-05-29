<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Tags;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Update tag by ID
 *
 * POST /tags/{tagId}
 */
class UpdateTagRequest extends Request implements HasBody
{
    protected Method $method = Method::POST;

    use HasJsonBody;

    public function __construct(
        protected readonly string $tagId,
        protected readonly string $name,
        protected readonly ?string $color = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/tags/'.$this->tagId;
    }

    protected function defaultBody(): array
    {
        return array_filter([
            'name' => $this->name,
            'color' => $this->color,
        ], static fn ($value): bool => $value !== null);
    }
}
