<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\TransactionalEmailTemplates;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create transactional email template
 *
 * POST /transactional-emails/templates
 */
class CreateTransactionalEmailTemplateRequest extends Request implements HasBody
{
    protected Method $method = Method::POST;

    use HasJsonBody;

    public function __construct(
        protected readonly string $subject,
        protected readonly ?array $content = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/transactional-emails/templates';
    }

    protected function defaultBody(): array
    {
        return array_filter([
            'subject' => $this->subject,
            'content' => $this->content,
        ], static fn ($value): bool => $value !== null);
    }
}
