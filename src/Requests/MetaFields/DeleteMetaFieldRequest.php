<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\MetaFields;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Delete meta field
 *
 * DELETE /shops/{shopId}/meta-fields/{metaFieldId}
 */
class DeleteMetaFieldRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(
        protected readonly string $shopId,
        protected readonly string $metaFieldId,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/shops/'.$this->shopId.'/meta-fields/'.$this->metaFieldId;
    }
}
