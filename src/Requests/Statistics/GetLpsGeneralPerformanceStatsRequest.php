<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Statistics;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get details for landing page statistics
 *
 * GET /statistics/lps/{lpsId}/performance
 */
class GetLpsGeneralPerformanceStatsRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly string $lpsId,
        protected readonly array $queryParameters = [],
        protected readonly array $fields = [],
    ) {}

    public function resolveEndpoint(): string
    {
        return '/statistics/lps/'.$this->lpsId.'/performance';
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'query' => $this->queryParameters,
            'fields' => implode(',', $this->fields),
        ]);
    }
}
