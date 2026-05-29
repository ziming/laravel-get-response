<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\TransactionalEmails;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Send transactional email
 *
 * POST /transactional-emails
 */
class CreateTransactionalEmailRequest extends Request implements HasBody
{
    protected Method $method = Method::POST;

    use HasJsonBody;

    public function __construct(
        protected readonly array $fromField,
        protected readonly array $recipients,
        protected readonly string $contentType,
        protected readonly ?array $replyTo = null,
        protected readonly ?array $tag = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/transactional-emails';
    }

    protected function defaultBody(): array
    {
        return array_filter([
            'fromField' => $this->fromField,
            'recipients' => $this->recipients,
            'contentType' => $this->contentType,
            'replyTo' => $this->replyTo,
            'tag' => $this->tag,
        ], static fn ($value): bool => $value !== null);
    }
}
