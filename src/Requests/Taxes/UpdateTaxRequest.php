<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Taxes;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Update tax
 *
 * POST /shops/{shopId}/taxes/{taxId}
 */
class UpdateTaxRequest extends Request implements HasBody
{
    protected Method $method = Method::POST;

    use HasJsonBody;

    public function __construct(
        protected readonly string $shopId,
        protected readonly string $taxId,
        protected readonly ?string $href = null,
        protected readonly ?string $name = null,
        protected readonly ?float $rate = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/shops/'.$this->shopId.'/taxes/'.$this->taxId;
    }

    protected function defaultBody(): array
    {
        return array_filter([
            'href' => $this->href,
            'name' => $this->name,
            'rate' => $this->rate,
        ], static fn ($value): bool => $value !== null);
    }
}
