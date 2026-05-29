<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\MetaFields;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Update meta field
 *
 * POST /shops/{shopId}/meta-fields/{metaFieldId}
 */
class UpdateMetaFieldRequest extends Request implements HasBody
{
    protected Method $method = Method::POST;

    use HasJsonBody;

    public function __construct(
        protected readonly string $shopId,
        protected readonly string $metaFieldId,
        protected readonly ?string $href = null,
        protected readonly ?string $name = null,
        protected readonly ?string $value = null,
        protected readonly ?string $valueType = null,
        protected readonly ?string $description = null,
        protected readonly ?string $createdOn = null,
        protected readonly ?string $updatedOn = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/shops/'.$this->shopId.'/meta-fields/'.$this->metaFieldId;
    }

    protected function defaultBody(): array
    {
        return array_filter([
            'href' => $this->href,
            'name' => $this->name,
            'value' => $this->value,
            'valueType' => $this->valueType,
            'description' => $this->description,
            'createdOn' => $this->createdOn,
            'updatedOn' => $this->updatedOn,
        ], static fn ($value): bool => $value !== null);
    }
}
