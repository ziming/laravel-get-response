<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Forms;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get form by ID
 *
 * GET /forms/{formId}
 */
class GetFormRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly string $formId,
        protected readonly array $fields = [],
    ) {}

    public function resolveEndpoint(): string
    {
        return '/forms/'.$this->formId;
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'fields' => implode(',', $this->fields),
        ]);
    }
}
