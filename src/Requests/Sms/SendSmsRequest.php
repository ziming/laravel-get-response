<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Sms;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Send an SMS message
 *
 * POST /sms
 */
class SendSmsRequest extends Request implements HasBody
{
    protected Method $method = Method::POST;

    use HasJsonBody;

    public function __construct(
        protected readonly string $name,
        protected readonly string $content,
        protected readonly string $recipientsType,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/sms';
    }

    protected function defaultBody(): array
    {
        return [
            'name' => $this->name,
            'content' => $this->content,
            'recipientsType' => $this->recipientsType,
        ];
    }
}
