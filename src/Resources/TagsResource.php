<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Resources;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Ziming\LaravelGetResponse\Requests\Tags\CreateTagRequest;
use Ziming\LaravelGetResponse\Requests\Tags\DeleteTagRequest;
use Ziming\LaravelGetResponse\Requests\Tags\GetTagByIdRequest;
use Ziming\LaravelGetResponse\Requests\Tags\GetTagsListRequest;
use Ziming\LaravelGetResponse\Requests\Tags\UpdateTagRequest;

class TagsResource extends BaseResource
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getTagsList(
        array $queryParameters = [],
        array $sortParameters = [],
        array $fields = [],
        ?int $perPage = null,
        ?int $page = null,
    ): Response {
        return $this->connector->send(new GetTagsListRequest($queryParameters, $sortParameters, $fields, $perPage, $page));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function createTag(
        string $name,
        ?string $color = null,
    ): Response {
        return $this->connector->send(new CreateTagRequest($name, $color));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function deleteTag(
        string $tagId,
    ): Response {
        return $this->connector->send(new DeleteTagRequest($tagId));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getTagById(
        string $tagId,
        array $fields = [],
    ): Response {
        return $this->connector->send(new GetTagByIdRequest($tagId, $fields));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function updateTag(
        string $tagId,
        string $name,
        ?string $color = null,
    ): Response {
        return $this->connector->send(new UpdateTagRequest($tagId, $name, $color));
    }
}
