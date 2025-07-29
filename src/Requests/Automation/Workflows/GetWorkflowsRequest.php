<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Automation\Workflows;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetWorkflowsRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly array $fields = [],
        protected readonly int $perPage = 100,

        protected readonly int $page = 1,
    ) {}

    protected function defaultQuery(): array
    {
        return array_filter([
            'fields' => implode(',', $this->fields),
            'perPage' => $this->perPage,
            'page' => $this->page,
        ]);
    }

    public function resolveEndpoint(): string
    {
        return '/workflows';
    }
}
