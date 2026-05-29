<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Resources;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Ziming\LaravelGetResponse\Requests\Newsletters\CancelMessageSendRequest;
use Ziming\LaravelGetResponse\Requests\Newsletters\CreateNewsletterRequest;
use Ziming\LaravelGetResponse\Requests\Newsletters\DeleteNewsletterRequest;
use Ziming\LaravelGetResponse\Requests\Newsletters\GetNewsletterActivitiesRequest;
use Ziming\LaravelGetResponse\Requests\Newsletters\GetNewsletterListRequest;
use Ziming\LaravelGetResponse\Requests\Newsletters\GetNewsletterRequest;
use Ziming\LaravelGetResponse\Requests\Newsletters\GetNewsletterStatisticsCollectionRequest;
use Ziming\LaravelGetResponse\Requests\Newsletters\GetNewsletterThumbnailRequest;
use Ziming\LaravelGetResponse\Requests\Newsletters\GetSingleNewsletterStatisticsRequest;
use Ziming\LaravelGetResponse\Requests\Newsletters\SendDraftRequest;

class NewslettersResource extends BaseResource
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getNewsletterList(
        array $queryParameters = [],
        array $sortParameters = [],
        array $fields = [],
        ?int $perPage = null,
        ?int $page = null,
    ): Response {
        return $this->connector->send(new GetNewsletterListRequest($queryParameters, $sortParameters, $fields, $perPage, $page));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function createNewsletter(
        array $content,
        string $subject,
        array $fromField,
        array $campaign,
        array $sendSettings,
        ?array $flags = null,
        ?string $name = null,
        ?string $type = null,
        ?array $replyTo = null,
        ?array $attachments = null,
    ): Response {
        return $this->connector->send(new CreateNewsletterRequest($content, $subject, $fromField, $campaign, $sendSettings, $flags, $name, $type, $replyTo, $attachments));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function sendDraft(
        string $messageId,
        array $sendSettings,
    ): Response {
        return $this->connector->send(new SendDraftRequest($messageId, $sendSettings));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getNewsletterStatisticsCollection(
        array $queryParameters = [],
        array $fields = [],
        ?int $perPage = null,
        ?int $page = null,
    ): Response {
        return $this->connector->send(new GetNewsletterStatisticsCollectionRequest($queryParameters, $fields, $perPage, $page));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function deleteNewsletter(
        string $newsletterId,
    ): Response {
        return $this->connector->send(new DeleteNewsletterRequest($newsletterId));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getNewsletter(
        string $newsletterId,
        array $fields = [],
    ): Response {
        return $this->connector->send(new GetNewsletterRequest($newsletterId, $fields));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getNewsletterActivities(
        string $newsletterId,
        array $queryParameters = [],
        array $sortParameters = [],
        ?int $perPage = null,
        ?int $page = null,
    ): Response {
        return $this->connector->send(new GetNewsletterActivitiesRequest($newsletterId, $queryParameters, $sortParameters, $perPage, $page));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function cancelMessageSend(
        string $newsletterId,
    ): Response {
        return $this->connector->send(new CancelMessageSendRequest($newsletterId));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getSingleNewsletterStatistics(
        string $newsletterId,
        array $queryParameters = [],
        array $fields = [],
        ?int $perPage = null,
        ?int $page = null,
    ): Response {
        return $this->connector->send(new GetSingleNewsletterStatisticsRequest($newsletterId, $queryParameters, $fields, $perPage, $page));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getNewsletterThumbnail(
        string $newsletterId,
        ?string $size = null,
    ): Response {
        return $this->connector->send(new GetNewsletterThumbnailRequest($newsletterId, $size));
    }
}
