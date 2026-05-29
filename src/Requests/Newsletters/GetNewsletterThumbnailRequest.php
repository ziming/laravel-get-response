<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Newsletters;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get newsletter thumbnail
 *
 * GET /newsletters/{newsletterId}/thumbnail
 */
class GetNewsletterThumbnailRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly string $newsletterId,
        protected readonly ?string $size = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/newsletters/'.$this->newsletterId.'/thumbnail';
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'size' => $this->size,
        ]);
    }
}
