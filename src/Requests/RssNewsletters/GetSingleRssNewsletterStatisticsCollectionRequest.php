<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\RssNewsletters;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get RSS newsletter statistics by ID
 *
 * GET /rss-newsletters/{rssNewsletterId}/statistics
 */
class GetSingleRssNewsletterStatisticsCollectionRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly string $rssNewsletterId,
        protected readonly array $queryParameters = [],
        protected readonly array $fields = [],
        protected readonly ?int $perPage = null,
        protected readonly ?int $page = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/rss-newsletters/'.$this->rssNewsletterId.'/statistics';
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
