<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\FileLibrary;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Delete folder by folder ID
 *
 * DELETE /file-library/folders/{folderId}
 */
class DeleteFolderRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(
        protected readonly string $folderId,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/file-library/folders/'.$this->folderId;
    }
}
