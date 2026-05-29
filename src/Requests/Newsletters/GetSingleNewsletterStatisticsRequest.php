<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Newsletters;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * The statistics of single newsletter
 *
 * GET /newsletters/{newsletterId}/statistics
 */
class GetSingleNewsletterStatisticsRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly string $newsletterId,
        protected readonly array $queryParameters = [],
        protected readonly array $fields = [],
        protected readonly ?int $perPage = null,
        protected readonly ?int $page = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/newsletters/'.$this->newsletterId.'/statistics';
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'query' => $this->queryParameters,
            'fields' => implode(',', $this->fields),
            'perPage' => $this->perPage,
            'page' => $this->page,
        ]);
    }
}
