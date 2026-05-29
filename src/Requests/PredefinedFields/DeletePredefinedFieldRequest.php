<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\PredefinedFields;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Delete a predefined field
 *
 * DELETE /predefined-fields/{predefinedFieldId}
 */
class DeletePredefinedFieldRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(
        protected readonly string $predefinedFieldId,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/predefined-fields/'.$this->predefinedFieldId;
    }
}
