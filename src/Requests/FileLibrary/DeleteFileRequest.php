<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\FileLibrary;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Delete file by file ID
 *
 * DELETE /file-library/files/{fileId}
 */
class DeleteFileRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(
        protected readonly string $fileId,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/file-library/files/'.$this->fileId;
    }
}
