<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\SearchContacts;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Search contacts using conditions
 *
 * POST /search-contacts/contacts
 */
class GetContactsFromSearchContactsConditionsRequest extends Request implements HasBody
{
    protected Method $method = Method::POST;

    use HasJsonBody;

    public function __construct(
        protected readonly array $subscribersType,
        protected readonly string $sectionLogicOperator,
        protected readonly array $section,
        protected readonly array $sortParameters = [],
        protected readonly array $fields = [],
        protected readonly ?int $perPage = null,
        protected readonly ?int $page = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/search-contacts/contacts';
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'sort' => $this->sortParameters,
            'fields' => implode(',', $this->fields),
            'perPage' => $this->perPage,
            'page' => $this->page,
        ]);
    }

    protected function defaultBody(): array
    {
        return [
            'subscribersType' => $this->subscribersType,
            'sectionLogicOperator' => $this->sectionLogicOperator,
            'section' => $this->section,
        ];
    }
}
