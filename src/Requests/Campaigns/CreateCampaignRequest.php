<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Campaigns;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create a campaign
 *
 * POST /campaigns
 */
class CreateCampaignRequest extends Request implements HasBody
{
    protected Method $method = Method::POST;

    use HasJsonBody;

    public function __construct(
        protected readonly string $name,
        protected readonly ?string $campaignId = null,
        protected readonly ?string $techName = null,
        protected readonly ?string $languageCode = null,
        protected readonly ?string $isDefault = null,
        protected readonly ?string $createdOn = null,
        protected readonly ?string $href = null,
        protected readonly ?array $postal = null,
        protected readonly ?array $confirmation = null,
        protected readonly ?array $optinTypes = null,
        protected readonly ?array $subscriptionNotifications = null,
        protected readonly ?array $profile = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/campaigns';
    }

    protected function defaultBody(): array
    {
        return array_filter([
            'name' => $this->name,
            'campaignId' => $this->campaignId,
            'techName' => $this->techName,
            'languageCode' => $this->languageCode,
            'isDefault' => $this->isDefault,
            'createdOn' => $this->createdOn,
            'href' => $this->href,
            'postal' => $this->postal,
            'confirmation' => $this->confirmation,
            'optinTypes' => $this->optinTypes,
            'subscriptionNotifications' => $this->subscriptionNotifications,
            'profile' => $this->profile,
        ], static fn ($value): bool => $value !== null);
    }
}
