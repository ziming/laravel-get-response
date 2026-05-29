<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Campaigns;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Returns campaign blocklist masks
 *
 * GET /campaigns/{campaignId}/blocklists
 */
class GetCampaignBlocklistRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly string $campaignId,
        protected readonly array $queryParameters = [],
    ) {}

    public function resolveEndpoint(): string
    {
        return '/campaigns/'.$this->campaignId.'/blocklists';
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'query' => $this->queryParameters,
        ]);
    }
}
