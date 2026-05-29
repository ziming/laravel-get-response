<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Taxes;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get a single tax by ID
 *
 * GET /shops/{shopId}/taxes/{taxId}
 */
class GetTaxByIdRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly string $shopId,
        protected readonly string $taxId,
        protected readonly array $fields = [],
    ) {}

    public function resolveEndpoint(): string
    {
        return '/shops/'.$this->shopId.'/taxes/'.$this->taxId;
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'fields' => implode(',', $this->fields),
        ]);
    }
}
