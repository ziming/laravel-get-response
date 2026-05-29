<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\MetaFields;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create meta field
 *
 * POST /shops/{shopId}/meta-fields
 */
class CreateMetaFieldRequest extends Request implements HasBody
{
    protected Method $method = Method::POST;

    use HasJsonBody;

    public function __construct(
        protected readonly string $shopId,
        protected readonly string $name,
        protected readonly string $value,
        protected readonly string $valueType,
        protected readonly ?string $href = null,
        protected readonly ?string $metaFieldId = null,
        protected readonly ?string $description = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/shops/'.$this->shopId.'/meta-fields';
    }

    protected function defaultBody(): array
    {
        return array_filter([
            'name' => $this->name,
            'value' => $this->value,
            'valueType' => $this->valueType,
            'href' => $this->href,
            'metaFieldId' => $this->metaFieldId,
            'description' => $this->description,
        ], static fn ($value): bool => $value !== null);
    }
}
