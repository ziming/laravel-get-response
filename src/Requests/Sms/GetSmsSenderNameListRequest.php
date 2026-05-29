<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Sms;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get a list of SMS sender names
 *
 * GET /sms/sender-names
 */
class GetSmsSenderNameListRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly array $queryParameters = [],
        protected readonly array $fields = [],
    ) {}

    public function resolveEndpoint(): string
    {
        return '/sms/sender-names';
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'query' => $this->queryParameters,
            'fields' => implode(',', $this->fields),
        ]);
    }
}
