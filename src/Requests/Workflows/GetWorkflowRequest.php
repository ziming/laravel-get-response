<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Workflows;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get workflow by ID
 *
 * GET /workflow/{workflowId}
 */
class GetWorkflowRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly string $workflowId,
        protected readonly array $fields = [],
    ) {}

    public function resolveEndpoint(): string
    {
        return '/workflow/'.$this->workflowId;
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'fields' => implode(',', $this->fields),
        ]);
    }
}
