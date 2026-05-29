<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Resources;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Ziming\LaravelGetResponse\Requests\FileLibrary\CreateFileRequest;
use Ziming\LaravelGetResponse\Requests\FileLibrary\CreateFolderRequest;
use Ziming\LaravelGetResponse\Requests\FileLibrary\DeleteFileRequest;
use Ziming\LaravelGetResponse\Requests\FileLibrary\DeleteFolderRequest;
use Ziming\LaravelGetResponse\Requests\FileLibrary\GetFileByIdRequest;
use Ziming\LaravelGetResponse\Requests\FileLibrary\GetFileListRequest;
use Ziming\LaravelGetResponse\Requests\FileLibrary\GetFolderListRequest;
use Ziming\LaravelGetResponse\Requests\FileLibrary\QuotaRequest;

class FileLibraryResource extends BaseResource
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getFileList(
        array $queryParameters = [],
        array $sortParameters = [],
        array $fields = [],
        ?int $perPage = null,
        ?int $page = null,
    ): Response {
        return $this->connector->send(new GetFileListRequest($queryParameters, $sortParameters, $fields, $perPage, $page));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function createFile(
        string $content,
        string $name,
        string $extension,
        array $folder,
    ): Response {
        return $this->connector->send(new CreateFileRequest($content, $name, $extension, $folder));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function deleteFile(
        string $fileId,
    ): Response {
        return $this->connector->send(new DeleteFileRequest($fileId));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getFileById(
        string $fileId,
        array $fields = [],
    ): Response {
        return $this->connector->send(new GetFileByIdRequest($fileId, $fields));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getFolderList(
        array $queryParameters = [],
        array $sortParameters = [],
        array $fields = [],
        ?int $perPage = null,
        ?int $page = null,
    ): Response {
        return $this->connector->send(new GetFolderListRequest($queryParameters, $sortParameters, $fields, $perPage, $page));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function createFolder(
        string $name,
    ): Response {
        return $this->connector->send(new CreateFolderRequest($name));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function deleteFolder(
        string $folderId,
    ): Response {
        return $this->connector->send(new DeleteFolderRequest($folderId));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function quota(): Response
    {
        return $this->connector->send(new QuotaRequest);
    }
}
