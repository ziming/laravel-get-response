<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Resources;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Ziming\LaravelGetResponse\Requests\Imports\CreateImportRequest;
use Ziming\LaravelGetResponse\Requests\Imports\GetImportByIdRequest;
use Ziming\LaravelGetResponse\Requests\Imports\GetImportListRequest;

class ImportsResource extends BaseResource
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getImportList(
        array $queryParameters = [],
        array $sortParameters = [],
        array $fields = [],
        ?int $perPage = null,
        ?int $page = null,
    ): Response {
        return $this->connector->send(new GetImportListRequest($queryParameters, $sortParameters, $fields, $perPage, $page));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function createImport(
        string $campaignId,
        array $fieldMapping,
        array $contacts,
    ): Response {
        return $this->connector->send(new CreateImportRequest($campaignId, $fieldMapping, $contacts));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getImportById(
        string $importId,
        array $fields = [],
    ): Response {
        return $this->connector->send(new GetImportByIdRequest($importId, $fields));
    }
}
