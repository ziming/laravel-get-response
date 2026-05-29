<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Newsletters;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get newsletter activities
 *
 * GET /newsletters/{newsletterId}/activities
 */
class GetNewsletterActivitiesRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly string $newsletterId,
        protected readonly array $queryParameters = [],
        protected readonly array $sortParameters = [],
        protected readonly ?int $perPage = null,
        protected readonly ?int $page = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/newsletters/'.$this->newsletterId.'/activities';
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'query' => $this->queryParameters,
            'sort' => $this->sortParameters,
            'perPage' => $this->perPage,
            'page' => $this->page,
        ]);
    }
}
