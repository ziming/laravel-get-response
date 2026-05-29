<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Categories;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create category
 *
 * POST /shops/{shopId}/categories
 */
class CreateCategoryRequest extends Request implements HasBody
{
    protected Method $method = Method::POST;

    use HasJsonBody;

    public function __construct(
        protected readonly string $shopId,
        protected readonly string $name,
        protected readonly ?string $categoryId = null,
        protected readonly ?string $href = null,
        protected readonly ?string $parentId = null,
        protected readonly ?bool $isDefault = null,
        protected readonly ?string $url = null,
        protected readonly ?string $externalId = null,
        protected readonly ?string $createdOn = null,
        protected readonly ?string $updatedOn = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/shops/'.$this->shopId.'/categories';
    }

    protected function defaultBody(): array
    {
        return array_filter([
            'name' => $this->name,
            'categoryId' => $this->categoryId,
            'href' => $this->href,
            'parentId' => $this->parentId,
            'isDefault' => $this->isDefault,
            'url' => $this->url,
            'externalId' => $this->externalId,
            'createdOn' => $this->createdOn,
            'updatedOn' => $this->updatedOn,
        ], static fn ($value): bool => $value !== null);
    }
}
