<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Newsletters;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get a single newsletter by its ID.
 *
 * GET /newsletters/{newsletterId}
 */
class GetNewsletterRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly string $newsletterId,
        protected readonly array $fields = [],
    ) {}

    public function resolveEndpoint(): string
    {
        return '/newsletters/'.$this->newsletterId;
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'fields' => implode(',', $this->fields),
        ]);
    }
}
