<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\SearchContacts;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get search contacts by contact ID.
 *
 * GET /search-contacts/{searchContactId}
 */
class GetSearchContactsByIdRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly string $searchContactId,
        protected readonly array $fields = [],
    ) {}

    public function resolveEndpoint(): string
    {
        return '/search-contacts/'.$this->searchContactId;
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'fields' => implode(',', $this->fields),
        ]);
    }
}
