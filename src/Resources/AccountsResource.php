<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Resources;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Ziming\LaravelGetResponse\Requests\Accounts\DisableCallbacksRequest;
use Ziming\LaravelGetResponse\Requests\Accounts\GetAccountBadgeRequest;
use Ziming\LaravelGetResponse\Requests\Accounts\GetAccountBillingRequest;
use Ziming\LaravelGetResponse\Requests\Accounts\GetAccountBlocklistRequest;
use Ziming\LaravelGetResponse\Requests\Accounts\GetAccountLoginHistoryRequest;
use Ziming\LaravelGetResponse\Requests\Accounts\GetAccountRequest;
use Ziming\LaravelGetResponse\Requests\Accounts\GetCallbacksRequest;
use Ziming\LaravelGetResponse\Requests\Accounts\GetIndustriesRequest;
use Ziming\LaravelGetResponse\Requests\Accounts\GetSendingLimitsRequest;
use Ziming\LaravelGetResponse\Requests\Accounts\GetTimezonesRequest;
use Ziming\LaravelGetResponse\Requests\Accounts\UpdateAccountBadgeRequest;
use Ziming\LaravelGetResponse\Requests\Accounts\UpdateAccountBlocklistRequest;
use Ziming\LaravelGetResponse\Requests\Accounts\UpdateAccountRequest;
use Ziming\LaravelGetResponse\Requests\Accounts\UpdateCallbacksRequest;

class AccountsResource extends BaseResource
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getAccount(
        array $fields = [],
    ): Response {
        return $this->connector->send(new GetAccountRequest($fields));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function updateAccount(
        ?string $accountId = null,
        ?string $email = null,
        ?array $countryCode = null,
        ?array $industryTag = null,
        ?array $timeZone = null,
        ?string $href = null,
        ?string $firstName = null,
        ?string $lastName = null,
        ?string $companyName = null,
        ?string $phone = null,
        ?string $state = null,
        ?string $city = null,
        ?string $street = null,
        ?string $zipCode = null,
        ?string $numberOfEmployees = null,
        ?string $timeFormat = null,
    ): Response {
        return $this->connector->send(new UpdateAccountRequest($accountId, $email, $countryCode, $industryTag, $timeZone, $href, $firstName, $lastName, $companyName, $phone, $state, $city, $street, $zipCode, $numberOfEmployees, $timeFormat));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getAccountBadge(): Response
    {
        return $this->connector->send(new GetAccountBadgeRequest);
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function updateAccountBadge(
        string $status,
        ?string $type = null,
    ): Response {
        return $this->connector->send(new UpdateAccountBadgeRequest($status, $type));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getAccountBilling(
        array $fields = [],
    ): Response {
        return $this->connector->send(new GetAccountBillingRequest($fields));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getAccountBlocklist(
        array $queryParameters = [],
    ): Response {
        return $this->connector->send(new GetAccountBlocklistRequest($queryParameters));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function updateAccountBlocklist(
        array $masks,
        ?string $additionalFlags = null,
    ): Response {
        return $this->connector->send(new UpdateAccountBlocklistRequest($masks, $additionalFlags));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function disableCallbacks(): Response
    {
        return $this->connector->send(new DisableCallbacksRequest);
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getCallbacks(): Response
    {
        return $this->connector->send(new GetCallbacksRequest);
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function updateCallbacks(
        ?string $url = null,
        ?array $actions = null,
    ): Response {
        return $this->connector->send(new UpdateCallbacksRequest($url, $actions));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getIndustries(
        array $fields = [],
        ?int $perPage = null,
        ?int $page = null,
    ): Response {
        return $this->connector->send(new GetIndustriesRequest($fields, $perPage, $page));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getAccountLoginHistory(
        array $fields = [],
        ?int $perPage = null,
        ?int $page = null,
    ): Response {
        return $this->connector->send(new GetAccountLoginHistoryRequest($fields, $perPage, $page));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getSendingLimits(
        array $fields = [],
    ): Response {
        return $this->connector->send(new GetSendingLimitsRequest($fields));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getTimezones(
        array $fields = [],
    ): Response {
        return $this->connector->send(new GetTimezonesRequest($fields));
    }
}
