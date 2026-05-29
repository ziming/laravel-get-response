<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\TransactionalEmails;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get the overall statistics of transactional emails
 *
 * GET /transactional-emails/statistics
 */
class GetTransactionalEmailsStatisticsRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly array $queryParameters = [],
        protected readonly array $fields = [],
    ) {}

    public function resolveEndpoint(): string
    {
        return '/transactional-emails/statistics';
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'query' => $this->queryParameters,
            'fields' => implode(',', $this->fields),
        ]);
    }
}
