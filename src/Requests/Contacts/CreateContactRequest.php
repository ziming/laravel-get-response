<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Contacts;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create a new contact
 *
 * POST /contacts
 */
class CreateContactRequest extends Request implements HasBody
{
    protected Method $method = Method::POST;

    use HasJsonBody;

    public function __construct(
        protected readonly array $campaign,
        protected readonly string $email,
        protected readonly ?string $contactId = null,
        protected readonly ?string $name = null,
        protected readonly ?string $origin = null,
        protected readonly ?string $timeZone = null,
        protected readonly ?string $activities = null,
        protected readonly ?string $changedOn = null,
        protected readonly ?string $createdOn = null,
        protected readonly ?string $dayOfCycle = null,
        protected readonly ?float $scoring = null,
        protected readonly ?int $engagementScore = null,
        protected readonly ?string $href = null,
        protected readonly ?string $ipAddress = null,
        protected readonly ?array $tags = null,
        protected readonly ?array $customFieldValues = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/contacts';
    }

    protected function defaultBody(): array
    {
        return array_filter([
            'campaign' => $this->campaign,
            'email' => $this->email,
            'contactId' => $this->contactId,
            'name' => $this->name,
            'origin' => $this->origin,
            'timeZone' => $this->timeZone,
            'activities' => $this->activities,
            'changedOn' => $this->changedOn,
            'createdOn' => $this->createdOn,
            'dayOfCycle' => $this->dayOfCycle,
            'scoring' => $this->scoring,
            'engagementScore' => $this->engagementScore,
            'href' => $this->href,
            'ipAddress' => $this->ipAddress,
            'tags' => $this->tags,
            'customFieldValues' => $this->customFieldValues,
        ], static fn ($value): bool => $value !== null);
    }
}
