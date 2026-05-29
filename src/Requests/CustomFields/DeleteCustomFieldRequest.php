<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\CustomFields;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Delete a single custom field definition
 *
 * DELETE /custom-fields/{customFieldId}
 */
class DeleteCustomFieldRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(
        protected readonly string $customFieldId,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/custom-fields/'.$this->customFieldId;
    }
}
