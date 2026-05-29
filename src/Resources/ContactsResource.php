<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Resources;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Ziming\LaravelGetResponse\Requests\Contacts\CreateBatchContactsRequest;
use Ziming\LaravelGetResponse\Requests\Contacts\CreateContactRequest;
use Ziming\LaravelGetResponse\Requests\Contacts\DeleteContactRequest;
use Ziming\LaravelGetResponse\Requests\Contacts\GetActivitiesRequest;
use Ziming\LaravelGetResponse\Requests\Contacts\GetContactByIdRequest;
use Ziming\LaravelGetResponse\Requests\Contacts\GetContactConsentsByIdRequest;
use Ziming\LaravelGetResponse\Requests\Contacts\GetContactListRequest;
use Ziming\LaravelGetResponse\Requests\Contacts\GetContactsFromCampaignRequest;
use Ziming\LaravelGetResponse\Requests\Contacts\UpdateContactRequest;
use Ziming\LaravelGetResponse\Requests\Contacts\UpsertContactCustomsRequest;
use Ziming\LaravelGetResponse\Requests\Contacts\UpsertTagsRequest;

class ContactsResource extends BaseResource
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getContactsFromCampaign(
        string $campaignId,
        array $queryParameters = [],
        array $sortParameters = [],
        array $fields = [],
        ?int $perPage = null,
        ?int $page = null,
    ): Response {
        return $this->connector->send(new GetContactsFromCampaignRequest($campaignId, $queryParameters, $sortParameters, $fields, $perPage, $page));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getContactList(
        array $queryParameters = [],
        array $sortParameters = [],
        array $fields = [],
        ?int $perPage = null,
        ?int $page = null,
        ?string $additionalFlags = null,
    ): Response {
        return $this->connector->send(new GetContactListRequest($queryParameters, $sortParameters, $fields, $perPage, $page, $additionalFlags));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function createContact(
        array $campaign,
        string $email,
        ?string $contactId = null,
        ?string $name = null,
        ?string $origin = null,
        ?string $timeZone = null,
        ?string $activities = null,
        ?string $changedOn = null,
        ?string $createdOn = null,
        ?string $dayOfCycle = null,
        ?float $scoring = null,
        ?int $engagementScore = null,
        ?string $href = null,
        ?string $ipAddress = null,
        ?array $tags = null,
        ?array $customFieldValues = null,
    ): Response {
        return $this->connector->send(new CreateContactRequest($campaign, $email, $contactId, $name, $origin, $timeZone, $activities, $changedOn, $createdOn, $dayOfCycle, $scoring, $engagementScore, $href, $ipAddress, $tags, $customFieldValues));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function createBatchContacts(
        string $campaignId,
        array $contacts,
    ): Response {
        return $this->connector->send(new CreateBatchContactsRequest($campaignId, $contacts));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function deleteContact(
        string $contactId,
        ?string $messageId = null,
        ?string $ipAddress = null,
    ): Response {
        return $this->connector->send(new DeleteContactRequest($contactId, $messageId, $ipAddress));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getContactById(
        string $contactId,
        array $fields = [],
    ): Response {
        return $this->connector->send(new GetContactByIdRequest($contactId, $fields));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function updateContact(
        string $contactId,
        ?string $name = null,
        ?string $origin = null,
        ?string $timeZone = null,
        ?string $activities = null,
        ?string $changedOn = null,
        ?string $createdOn = null,
        ?array $campaign = null,
        ?string $email = null,
        ?string $dayOfCycle = null,
        ?float $scoring = null,
        ?int $engagementScore = null,
        ?string $href = null,
        ?string $note = null,
        ?array $tags = null,
        ?array $customFieldValues = null,
    ): Response {
        return $this->connector->send(new UpdateContactRequest($contactId, $name, $origin, $timeZone, $activities, $changedOn, $createdOn, $campaign, $email, $dayOfCycle, $scoring, $engagementScore, $href, $note, $tags, $customFieldValues));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getActivities(
        string $contactId,
        array $queryParameters = [],
        array $fields = [],
        ?int $perPage = null,
        ?int $page = null,
    ): Response {
        return $this->connector->send(new GetActivitiesRequest($contactId, $queryParameters, $fields, $perPage, $page));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getContactConsentsById(
        string $contactId,
        array $fields = [],
    ): Response {
        return $this->connector->send(new GetContactConsentsByIdRequest($contactId, $fields));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function upsertContactCustoms(
        string $contactId,
        array $customFieldValues,
    ): Response {
        return $this->connector->send(new UpsertContactCustomsRequest($contactId, $customFieldValues));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function upsertTags(
        string $contactId,
        array $tags,
    ): Response {
        return $this->connector->send(new UpsertTagsRequest($contactId, $tags));
    }
}
