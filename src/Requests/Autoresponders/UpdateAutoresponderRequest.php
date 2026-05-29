<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Autoresponders;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Update autoresponder
 *
 * POST /autoresponders/{autoresponderId}
 */
class UpdateAutoresponderRequest extends Request implements HasBody
{
    protected Method $method = Method::POST;

    use HasJsonBody;

    public function __construct(
        protected readonly string $autoresponderId,
        protected readonly ?array $sendSettings = null,
        protected readonly ?string $href = null,
        protected readonly ?string $name = null,
        protected readonly ?string $subject = null,
        protected readonly ?string $campaignId = null,
        protected readonly ?string $status = null,
        protected readonly ?array $fromField = null,
        protected readonly ?array $replyTo = null,
        protected readonly ?array $content = null,
        protected readonly ?array $flags = null,
        protected readonly ?array $triggerSettings = null,
        protected readonly ?array $statistics = null,
        protected readonly ?string $createdOn = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/autoresponders/'.$this->autoresponderId;
    }

    protected function defaultBody(): array
    {
        return array_filter([
            'sendSettings' => $this->sendSettings,
            'href' => $this->href,
            'name' => $this->name,
            'subject' => $this->subject,
            'campaignId' => $this->campaignId,
            'status' => $this->status,
            'fromField' => $this->fromField,
            'replyTo' => $this->replyTo,
            'content' => $this->content,
            'flags' => $this->flags,
            'triggerSettings' => $this->triggerSettings,
            'statistics' => $this->statistics,
            'createdOn' => $this->createdOn,
        ], static fn ($value): bool => $value !== null);
    }
}
