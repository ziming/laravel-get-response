<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Campaigns;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get the statistics summary for selected campaigns
 *
 * GET /campaigns/statistics/summary
 */
class GetCampaignStatisticsSummaryRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly array $queryParameters = [],
    ) {}

    public function resolveEndpoint(): string
    {
        return '/campaigns/statistics/summary';
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'query' => $this->queryParameters,
        ]);
    }
}
