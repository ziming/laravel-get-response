<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Automation\Workflows;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class UpdateWorkflowRequest extends Request
{
    protected Method $method = Method::PUT;

    public function __construct(
        protected readonly string $workflowId,

        // 'active', 'inactive', or 'incomplete'
        protected readonly string $status,
    ) {}

    protected function defaultBody(): array
    {
        return [
            'status' => $this->status,
        ];
    }

    public function resolveEndpoint(): string
    {
        return '/workflows/'.$this->workflowId;
    }
}
