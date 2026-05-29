<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Multimedia;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get images list
 *
 * GET /multimedia
 */
class GetImageListRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly array $fields = [],
        protected readonly ?int $perPage = null,
        protected readonly ?int $page = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/multimedia';
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'fields' => implode(',', $this->fields),
            'perPage' => $this->perPage,
            'page' => $this->page,
        ]);
    }
}
