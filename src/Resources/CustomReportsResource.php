<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Resources;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Ziming\LaravelGetResponse\Requests\CustomReports\CreateCustomReportRequest;
use Ziming\LaravelGetResponse\Requests\CustomReports\GetCustomReportDetailsRequest;
use Ziming\LaravelGetResponse\Requests\CustomReports\GetCustomReportListRequest;

class CustomReportsResource extends BaseResource
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getCustomReportList(
        array $queryParameters = [],
        array $sortParameters = [],
        array $fields = [],
        ?int $perPage = null,
        ?int $page = null,
    ): Response {
        return $this->connector->send(new GetCustomReportListRequest($queryParameters, $sortParameters, $fields, $perPage, $page));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function createCustomReport(
        string $name,
        string $type,
        array $scheduling,
    ): Response {
        return $this->connector->send(new CreateCustomReportRequest($name, $type, $scheduling));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getCustomReportDetails(
        string $customReportId,
        array $fields = [],
    ): Response {
        return $this->connector->send(new GetCustomReportDetailsRequest($customReportId, $fields));
    }
}
