<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\RssNewsletters;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get RSS newsletter by ID
 *
 * GET /rss-newsletters/{rssNewsletterId}
 */
class GetRssNewsletterByIdRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly string $rssNewsletterId,
        protected readonly array $fields = [],
    ) {}

    public function resolveEndpoint(): string
    {
        return '/rss-newsletters/'.$this->rssNewsletterId;
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'fields' => implode(',', $this->fields),
        ]);
    }
}
