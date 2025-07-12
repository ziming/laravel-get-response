<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Sms;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetSmsAutomationMessageByIdRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly string $smsAutomationMessageId,
        protected readonly array $fields = [],
    ) {}

    protected function defaultQuery(): array
    {
        return array_filter([
            'fields' => implode(',', $this->fields),
        ]);
    }

    public function resolveEndpoint(): string
    {
        return '/sms-automation/'.$this->smsAutomationMessageId;
    }
}
