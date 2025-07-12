<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\CustomReports;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class CreateCustomReportRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected readonly string $name,
        protected readonly string $type,
        protected readonly array $scheduling,
    ) {
    }

    protected function defaultBody(): array
    {
        return [
            'name' => $this->name,
            'type' => $this->type,
            'scheduling' => $this->scheduling,
        ];
    }

    public function resolveEndpoint(): string
    {
        return '/custom-reports';
    }
}
