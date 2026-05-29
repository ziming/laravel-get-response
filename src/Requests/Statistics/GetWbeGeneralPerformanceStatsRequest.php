<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Statistics;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get details for website statistics
 *
 * GET /statistics/wbe/{websiteId}/performance
 */
class GetWbeGeneralPerformanceStatsRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly string $websiteId,
        protected readonly array $queryParameters = [],
        protected readonly array $fields = [],
    ) {}

    public function resolveEndpoint(): string
    {
        return '/statistics/wbe/'.$this->websiteId.'/performance';
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'query' => $this->queryParameters,
            'fields' => implode(',', $this->fields),
        ]);
    }
}
