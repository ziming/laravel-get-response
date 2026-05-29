<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Resources;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Ziming\LaravelGetResponse\Requests\TransactionalEmailTemplates\CreateTransactionalEmailTemplateRequest;
use Ziming\LaravelGetResponse\Requests\TransactionalEmailTemplates\DeleteTransactionalEmailsTemplateRequest;
use Ziming\LaravelGetResponse\Requests\TransactionalEmailTemplates\GetTransactionalEmailsTemplatesByIdRequest;
use Ziming\LaravelGetResponse\Requests\TransactionalEmailTemplates\GetTransactionalEmailsTemplatesListRequest;
use Ziming\LaravelGetResponse\Requests\TransactionalEmailTemplates\UpdateTransactionalEmailsTemplateRequest;

class TransactionalEmailTemplatesResource extends BaseResource
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getTransactionalEmailsTemplatesList(
        array $queryParameters = [],
        array $sortParameters = [],
        array $fields = [],
        ?int $perPage = null,
        ?int $page = null,
    ): Response {
        return $this->connector->send(new GetTransactionalEmailsTemplatesListRequest($queryParameters, $sortParameters, $fields, $perPage, $page));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function createTransactionalEmailTemplate(
        string $subject,
        ?array $content = null,
    ): Response {
        return $this->connector->send(new CreateTransactionalEmailTemplateRequest($subject, $content));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function deleteTransactionalEmailsTemplate(
        string $transactionalEmailTemplateId,
    ): Response {
        return $this->connector->send(new DeleteTransactionalEmailsTemplateRequest($transactionalEmailTemplateId));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getTransactionalEmailsTemplatesById(
        string $transactionalEmailTemplateId,
        array $fields = [],
    ): Response {
        return $this->connector->send(new GetTransactionalEmailsTemplatesByIdRequest($transactionalEmailTemplateId, $fields));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function updateTransactionalEmailsTemplate(
        string $transactionalEmailTemplateId,
        ?string $subject = null,
        ?array $content = null,
    ): Response {
        return $this->connector->send(new UpdateTransactionalEmailsTemplateRequest($transactionalEmailTemplateId, $subject, $content));
    }
}
