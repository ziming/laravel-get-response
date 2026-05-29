<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\RssNewsletters;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create RSS newsletter
 *
 * POST /rss-newsletters
 */
class CreateRssNewsletterRequest extends Request implements HasBody
{
    protected Method $method = Method::POST;

    use HasJsonBody;

    public function __construct(
        protected readonly string $rssFeedUrl,
        protected readonly string $subject,
        protected readonly string $status,
        protected readonly array $fromField,
        protected readonly array $content,
        protected readonly array $sendSettings,
        protected readonly ?array $flags = null,
        protected readonly ?string $rssNewsletterId = null,
        protected readonly ?string $href = null,
        protected readonly ?string $name = null,
        protected readonly ?string $editor = null,
        protected readonly ?array $replyTo = null,
        protected readonly ?string $createdOn = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/rss-newsletters';
    }

    protected function defaultBody(): array
    {
        return array_filter([
            'rssFeedUrl' => $this->rssFeedUrl,
            'subject' => $this->subject,
            'status' => $this->status,
            'fromField' => $this->fromField,
            'content' => $this->content,
            'sendSettings' => $this->sendSettings,
            'flags' => $this->flags,
            'rssNewsletterId' => $this->rssNewsletterId,
            'href' => $this->href,
            'name' => $this->name,
            'editor' => $this->editor,
            'replyTo' => $this->replyTo,
            'createdOn' => $this->createdOn,
        ], static fn ($value): bool => $value !== null);
    }
}
