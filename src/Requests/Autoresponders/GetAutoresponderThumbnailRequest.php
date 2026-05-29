<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Autoresponders;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get the autoresponder thumbnail
 *
 * GET /autoresponders/{autoresponderId}/thumbnail
 */
class GetAutoresponderThumbnailRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly string $autoresponderId,
        protected readonly ?string $size = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/autoresponders/'.$this->autoresponderId.'/thumbnail';
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'size' => $this->size,
        ]);
    }
}
