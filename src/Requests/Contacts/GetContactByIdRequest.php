<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Contacts;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get contact details by contact ID
 *
 * GET /contacts/{contactId}
 */
class GetContactByIdRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly string $contactId,
        protected readonly array $fields = [],
    ) {}

    public function resolveEndpoint(): string
    {
        return '/contacts/'.$this->contactId;
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'fields' => implode(',', $this->fields),
        ]);
    }
}
