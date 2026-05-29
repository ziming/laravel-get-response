<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Statistics;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get the ecommerce general performance statistics
 *
 * GET /statistics/ecommerce/performance
 */
class GetGeneralPerformanceStatsRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly array $queryParameters = [],
        protected readonly array $fields = [],
    ) {}

    public function resolveEndpoint(): string
    {
        return '/statistics/ecommerce/performance';
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'query' => $this->queryParameters,
            'fields' => implode(',', $this->fields),
        ]);
    }
}
