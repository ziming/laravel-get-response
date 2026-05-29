<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Workflows;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Update workflow
 *
 * POST /workflow/{workflowId}
 */
class UpdateWorkflowRequest extends Request implements HasBody
{
    protected Method $method = Method::POST;

    use HasJsonBody;

    public function __construct(
        protected readonly string $workflowId,
        protected readonly string $status,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/workflow/'.$this->workflowId;
    }

    protected function defaultBody(): array
    {
        return [
            'status' => $this->status,
        ];
    }
}
