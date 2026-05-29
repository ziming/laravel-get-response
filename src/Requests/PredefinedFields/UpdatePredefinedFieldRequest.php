<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\PredefinedFields;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Update a predefined field
 *
 * POST /predefined-fields/{predefinedFieldId}
 */
class UpdatePredefinedFieldRequest extends Request implements HasBody
{
    protected Method $method = Method::POST;

    use HasJsonBody;

    public function __construct(
        protected readonly string $predefinedFieldId,
        protected readonly string $value,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/predefined-fields/'.$this->predefinedFieldId;
    }

    protected function defaultBody(): array
    {
        return [
            'value' => $this->value,
        ];
    }
}
