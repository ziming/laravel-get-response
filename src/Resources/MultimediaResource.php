<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Resources;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Ziming\LaravelGetResponse\Requests\Multimedia\GetImageListRequest;
use Ziming\LaravelGetResponse\Requests\Multimedia\UploadImageRequest;

class MultimediaResource extends BaseResource
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getImageList(
        array $fields = [],
        ?int $perPage = null,
        ?int $page = null,
    ): Response {
        return $this->connector->send(new GetImageListRequest($fields, $perPage, $page));
    }

    /**
     * @param  resource|string|int|float|\Psr\Http\Message\StreamInterface  $file
     * @param  array<string, mixed>  $headers
     *
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function uploadImage(
        mixed $file,
        ?string $filename = null,
        array $headers = [],
    ): Response {
        return $this->connector->send(new UploadImageRequest($file, $filename, $headers));
    }
}
