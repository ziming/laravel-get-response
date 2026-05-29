<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Resources;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Ziming\LaravelGetResponse\Requests\RssNewsletters\CreateRssNewsletterRequest;
use Ziming\LaravelGetResponse\Requests\RssNewsletters\DeleteRssNewsletterRequest;
use Ziming\LaravelGetResponse\Requests\RssNewsletters\GetRssNewsletterByIdRequest;
use Ziming\LaravelGetResponse\Requests\RssNewsletters\GetRssNewslettersListRequest;
use Ziming\LaravelGetResponse\Requests\RssNewsletters\GetRssNewsletterStatisticsCollectionRequest;
use Ziming\LaravelGetResponse\Requests\RssNewsletters\GetSingleRssNewsletterStatisticsCollectionRequest;
use Ziming\LaravelGetResponse\Requests\RssNewsletters\UpdateRssNewsletterRequest;

class RssNewslettersResource extends BaseResource
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getRssNewslettersList(
        array $queryParameters = [],
        array $sortParameters = [],
        array $fields = [],
        ?int $perPage = null,
        ?int $page = null,
    ): Response {
        return $this->connector->send(new GetRssNewslettersListRequest($queryParameters, $sortParameters, $fields, $perPage, $page));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function createRssNewsletter(
        string $rssFeedUrl,
        string $subject,
        string $status,
        array $fromField,
        array $content,
        array $sendSettings,
        ?array $flags = null,
        ?string $rssNewsletterId = null,
        ?string $href = null,
        ?string $name = null,
        ?string $editor = null,
        ?array $replyTo = null,
        ?string $createdOn = null,
    ): Response {
        return $this->connector->send(new CreateRssNewsletterRequest($rssFeedUrl, $subject, $status, $fromField, $content, $sendSettings, $flags, $rssNewsletterId, $href, $name, $editor, $replyTo, $createdOn));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getRssNewsletterStatisticsCollection(
        array $queryParameters = [],
        array $fields = [],
        ?int $perPage = null,
        ?int $page = null,
    ): Response {
        return $this->connector->send(new GetRssNewsletterStatisticsCollectionRequest($queryParameters, $fields, $perPage, $page));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function deleteRssNewsletter(
        string $rssNewsletterId,
    ): Response {
        return $this->connector->send(new DeleteRssNewsletterRequest($rssNewsletterId));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getRssNewsletterById(
        string $rssNewsletterId,
        array $fields = [],
    ): Response {
        return $this->connector->send(new GetRssNewsletterByIdRequest($rssNewsletterId, $fields));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function updateRssNewsletter(
        string $rssNewsletterId,
        ?array $flags = null,
        ?string $href = null,
        ?string $rssFeedUrl = null,
        ?string $subject = null,
        ?string $name = null,
        ?string $status = null,
        ?string $editor = null,
        ?array $fromField = null,
        ?array $replyTo = null,
        ?array $content = null,
        ?array $sendSettings = null,
        ?string $createdOn = null,
    ): Response {
        return $this->connector->send(new UpdateRssNewsletterRequest($rssNewsletterId, $flags, $href, $rssFeedUrl, $subject, $name, $status, $editor, $fromField, $replyTo, $content, $sendSettings, $createdOn));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getSingleRssNewsletterStatisticsCollection(
        string $rssNewsletterId,
        array $queryParameters = [],
        array $fields = [],
        ?int $perPage = null,
        ?int $page = null,
    ): Response {
        return $this->connector->send(new GetSingleRssNewsletterStatisticsCollectionRequest($rssNewsletterId, $queryParameters, $fields, $perPage, $page));
    }
}
