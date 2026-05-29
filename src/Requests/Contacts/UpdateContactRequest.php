<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Contacts;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Update contact details
 *
 * POST /contacts/{contactId}
 */
class UpdateContactRequest extends Request implements HasBody
{
    protected Method $method = Method::POST;

    use HasJsonBody;

    public function __construct(
        protected readonly string $contactId,
        protected readonly ?string $name = null,
        protected readonly ?string $origin = null,
        protected readonly ?string $timeZone = null,
        protected readonly ?string $activities = null,
        protected readonly ?string $changedOn = null,
        protected readonly ?string $createdOn = null,
        protected readonly ?array $campaign = null,
        protected readonly ?string $email = null,
        protected readonly ?string $dayOfCycle = null,
        protected readonly ?float $scoring = null,
        protected readonly ?int $engagementScore = null,
        protected readonly ?string $href = null,
        protected readonly ?string $note = null,
        protected readonly ?array $tags = null,
        protected readonly ?array $customFieldValues = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/contacts/'.$this->contactId;
    }

    protected function defaultBody(): array
    {
        return array_filter([
            'name' => $this->name,
            'origin' => $this->origin,
            'timeZone' => $this->timeZone,
            'activities' => $this->activities,
            'changedOn' => $this->changedOn,
            'createdOn' => $this->createdOn,
            'campaign' => $this->campaign,
            'email' => $this->email,
            'dayOfCycle' => $this->dayOfCycle,
            'scoring' => $this->scoring,
            'engagementScore' => $this->engagementScore,
            'href' => $this->href,
            'note' => $this->note,
            'tags' => $this->tags,
            'customFieldValues' => $this->customFieldValues,
        ], static fn ($value): bool => $value !== null);
    }
}
