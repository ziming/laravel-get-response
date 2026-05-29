<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\ClickTracks;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get click tracked link details by click track ID
 *
 * GET /click-tracks/{clickTrackId}
 */
class GetClickTrackByIdRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly string $clickTrackId,
        protected readonly array $fields = [],
    ) {}

    public function resolveEndpoint(): string
    {
        return '/click-tracks/'.$this->clickTrackId;
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'fields' => implode(',', $this->fields),
        ]);
    }
}
