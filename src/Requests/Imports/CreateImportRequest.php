<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Imports;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Schedule a new contact import
 *
 * POST /imports
 */
class CreateImportRequest extends Request implements HasBody
{
    protected Method $method = Method::POST;

    use HasJsonBody;

    public function __construct(
        protected readonly string $campaignId,
        protected readonly array $fieldMapping,
        protected readonly array $contacts,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/imports';
    }

    protected function defaultBody(): array
    {
        return [
            'campaignId' => $this->campaignId,
            'fieldMapping' => $this->fieldMapping,
            'contacts' => $this->contacts,
        ];
    }
}
