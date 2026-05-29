<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Multimedia;

use Saloon\Contracts\Body\HasBody;
use Saloon\Data\MultipartValue;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasMultipartBody;

/**
 * Upload image
 *
 * POST /multimedia
 */
class UploadImageRequest extends Request implements HasBody
{
    protected Method $method = Method::POST;

    use HasMultipartBody;

    /**
     * @param  resource|string|int|float|\Psr\Http\Message\StreamInterface  $file
     * @param  array<string, mixed>  $fileHeaders
     */
    public function __construct(
        protected readonly mixed $file,
        protected readonly ?string $filename = null,
        protected readonly array $fileHeaders = [],
    ) {}

    public function resolveEndpoint(): string
    {
        return '/multimedia';
    }

    protected function defaultBody(): array
    {
        return [
            new MultipartValue('file', $this->file, $this->filename, $this->fileHeaders),
        ];
    }
}
