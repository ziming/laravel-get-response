<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Newsletters;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Send the newsletter draft
 *
 * POST /newsletters/send-draft
 */
class SendDraftRequest extends Request implements HasBody
{
    protected Method $method = Method::POST;

    use HasJsonBody;

    public function __construct(
        protected readonly string $messageId,
        protected readonly array $sendSettings,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/newsletters/send-draft';
    }

    protected function defaultBody(): array
    {
        return [
            'messageId' => $this->messageId,
            'sendSettings' => $this->sendSettings,
        ];
    }
}
