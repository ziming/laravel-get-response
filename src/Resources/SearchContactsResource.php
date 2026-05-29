<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Resources;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Ziming\LaravelGetResponse\Requests\SearchContacts\DeleteSearchContactsRequest;
use Ziming\LaravelGetResponse\Requests\SearchContacts\GetContactsByIdSearchContactsRequest;
use Ziming\LaravelGetResponse\Requests\SearchContacts\GetContactsFromSearchContactsConditionsRequest;
use Ziming\LaravelGetResponse\Requests\SearchContacts\GetSearchContactsByIdRequest;
use Ziming\LaravelGetResponse\Requests\SearchContacts\GetSearchContactsListRequest;
use Ziming\LaravelGetResponse\Requests\SearchContacts\NewSearchContactsRequest;
use Ziming\LaravelGetResponse\Requests\SearchContacts\UpdateSearchContactsRequest;
use Ziming\LaravelGetResponse\Requests\SearchContacts\UpsertCustomFieldsBySearchContactIdRequest;

class SearchContactsResource extends BaseResource
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getSearchContactsList(
        array $queryParameters = [],
        array $sortParameters = [],
        array $fields = [],
        ?int $perPage = null,
        ?int $page = null,
    ): Response {
        return $this->connector->send(new GetSearchContactsListRequest($queryParameters, $sortParameters, $fields, $perPage, $page));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function newSearchContacts(
        string $sectionLogicOperator,
        array $section,
        string $name,
        ?array $subscribersType = null,
        ?string $searchContactId = null,
        ?string $createdOn = null,
        ?string $href = null,
    ): Response {
        return $this->connector->send(new NewSearchContactsRequest($sectionLogicOperator, $section, $name, $subscribersType, $searchContactId, $createdOn, $href));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getContactsFromSearchContactsConditions(
        array $subscribersType,
        string $sectionLogicOperator,
        array $section,
        array $sortParameters = [],
        array $fields = [],
        ?int $perPage = null,
        ?int $page = null,
    ): Response {
        return $this->connector->send(new GetContactsFromSearchContactsConditionsRequest($subscribersType, $sectionLogicOperator, $section, $sortParameters, $fields, $perPage, $page));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function deleteSearchContacts(
        string $searchContactId,
    ): Response {
        return $this->connector->send(new DeleteSearchContactsRequest($searchContactId));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getSearchContactsById(
        string $searchContactId,
        array $fields = [],
    ): Response {
        return $this->connector->send(new GetSearchContactsByIdRequest($searchContactId, $fields));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function updateSearchContacts(
        string $searchContactId,
        string $sectionLogicOperator,
        array $section,
        string $name,
        ?array $subscribersType = null,
        ?string $createdOn = null,
        ?string $href = null,
    ): Response {
        return $this->connector->send(new UpdateSearchContactsRequest($searchContactId, $sectionLogicOperator, $section, $name, $subscribersType, $createdOn, $href));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getContactsByIdSearchContacts(
        string $searchContactId,
        array $sortParameters = [],
        array $fields = [],
        ?int $perPage = null,
        ?int $page = null,
    ): Response {
        return $this->connector->send(new GetContactsByIdSearchContactsRequest($searchContactId, $sortParameters, $fields, $perPage, $page));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function upsertCustomFieldsBySearchContactId(
        string $searchContactId,
        array $customFieldValues,
    ): Response {
        return $this->connector->send(new UpsertCustomFieldsBySearchContactIdRequest($searchContactId, $customFieldValues));
    }
}
