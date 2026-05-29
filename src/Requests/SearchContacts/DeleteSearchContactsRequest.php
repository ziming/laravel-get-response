<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\SearchContacts;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Delete search contacts
 *
 * DELETE /search-contacts/{searchContactId}
 */
class DeleteSearchContactsRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(
        protected readonly string $searchContactId,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/search-contacts/'.$this->searchContactId;
    }
}
