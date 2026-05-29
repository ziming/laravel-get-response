<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\PredefinedFields;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create a predefined field
 *
 * POST /predefined-fields
 */
class CreatePredefinedFieldRequest extends Request implements HasBody
{
    protected Method $method = Method::POST;

    use HasJsonBody;

    public function __construct(
        protected readonly string $name,
        protected readonly string $value,
        protected readonly array $campaign,
        protected readonly ?string $predefinedFieldId = null,
        protected readonly ?string $href = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/predefined-fields';
    }

    protected function defaultBody(): array
    {
        return array_filter([
            'name' => $this->name,
            'value' => $this->value,
            'campaign' => $this->campaign,
            'predefinedFieldId' => $this->predefinedFieldId,
            'href' => $this->href,
        ], static fn ($value): bool => $value !== null);
    }
}
