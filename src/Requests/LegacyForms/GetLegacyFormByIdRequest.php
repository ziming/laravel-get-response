<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\LegacyForms;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get Legacy Form by ID.
 *
 * GET /webforms/{webformId}
 */
class GetLegacyFormByIdRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly string $webformId,
        protected readonly array $fields = [],
    ) {}

    public function resolveEndpoint(): string
    {
        return '/webforms/'.$this->webformId;
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'fields' => implode(',', $this->fields),
        ]);
    }
}
