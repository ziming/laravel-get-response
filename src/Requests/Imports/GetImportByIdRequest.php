<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Imports;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get import details by ID.
 *
 * GET /imports/{importId}
 */
class GetImportByIdRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly string $importId,
        protected readonly array $fields = [],
    ) {}

    public function resolveEndpoint(): string
    {
        return '/imports/'.$this->importId;
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'fields' => implode(',', $this->fields),
        ]);
    }
}
