<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\TransactionalEmails;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get transactional email details by transactional email ID
 *
 * GET /transactional-emails/{transactionalEmailId}
 */
class GetTransactionalEmailsByIdRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly string $transactionalEmailId,
        protected readonly array $fields = [],
    ) {}

    public function resolveEndpoint(): string
    {
        return '/transactional-emails/'.$this->transactionalEmailId;
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'fields' => implode(',', $this->fields),
        ]);
    }
}
