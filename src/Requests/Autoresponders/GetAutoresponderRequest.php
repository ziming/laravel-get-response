<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Autoresponders;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get a single autoresponder by its ID
 *
 * GET /autoresponders/{autoresponderId}
 */
class GetAutoresponderRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly string $autoresponderId,
        protected readonly array $fields = [],
    ) {}

    public function resolveEndpoint(): string
    {
        return '/autoresponders/'.$this->autoresponderId;
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'fields' => implode(',', $this->fields),
        ]);
    }
}
