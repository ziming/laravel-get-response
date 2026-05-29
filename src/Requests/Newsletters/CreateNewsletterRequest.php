<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Newsletters;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create newsletter
 *
 * POST /newsletters
 */
class CreateNewsletterRequest extends Request implements HasBody
{
    protected Method $method = Method::POST;

    use HasJsonBody;

    public function __construct(
        protected readonly array $content,
        protected readonly string $subject,
        protected readonly array $fromField,
        protected readonly array $campaign,
        protected readonly array $sendSettings,
        protected readonly ?array $flags = null,
        protected readonly ?string $name = null,
        protected readonly ?string $type = null,
        protected readonly ?array $replyTo = null,
        protected readonly ?array $attachments = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/newsletters';
    }

    protected function defaultBody(): array
    {
        return array_filter([
            'content' => $this->content,
            'subject' => $this->subject,
            'fromField' => $this->fromField,
            'campaign' => $this->campaign,
            'sendSettings' => $this->sendSettings,
            'flags' => $this->flags,
            'name' => $this->name,
            'type' => $this->type,
            'replyTo' => $this->replyTo,
            'attachments' => $this->attachments,
        ], static fn ($value): bool => $value !== null);
    }
}
