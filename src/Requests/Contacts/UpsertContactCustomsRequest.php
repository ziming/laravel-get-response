<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Contacts;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Upsert the custom fields of a contact
 *
 * POST /contacts/{contactId}/custom-fields
 */
class UpsertContactCustomsRequest extends Request implements HasBody
{
    protected Method $method = Method::POST;

    use HasJsonBody;

    public function __construct(
        protected readonly string $contactId,
        protected readonly array $customFieldValues,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/contacts/'.$this->contactId.'/custom-fields';
    }

    protected function defaultBody(): array
    {
        return [
            'customFieldValues' => $this->customFieldValues,
        ];
    }
}
