<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\CustomFields;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get a single custom field definition by the custom field ID
 *
 * GET /custom-fields/{customFieldId}
 */
class GetCustomFieldByIdRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly string $customFieldId,
        protected readonly array $fields = [],
    ) {}

    public function resolveEndpoint(): string
    {
        return '/custom-fields/'.$this->customFieldId;
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'fields' => implode(',', $this->fields),
        ]);
    }
}
