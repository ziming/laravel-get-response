<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Taxes;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create tax
 *
 * POST /shops/{shopId}/taxes
 */
class CreateTaxRequest extends Request implements HasBody
{
    protected Method $method = Method::POST;

    use HasJsonBody;

    public function __construct(
        protected readonly string $shopId,
        protected readonly string $name,
        protected readonly float $rate,
        protected readonly ?string $taxId = null,
        protected readonly ?string $href = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/shops/'.$this->shopId.'/taxes';
    }

    protected function defaultBody(): array
    {
        return array_filter([
            'name' => $this->name,
            'rate' => $this->rate,
            'taxId' => $this->taxId,
            'href' => $this->href,
        ], static fn ($value): bool => $value !== null);
    }
}
