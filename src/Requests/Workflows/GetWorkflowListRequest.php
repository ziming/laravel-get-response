<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Workflows;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get workflows
 *
 * GET /workflow
 */
class GetWorkflowListRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly array $fields = [],
        protected readonly ?int $perPage = null,
        protected readonly ?int $page = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/workflow';
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'fields' => implode(',', $this->fields),
            'perPage' => $this->perPage,
            'page' => $this->page,
        ]);
    }
}
