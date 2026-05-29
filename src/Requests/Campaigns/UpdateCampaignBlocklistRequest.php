<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Campaigns;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Updates campaign blocklist masks
 *
 * POST /campaigns/{campaignId}/blocklists
 */
class UpdateCampaignBlocklistRequest extends Request implements HasBody
{
    protected Method $method = Method::POST;

    use HasJsonBody;

    public function __construct(
        protected readonly string $campaignId,
        protected readonly array $masks,
        protected readonly ?string $additionalFlags = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/campaigns/'.$this->campaignId.'/blocklists';
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'additionalFlags' => $this->additionalFlags,
        ]);
    }

    protected function defaultBody(): array
    {
        return [
            'masks' => $this->masks,
        ];
    }
}
