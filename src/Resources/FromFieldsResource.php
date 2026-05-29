<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Resources;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Ziming\LaravelGetResponse\Requests\FromFields\CreateFromFieldRequest;
use Ziming\LaravelGetResponse\Requests\FromFields\DeleteFromFieldRequest;
use Ziming\LaravelGetResponse\Requests\FromFields\GetFromFieldByIdRequest;
use Ziming\LaravelGetResponse\Requests\FromFields\GetFromFieldListRequest;
use Ziming\LaravelGetResponse\Requests\FromFields\SetFromFieldAsDefaultRequest;

class FromFieldsResource extends BaseResource
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getFromFieldList(
        array $queryParameters = [],
        array $sortParameters = [],
        array $fields = [],
        ?int $perPage = null,
        ?int $page = null,
    ): Response {
        return $this->connector->send(new GetFromFieldListRequest($queryParameters, $sortParameters, $fields, $perPage, $page));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function createFromField(
        string $email,
        string $name,
    ): Response {
        return $this->connector->send(new CreateFromFieldRequest($email, $name));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function deleteFromField(
        string $fromFieldId,
        ?string $fromFieldIdToReplaceWith = null,
    ): Response {
        return $this->connector->send(new DeleteFromFieldRequest($fromFieldId, $fromFieldIdToReplaceWith));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getFromFieldById(
        string $fromFieldId,
        array $fields = [],
    ): Response {
        return $this->connector->send(new GetFromFieldByIdRequest($fromFieldId, $fields));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function setFromFieldAsDefault(
        string $fromFieldId,
    ): Response {
        return $this->connector->send(new SetFromFieldAsDefaultRequest($fromFieldId));
    }
}
