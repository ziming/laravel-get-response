<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\FileLibrary;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get file by ID
 *
 * GET /file-library/files/{fileId}
 */
class GetFileByIdRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly string $fileId,
        protected readonly array $fields = [],
    ) {}

    public function resolveEndpoint(): string
    {
        return '/file-library/files/'.$this->fileId;
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'fields' => implode(',', $this->fields),
        ]);
    }
}
