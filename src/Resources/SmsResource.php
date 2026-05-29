<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Resources;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Ziming\LaravelGetResponse\Requests\Sms\GetSmsAutomationByIdRequest;
use Ziming\LaravelGetResponse\Requests\Sms\GetSMSAutomationListRequest;
use Ziming\LaravelGetResponse\Requests\Sms\GetSmsByIdRequest;
use Ziming\LaravelGetResponse\Requests\Sms\GetSMSListRequest;
use Ziming\LaravelGetResponse\Requests\Sms\GetSmsSenderNameListRequest;
use Ziming\LaravelGetResponse\Requests\Sms\SendSmsRequest;

class SmsResource extends BaseResource
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getSMSList(
        array $queryParameters = [],
        array $sortParameters = [],
        array $fields = [],
        ?int $perPage = null,
        ?int $page = null,
    ): Response {
        return $this->connector->send(new GetSMSListRequest($queryParameters, $sortParameters, $fields, $perPage, $page));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function sendSms(
        string $name,
        string $content,
        string $recipientsType,
    ): Response {
        return $this->connector->send(new SendSmsRequest($name, $content, $recipientsType));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getSMSAutomationList(
        array $queryParameters = [],
        array $sortParameters = [],
        array $fields = [],
        ?int $perPage = null,
        ?int $page = null,
    ): Response {
        return $this->connector->send(new GetSMSAutomationListRequest($queryParameters, $sortParameters, $fields, $perPage, $page));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getSmsAutomationById(
        string $smsId,
        array $fields = [],
    ): Response {
        return $this->connector->send(new GetSmsAutomationByIdRequest($smsId, $fields));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getSmsSenderNameList(
        array $queryParameters = [],
        array $fields = [],
    ): Response {
        return $this->connector->send(new GetSmsSenderNameListRequest($queryParameters, $fields));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getSmsById(
        string $smsId,
        array $fields = [],
    ): Response {
        return $this->connector->send(new GetSmsByIdRequest($smsId, $fields));
    }
}
