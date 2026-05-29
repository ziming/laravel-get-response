<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\TransactionalEmailTemplates;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get a single template by ID
 *
 * GET /transactional-emails/templates/{transactionalEmailTemplateId}
 */
class GetTransactionalEmailsTemplatesByIdRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly string $transactionalEmailTemplateId,
        protected readonly array $fields = [],
    ) {}

    public function resolveEndpoint(): string
    {
        return '/transactional-emails/templates/'.$this->transactionalEmailTemplateId;
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'fields' => implode(',', $this->fields),
        ]);
    }
}
