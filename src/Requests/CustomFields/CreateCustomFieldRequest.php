<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\CustomFields;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create a custom field
 *
 * POST /custom-fields
 */
class CreateCustomFieldRequest extends Request implements HasBody
{
    protected Method $method = Method::POST;

    use HasJsonBody;

    public function __construct(
        protected readonly string $name,
        protected readonly string $type,
        protected readonly string $format,
        protected readonly string $hidden,
        protected readonly array $values,
        protected readonly ?string $customFieldId = null,
        protected readonly ?string $href = null,
        protected readonly ?string $valueType = null,
        protected readonly ?string $fieldType = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/custom-fields';
    }

    protected function defaultBody(): array
    {
        return array_filter([
            'name' => $this->name,
            'type' => $this->type,
            'format' => $this->format,
            'hidden' => $this->hidden,
            'values' => $this->values,
            'customFieldId' => $this->customFieldId,
            'href' => $this->href,
            'valueType' => $this->valueType,
            'fieldType' => $this->fieldType,
        ], static fn ($value): bool => $value !== null);
    }
}
