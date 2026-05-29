<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Resources;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Ziming\LaravelGetResponse\Requests\TransactionalEmails\CreateTransactionalEmailRequest;
use Ziming\LaravelGetResponse\Requests\TransactionalEmails\GetTransactionalEmailsByIdRequest;
use Ziming\LaravelGetResponse\Requests\TransactionalEmails\GetTransactionalEmailsListRequest;
use Ziming\LaravelGetResponse\Requests\TransactionalEmails\GetTransactionalEmailsStatisticsRequest;

class TransactionalEmailsResource extends BaseResource
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getTransactionalEmailsList(
        array $queryParameters = [],
        array $fields = [],
        ?int $perPage = null,
        ?int $page = null,
    ): Response {
        return $this->connector->send(new GetTransactionalEmailsListRequest($queryParameters, $fields, $perPage, $page));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function createTransactionalEmail(
        array $fromField,
        array $recipients,
        string $contentType,
        ?array $replyTo = null,
        ?array $tag = null,
    ): Response {
        return $this->connector->send(new CreateTransactionalEmailRequest($fromField, $recipients, $contentType, $replyTo, $tag));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getTransactionalEmailsStatistics(
        array $queryParameters = [],
        array $fields = [],
    ): Response {
        return $this->connector->send(new GetTransactionalEmailsStatisticsRequest($queryParameters, $fields));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getTransactionalEmailsById(
        string $transactionalEmailId,
        array $fields = [],
    ): Response {
        return $this->connector->send(new GetTransactionalEmailsByIdRequest($transactionalEmailId, $fields));
    }
}
