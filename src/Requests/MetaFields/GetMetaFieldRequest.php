<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\MetaFields;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get the meta field by ID
 *
 * GET /shops/{shopId}/meta-fields/{metaFieldId}
 */
class GetMetaFieldRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly string $shopId,
        protected readonly string $metaFieldId,
        protected readonly array $fields = [],
    ) {}

    public function resolveEndpoint(): string
    {
        return '/shops/'.$this->shopId.'/meta-fields/'.$this->metaFieldId;
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'fields' => implode(',', $this->fields),
        ]);
    }
}
