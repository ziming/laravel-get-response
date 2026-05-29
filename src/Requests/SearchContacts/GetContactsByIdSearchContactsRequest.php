<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\SearchContacts;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get contacts by search contacts ID
 *
 * GET /search-contacts/{searchContactId}/contacts
 */
class GetContactsByIdSearchContactsRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly string $searchContactId,
        protected readonly array $sortParameters = [],
        protected readonly array $fields = [],
        protected readonly ?int $perPage = null,
        protected readonly ?int $page = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/search-contacts/'.$this->searchContactId.'/contacts';
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
}
