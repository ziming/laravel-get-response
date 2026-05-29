<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Taxes;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Delete tax by ID
 *
 * DELETE /shops/{shopId}/taxes/{taxId}
 */
class DeleteTaxRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(
        protected readonly string $shopId,
        protected readonly string $taxId,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/shops/'.$this->shopId.'/taxes/'.$this->taxId;
    }
}
