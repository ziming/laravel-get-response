<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Resources;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Ziming\LaravelGetResponse\Requests\Campaigns\CreateCampaignRequest;
use Ziming\LaravelGetResponse\Requests\Campaigns\GetCampaignBlocklistRequest;
use Ziming\LaravelGetResponse\Requests\Campaigns\GetCampaignListRequest;
use Ziming\LaravelGetResponse\Requests\Campaigns\GetCampaignRequest;
use Ziming\LaravelGetResponse\Requests\Campaigns\GetCampaignStatisticsBalanceRequest;
use Ziming\LaravelGetResponse\Requests\Campaigns\GetCampaignStatisticsListSizeRequest;
use Ziming\LaravelGetResponse\Requests\Campaigns\GetCampaignStatisticsLocationsRequest;
use Ziming\LaravelGetResponse\Requests\Campaigns\GetCampaignStatisticsOriginsRequest;
use Ziming\LaravelGetResponse\Requests\Campaigns\GetCampaignStatisticsRemovalsRequest;
use Ziming\LaravelGetResponse\Requests\Campaigns\GetCampaignStatisticsSubscriptionsRequest;
use Ziming\LaravelGetResponse\Requests\Campaigns\GetCampaignStatisticsSummaryRequest;
use Ziming\LaravelGetResponse\Requests\Campaigns\UpdateCampaignBlocklistRequest;
use Ziming\LaravelGetResponse\Requests\Campaigns\UpdateCampaignRequest;

class CampaignsResource extends BaseResource
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getCampaignList(
        array $queryParameters = [],
        array $sortParameters = [],
        array $fields = [],
        ?int $perPage = null,
        ?int $page = null,
    ): Response {
        return $this->connector->send(new GetCampaignListRequest($queryParameters, $sortParameters, $fields, $perPage, $page));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function createCampaign(
        string $name,
        ?string $campaignId = null,
        ?string $techName = null,
        ?string $languageCode = null,
        ?string $isDefault = null,
        ?string $createdOn = null,
        ?string $href = null,
        ?array $postal = null,
        ?array $confirmation = null,
        ?array $optinTypes = null,
        ?array $subscriptionNotifications = null,
        ?array $profile = null,
    ): Response {
        return $this->connector->send(new CreateCampaignRequest($name, $campaignId, $techName, $languageCode, $isDefault, $createdOn, $href, $postal, $confirmation, $optinTypes, $subscriptionNotifications, $profile));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getCampaignStatisticsBalance(
        array $queryParameters = [],
    ): Response {
        return $this->connector->send(new GetCampaignStatisticsBalanceRequest($queryParameters));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getCampaignStatisticsListSize(
        array $queryParameters = [],
    ): Response {
        return $this->connector->send(new GetCampaignStatisticsListSizeRequest($queryParameters));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getCampaignStatisticsLocations(
        array $queryParameters = [],
    ): Response {
        return $this->connector->send(new GetCampaignStatisticsLocationsRequest($queryParameters));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getCampaignStatisticsOrigins(
        array $queryParameters = [],
    ): Response {
        return $this->connector->send(new GetCampaignStatisticsOriginsRequest($queryParameters));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getCampaignStatisticsRemovals(
        array $queryParameters = [],
    ): Response {
        return $this->connector->send(new GetCampaignStatisticsRemovalsRequest($queryParameters));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getCampaignStatisticsSubscriptions(
        array $queryParameters = [],
    ): Response {
        return $this->connector->send(new GetCampaignStatisticsSubscriptionsRequest($queryParameters));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getCampaignStatisticsSummary(
        array $queryParameters = [],
    ): Response {
        return $this->connector->send(new GetCampaignStatisticsSummaryRequest($queryParameters));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getCampaign(
        string $campaignId,
        array $fields = [],
    ): Response {
        return $this->connector->send(new GetCampaignRequest($campaignId, $fields));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function updateCampaign(
        string $campaignId,
        string $name,
        ?string $techName = null,
        ?string $languageCode = null,
        ?string $isDefault = null,
        ?string $createdOn = null,
        ?string $href = null,
        ?array $postal = null,
        ?array $confirmation = null,
        ?array $optinTypes = null,
        ?array $subscriptionNotifications = null,
        ?array $profile = null,
    ): Response {
        return $this->connector->send(new UpdateCampaignRequest($campaignId, $name, $techName, $languageCode, $isDefault, $createdOn, $href, $postal, $confirmation, $optinTypes, $subscriptionNotifications, $profile));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getCampaignBlocklist(
        string $campaignId,
        array $queryParameters = [],
    ): Response {
        return $this->connector->send(new GetCampaignBlocklistRequest($campaignId, $queryParameters));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function updateCampaignBlocklist(
        string $campaignId,
        array $masks,
        ?string $additionalFlags = null,
    ): Response {
        return $this->connector->send(new UpdateCampaignBlocklistRequest($campaignId, $masks, $additionalFlags));
    }
}
