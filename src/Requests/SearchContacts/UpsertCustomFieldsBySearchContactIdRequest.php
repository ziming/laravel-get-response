<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\SearchContacts;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Upsert custom fields by search contacts
 *
 * POST /search-contacts/{searchContactId}/custom-fields
 */
class UpsertCustomFieldsBySearchContactIdRequest extends Request implements HasBody
{
    protected Method $method = Method::POST;

    use HasJsonBody;

    public function __construct(
        protected readonly string $searchContactId,
        protected readonly array $customFieldValues,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/search-contacts/'.$this->searchContactId.'/custom-fields';
    }

    protected function defaultBody(): array
    {
        return [
            'customFieldValues' => $this->customFieldValues,
        ];
    }
}
