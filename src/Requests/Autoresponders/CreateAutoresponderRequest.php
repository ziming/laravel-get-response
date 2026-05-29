<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Autoresponders;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create autoresponder
 *
 * POST /autoresponders
 */
class CreateAutoresponderRequest extends Request implements HasBody
{
    protected Method $method = Method::POST;

    use HasJsonBody;

    public function __construct(
        protected readonly array $sendSettings,
        protected readonly string $subject,
        protected readonly string $status,
        protected readonly array $content,
        protected readonly array $triggerSettings,
        protected readonly ?string $autoresponderId = null,
        protected readonly ?string $href = null,
        protected readonly ?string $name = null,
        protected readonly ?string $campaignId = null,
        protected readonly ?array $fromField = null,
        protected readonly ?array $replyTo = null,
        protected readonly ?array $flags = null,
        protected readonly ?array $statistics = null,
        protected readonly ?string $createdOn = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/autoresponders';
    }

    protected function defaultBody(): array
    {
        return array_filter([
            'sendSettings' => $this->sendSettings,
            'subject' => $this->subject,
            'status' => $this->status,
            'content' => $this->content,
            'triggerSettings' => $this->triggerSettings,
            'autoresponderId' => $this->autoresponderId,
            'href' => $this->href,
            'name' => $this->name,
            'campaignId' => $this->campaignId,
            'fromField' => $this->fromField,
            'replyTo' => $this->replyTo,
            'flags' => $this->flags,
            'statistics' => $this->statistics,
            'createdOn' => $this->createdOn,
        ], static fn ($value): bool => $value !== null);
    }
}
