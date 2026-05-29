<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\TransactionalEmailTemplates;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Delete transactional email template
 *
 * DELETE /transactional-emails/templates/{transactionalEmailTemplateId}
 */
class DeleteTransactionalEmailsTemplateRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(
        protected readonly string $transactionalEmailTemplateId,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/transactional-emails/templates/'.$this->transactionalEmailTemplateId;
    }
}
