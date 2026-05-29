<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\FileLibrary;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create a file
 *
 * POST /file-library/files
 */
class CreateFileRequest extends Request implements HasBody
{
    protected Method $method = Method::POST;

    use HasJsonBody;

    public function __construct(
        protected readonly string $content,
        protected readonly string $name,
        protected readonly string $extension,
        protected readonly array $folder,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/file-library/files';
    }

    protected function defaultBody(): array
    {
        return [
            'content' => $this->content,
            'name' => $this->name,
            'extension' => $this->extension,
            'folder' => $this->folder,
        ];
    }
}
