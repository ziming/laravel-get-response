<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Contacts;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Upsert the tags of a contact
 *
 * POST /contacts/{contactId}/tags
 */
class UpsertTagsRequest extends Request implements HasBody
{
    protected Method $method = Method::POST;

    use HasJsonBody;

    public function __construct(
        protected readonly string $contactId,
        protected readonly array $tags,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/contacts/'.$this->contactId.'/tags';
    }

    protected function defaultBody(): array
    {
        return [
            'tags' => $this->tags,
        ];
    }
}
