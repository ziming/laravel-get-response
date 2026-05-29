<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Sms;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get a single automated SMS message by its ID.
 *
 * GET /sms-automation/{smsId}
 */
class GetSmsAutomationByIdRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly string $smsId,
        protected readonly array $fields = [],
    ) {}

    public function resolveEndpoint(): string
    {
        return '/sms-automation/'.$this->smsId;
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'fields' => implode(',', $this->fields),
        ]);
    }
}
