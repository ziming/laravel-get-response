<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\GdprFields;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get GDPR Field details
 *
 * GET /gdpr-fields/{gdprFieldId}
 */
class GetGDPRFieldRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly string $gdprFieldId,
        protected readonly array $fields = [],
    ) {}

    public function resolveEndpoint(): string
    {
        return '/gdpr-fields/'.$this->gdprFieldId;
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'fields' => implode(',', $this->fields),
        ]);
    }
}
