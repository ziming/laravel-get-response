<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\CustomReports;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get a single custom report by ID
 *
 * GET /custom-reports/{customReportId}
 */
class GetCustomReportDetailsRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly string $customReportId,
        protected readonly array $fields = [],
    ) {}

    public function resolveEndpoint(): string
    {
        return '/custom-reports/'.$this->customReportId;
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'fields' => implode(',', $this->fields),
        ]);
    }
}
