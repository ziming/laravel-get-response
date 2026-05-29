<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Contacts;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get contacts from a single campaign
 *
 * GET /campaigns/{campaignId}/contacts
 */
class GetContactsFromCampaignRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly string $campaignId,
        protected readonly array $queryParameters = [],
        protected readonly array $sortParameters = [],
        protected readonly array $fields = [],
        protected readonly ?int $perPage = null,
        protected readonly ?int $page = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/campaigns/'.$this->campaignId.'/contacts';
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'query' => $this->queryParameters,
            'sort' => $this->sortParameters,
            'fields' => implode(',', $this->fields),
            'perPage' => $this->perPage,
            'page' => $this->page,
        ]);
    }
}
