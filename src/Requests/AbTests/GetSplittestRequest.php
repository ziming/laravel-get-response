<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\AbTests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get a single A/B test.
 *
 * GET /splittests/{splittestId}
 */
class GetSplittestRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly string $splittestId,
        protected readonly array $fields = [],
    ) {}

    public function resolveEndpoint(): string
    {
        return '/splittests/'.$this->splittestId;
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'fields' => implode(',', $this->fields),
        ]);
    }
}
