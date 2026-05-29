<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\RssNewsletters;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Delete RSS newsletter
 *
 * DELETE /rss-newsletters/{rssNewsletterId}
 */
class DeleteRssNewsletterRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(
        protected readonly string $rssNewsletterId,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/rss-newsletters/'.$this->rssNewsletterId;
    }
}
