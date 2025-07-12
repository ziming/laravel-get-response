<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\CustomReports;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetCustomReportByIdRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly string $customReportId,
        protected readonly array  $fields = [],
    ) {
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'fields' => implode(',', $this->fields),
        ]);
    }

    public function resolveEndpoint(): string
    {
        return '/reports/' . $this->customReportId;
    }
}
