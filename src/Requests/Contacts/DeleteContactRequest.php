<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Contacts;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Delete a contact by contact ID
 *
 * DELETE /contacts/{contactId}
 */
class DeleteContactRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(
        protected readonly string $contactId,
        protected readonly ?string $messageId = null,
        protected readonly ?string $ipAddress = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/contacts/'.$this->contactId;
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'messageId' => $this->messageId,
            'ipAddress' => $this->ipAddress,
        ]);
    }
}
