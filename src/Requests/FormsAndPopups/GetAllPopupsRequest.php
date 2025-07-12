<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\FormsAndPopups;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetAllPopupsRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly array $queryParameters = [],
        protected readonly array $statsParameters = [],
        protected readonly array $sortParameters = [],
        protected readonly array $fields = [],
        protected readonly int $page = 1,
        protected readonly int $perPage = 100,
        protected readonly bool $withStatistics = false,
    ) {}

    protected function defaultQuery(): array
    {
        return array_filter([
            'query' => $this->queryParameters,
            'stats' => $this->statsParameters,
            'sort' => $this->sortParameters,
            'fields' => implode(',', $this->fields),
            'page' => $this->page,
            'perPage' => $this->perPage,
        ]);
    }

    public function resolveEndpoint(): string
    {
        return '/popups';
    }
}
