<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Contacts;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get a list of contact activities
 *
 * GET /contacts/{contactId}/activities
 */
class GetActivitiesRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly string $contactId,
        protected readonly array $queryParameters = [],
        protected readonly array $fields = [],
        protected readonly ?int $perPage = null,
        protected readonly ?int $page = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/contacts/'.$this->contactId.'/activities';
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'query' => $this->queryParameters,
            'fields' => implode(',', $this->fields),
            'perPage' => $this->perPage,
            'page' => $this->page,
        ]);
    }
}
