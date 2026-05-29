<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\CustomFields;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Update the custom field definition
 *
 * POST /custom-fields/{customFieldId}
 */
class UpdateCustomFieldRequest extends Request implements HasBody
{
    protected Method $method = Method::POST;

    use HasJsonBody;

    public function __construct(
        protected readonly string $customFieldId,
        protected readonly string $hidden,
        protected readonly array $values,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/custom-fields/'.$this->customFieldId;
    }

    protected function defaultBody(): array
    {
        return [
            'hidden' => $this->hidden,
            'values' => $this->values,
        ];
    }
}
