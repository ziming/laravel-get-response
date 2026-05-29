<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Resources;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Ziming\LaravelGetResponse\Requests\Autoresponders\CreateAutoresponderRequest;
use Ziming\LaravelGetResponse\Requests\Autoresponders\DeleteAutoresponderRequest;
use Ziming\LaravelGetResponse\Requests\Autoresponders\GetAutoresponderListRequest;
use Ziming\LaravelGetResponse\Requests\Autoresponders\GetAutoresponderRequest;
use Ziming\LaravelGetResponse\Requests\Autoresponders\GetAutoresponderStatisticsCollectionRequest;
use Ziming\LaravelGetResponse\Requests\Autoresponders\GetAutoresponderThumbnailRequest;
use Ziming\LaravelGetResponse\Requests\Autoresponders\GetSingleAutoresponderStatisticsRequest;
use Ziming\LaravelGetResponse\Requests\Autoresponders\UpdateAutoresponderRequest;

class AutorespondersResource extends BaseResource
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getAutoresponderList(
        array $queryParameters = [],
        array $sortParameters = [],
        array $fields = [],
        ?int $perPage = null,
        ?int $page = null,
    ): Response {
        return $this->connector->send(new GetAutoresponderListRequest($queryParameters, $sortParameters, $fields, $perPage, $page));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function createAutoresponder(
        array $sendSettings,
        string $subject,
        string $status,
        array $content,
        array $triggerSettings,
        ?string $autoresponderId = null,
        ?string $href = null,
        ?string $name = null,
        ?string $campaignId = null,
        ?array $fromField = null,
        ?array $replyTo = null,
        ?array $flags = null,
        ?array $statistics = null,
        ?string $createdOn = null,
    ): Response {
        return $this->connector->send(new CreateAutoresponderRequest($sendSettings, $subject, $status, $content, $triggerSettings, $autoresponderId, $href, $name, $campaignId, $fromField, $replyTo, $flags, $statistics, $createdOn));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getAutoresponderStatisticsCollection(
        array $queryParameters = [],
        array $fields = [],
        ?int $perPage = null,
        ?int $page = null,
    ): Response {
        return $this->connector->send(new GetAutoresponderStatisticsCollectionRequest($queryParameters, $fields, $perPage, $page));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function deleteAutoresponder(
        string $autoresponderId,
    ): Response {
        return $this->connector->send(new DeleteAutoresponderRequest($autoresponderId));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getAutoresponder(
        string $autoresponderId,
        array $fields = [],
    ): Response {
        return $this->connector->send(new GetAutoresponderRequest($autoresponderId, $fields));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function updateAutoresponder(
        string $autoresponderId,
        ?array $sendSettings = null,
        ?string $href = null,
        ?string $name = null,
        ?string $subject = null,
        ?string $campaignId = null,
        ?string $status = null,
        ?array $fromField = null,
        ?array $replyTo = null,
        ?array $content = null,
        ?array $flags = null,
        ?array $triggerSettings = null,
        ?array $statistics = null,
        ?string $createdOn = null,
    ): Response {
        return $this->connector->send(new UpdateAutoresponderRequest($autoresponderId, $sendSettings, $href, $name, $subject, $campaignId, $status, $fromField, $replyTo, $content, $flags, $triggerSettings, $statistics, $createdOn));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getSingleAutoresponderStatistics(
        string $autoresponderId,
        array $queryParameters = [],
        array $fields = [],
        ?int $perPage = null,
        ?int $page = null,
    ): Response {
        return $this->connector->send(new GetSingleAutoresponderStatisticsRequest($autoresponderId, $queryParameters, $fields, $perPage, $page));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getAutoresponderThumbnail(
        string $autoresponderId,
        ?string $size = null,
    ): Response {
        return $this->connector->send(new GetAutoresponderThumbnailRequest($autoresponderId, $size));
    }
}
