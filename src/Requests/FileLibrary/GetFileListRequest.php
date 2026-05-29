<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\FileLibrary;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get the list of files
 *
 * GET /file-library/files
 */
class GetFileListRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly array $queryParameters = [],
        protected readonly array $sortParameters = [],
        protected readonly array $fields = [],
        protected readonly ?int $perPage = null,
        protected readonly ?int $page = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/file-library/files';
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'query' => $this->queryParameters,
            'sort' => $this->sortParameters,
            'fields' => implode(',', $this->fields),
            'perPage' => $this->perPage,
            'page' => $this->page,
        ]);
    }
}
