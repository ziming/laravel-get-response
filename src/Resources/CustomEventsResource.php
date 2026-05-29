<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Resources;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Ziming\LaravelGetResponse\Requests\CustomEvents\CreateCustomEventRequest;
use Ziming\LaravelGetResponse\Requests\CustomEvents\DeleteCustomEventRequest;
use Ziming\LaravelGetResponse\Requests\CustomEvents\GetCustomEventByIdRequest;
use Ziming\LaravelGetResponse\Requests\CustomEvents\GetCustomEventsListRequest;
use Ziming\LaravelGetResponse\Requests\CustomEvents\TriggerCustomEventRequest;
use Ziming\LaravelGetResponse\Requests\CustomEvents\UpdateCustomEventRequest;

class CustomEventsResource extends BaseResource
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getCustomEventsList(
        array $queryParameters = [],
        array $sortParameters = [],
        array $fields = [],
        ?int $perPage = null,
        ?int $page = null,
    ): Response {
        return $this->connector->send(new GetCustomEventsListRequest($queryParameters, $sortParameters, $fields, $perPage, $page));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function createCustomEvent(
        string $name,
        array $attributes,
    ): Response {
        return $this->connector->send(new CreateCustomEventRequest($name, $attributes));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function triggerCustomEvent(
        string $name,
        string $contactId,
        ?array $attributes = null,
    ): Response {
        return $this->connector->send(new TriggerCustomEventRequest($name, $contactId, $attributes));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function deleteCustomEvent(
        string $customEventId,
    ): Response {
        return $this->connector->send(new DeleteCustomEventRequest($customEventId));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getCustomEventById(
        string $customEventId,
        array $fields = [],
    ): Response {
        return $this->connector->send(new GetCustomEventByIdRequest($customEventId, $fields));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function updateCustomEvent(
        string $customEventId,
        string $name,
        array $attributes,
    ): Response {
        return $this->connector->send(new UpdateCustomEventRequest($customEventId, $name, $attributes));
    }
}
