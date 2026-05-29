<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Resources;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Ziming\LaravelGetResponse\Requests\Suppressions\CreateSuppressionRequest;
use Ziming\LaravelGetResponse\Requests\Suppressions\DeleteSuppressionRequest;
use Ziming\LaravelGetResponse\Requests\Suppressions\GetSuppressionByIdRequest;
use Ziming\LaravelGetResponse\Requests\Suppressions\GetSuppressionsListRequest;
use Ziming\LaravelGetResponse\Requests\Suppressions\UpdateSuppressionRequest;

class SuppressionsResource extends BaseResource
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getSuppressionsList(
        array $queryParameters = [],
        array $sortParameters = [],
        array $fields = [],
        ?int $perPage = null,
        ?int $page = null,
    ): Response {
        return $this->connector->send(new GetSuppressionsListRequest($queryParameters, $sortParameters, $fields, $perPage, $page));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function createSuppression(
        string $name,
        ?array $masks = null,
    ): Response {
        return $this->connector->send(new CreateSuppressionRequest($name, $masks));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function deleteSuppression(
        string $suppressionId,
    ): Response {
        return $this->connector->send(new DeleteSuppressionRequest($suppressionId));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getSuppressionById(
        string $suppressionId,
    ): Response {
        return $this->connector->send(new GetSuppressionByIdRequest($suppressionId));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function updateSuppression(
        string $suppressionId,
        string $name,
        array $masks,
    ): Response {
        return $this->connector->send(new UpdateSuppressionRequest($suppressionId, $name, $masks));
    }
}
