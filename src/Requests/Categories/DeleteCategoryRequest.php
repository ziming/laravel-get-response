<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Categories;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Delete category
 *
 * DELETE /shops/{shopId}/categories/{categoryId}
 */
class DeleteCategoryRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(
        protected readonly string $shopId,
        protected readonly string $categoryId,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/shops/'.$this->shopId.'/categories/'.$this->categoryId;
    }
}
