<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\PredefinedFields;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get a predefined field by ID
 *
 * GET /predefined-fields/{predefinedFieldId}
 */
class GetPredefinedFieldByIdRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly string $predefinedFieldId,
        protected readonly array $fields = [],
    ) {}

    public function resolveEndpoint(): string
    {
        return '/predefined-fields/'.$this->predefinedFieldId;
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'fields' => implode(',', $this->fields),
        ]);
    }
}
