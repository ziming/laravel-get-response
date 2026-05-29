<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\RssNewsletters;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Update RSS newsletter
 *
 * POST /rss-newsletters/{rssNewsletterId}
 */
class UpdateRssNewsletterRequest extends Request implements HasBody
{
    protected Method $method = Method::POST;

    use HasJsonBody;

    public function __construct(
        protected readonly string $rssNewsletterId,
        protected readonly ?array $flags = null,
        protected readonly ?string $href = null,
        protected readonly ?string $rssFeedUrl = null,
        protected readonly ?string $subject = null,
        protected readonly ?string $name = null,
        protected readonly ?string $status = null,
        protected readonly ?string $editor = null,
        protected readonly ?array $fromField = null,
        protected readonly ?array $replyTo = null,
        protected readonly ?array $content = null,
        protected readonly ?array $sendSettings = null,
        protected readonly ?string $createdOn = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/rss-newsletters/'.$this->rssNewsletterId;
    }

    protected function defaultBody(): array
    {
        return array_filter([
            'flags' => $this->flags,
            'href' => $this->href,
            'rssFeedUrl' => $this->rssFeedUrl,
            'subject' => $this->subject,
            'name' => $this->name,
            'status' => $this->status,
            'editor' => $this->editor,
            'fromField' => $this->fromField,
            'replyTo' => $this->replyTo,
            'content' => $this->content,
            'sendSettings' => $this->sendSettings,
            'createdOn' => $this->createdOn,
        ], static fn ($value): bool => $value !== null);
    }
}
