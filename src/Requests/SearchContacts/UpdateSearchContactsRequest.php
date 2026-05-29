<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\SearchContacts;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Update search contacts
 *
 * POST /search-contacts/{searchContactId}
 */
class UpdateSearchContactsRequest extends Request implements HasBody
{
    protected Method $method = Method::POST;

    use HasJsonBody;

    public function __construct(
        protected readonly string $searchContactId,
        protected readonly string $sectionLogicOperator,
        protected readonly array $section,
        protected readonly string $name,
        protected readonly ?array $subscribersType = null,
        protected readonly ?string $createdOn = null,
        protected readonly ?string $href = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/search-contacts/'.$this->searchContactId;
    }

    protected function defaultBody(): array
    {
        return array_filter([
            'sectionLogicOperator' => $this->sectionLogicOperator,
            'section' => $this->section,
            'name' => $this->name,
            'subscribersType' => $this->subscribersType,
            'createdOn' => $this->createdOn,
            'href' => $this->href,
        ], static fn ($value): bool => $value !== null);
    }
}
