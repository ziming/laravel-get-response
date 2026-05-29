<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Campaigns;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get a single campaign by the campaign ID
 *
 * GET /campaigns/{campaignId}
 */
class GetCampaignRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly string $campaignId,
        protected readonly array $fields = [],
    ) {}

    public function resolveEndpoint(): string
    {
        return '/campaigns/'.$this->campaignId;
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'fields' => implode(',', $this->fields),
        ]);
    }
}
