<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Resources;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Ziming\LaravelGetResponse\Requests\Statistics\GetGeneralPerformanceStatsRequest;
use Ziming\LaravelGetResponse\Requests\Statistics\GetLpsGeneralPerformanceStatsRequest;
use Ziming\LaravelGetResponse\Requests\Statistics\GetPopupGeneralPerformanceRequest;
use Ziming\LaravelGetResponse\Requests\Statistics\GetRevenueStatsRequest;
use Ziming\LaravelGetResponse\Requests\Statistics\GetSmsStatsRequest;
use Ziming\LaravelGetResponse\Requests\Statistics\GetWbeGeneralPerformanceStatsRequest;

class StatisticsResource extends BaseResource
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getGeneralPerformanceStats(
        array $queryParameters = [],
        array $fields = [],
    ): Response {
        return $this->connector->send(new GetGeneralPerformanceStatsRequest($queryParameters, $fields));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getRevenueStats(
        array $queryParameters = [],
        array $fields = [],
    ): Response {
        return $this->connector->send(new GetRevenueStatsRequest($queryParameters, $fields));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getLpsGeneralPerformanceStats(
        string $lpsId,
        array $queryParameters = [],
        array $fields = [],
    ): Response {
        return $this->connector->send(new GetLpsGeneralPerformanceStatsRequest($lpsId, $queryParameters, $fields));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getPopupGeneralPerformance(
        string $popupId,
        array $queryParameters = [],
        array $fields = [],
    ): Response {
        return $this->connector->send(new GetPopupGeneralPerformanceRequest($popupId, $queryParameters, $fields));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getSmsStats(
        string $smsId,
        array $queryParameters = [],
        array $fields = [],
    ): Response {
        return $this->connector->send(new GetSmsStatsRequest($smsId, $queryParameters, $fields));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getWbeGeneralPerformanceStats(
        string $websiteId,
        array $queryParameters = [],
        array $fields = [],
    ): Response {
        return $this->connector->send(new GetWbeGeneralPerformanceStatsRequest($websiteId, $queryParameters, $fields));
    }
}
