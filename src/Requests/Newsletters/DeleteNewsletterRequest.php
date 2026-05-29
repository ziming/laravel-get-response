<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Newsletters;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Delete newsletter
 *
 * DELETE /newsletters/{newsletterId}
 */
class DeleteNewsletterRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(
        protected readonly string $newsletterId,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/newsletters/'.$this->newsletterId;
    }
}
