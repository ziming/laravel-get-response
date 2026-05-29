<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Statistics;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get details for the SMS message statistics
 *
 * GET /statistics/sms/{smsId}
 */
class GetSmsStatsRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly string $smsId,
        protected readonly array $queryParameters = [],
        protected readonly array $fields = [],
    ) {}

    public function resolveEndpoint(): string
    {
        return '/statistics/sms/'.$this->smsId;
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'query' => $this->queryParameters,
            'fields' => implode(',', $this->fields),
        ]);
    }
}
