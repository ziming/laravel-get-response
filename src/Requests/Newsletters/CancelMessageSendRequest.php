<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Newsletters;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Cancel sending the newsletter
 *
 * POST /newsletters/{newsletterId}/cancel
 */
class CancelMessageSendRequest extends Request
{
    protected Method $method = Method::POST;

    public function __construct(
        protected readonly string $newsletterId,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/newsletters/'.$this->newsletterId.'/cancel';
    }
}
