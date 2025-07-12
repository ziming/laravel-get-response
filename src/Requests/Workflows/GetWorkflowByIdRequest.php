<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Workflows;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetWorkflowByIdRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly string $workflowId,
        protected readonly array $fields = [],
    ) {}

    protected function defaultQuery(): array
    {
        return array_filter([
            'fields' => implode(',', $this->fields),
        ]);
    }

    public function resolveEndpoint(): string
    {
        return '/workflows/'.$this->workflowId;
    }
}
