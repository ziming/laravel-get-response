<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\FormsAndPopups;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get the list of forms and popups
 *
 * GET /popups
 */
class GetPopupsListRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly array $queryParameters = [],
        protected readonly array $sortParameters = [],
        protected readonly array $stats = [],
        protected readonly array $fields = [],
        protected readonly ?int $perPage = null,
        protected readonly ?int $page = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/popups';
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'query' => $this->queryParameters,
            'sort' => $this->sortParameters,
            'stats' => $this->stats,
            'fields' => implode(',', $this->fields),
            'perPage' => $this->perPage,
            'page' => $this->page,
        ]);
    }
}
