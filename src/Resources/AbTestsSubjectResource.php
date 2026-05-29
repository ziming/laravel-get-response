<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Resources;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Ziming\LaravelGetResponse\Requests\AbTestsSubject\CancelAbTestRequest;
use Ziming\LaravelGetResponse\Requests\AbTestsSubject\CreateSubjectAbTestRequest;
use Ziming\LaravelGetResponse\Requests\AbTestsSubject\DeleteAbTestRequest;
use Ziming\LaravelGetResponse\Requests\AbTestsSubject\GetAbTestSubjectByIdRequest;
use Ziming\LaravelGetResponse\Requests\AbTestsSubject\GetAbTestSubjectListRequest;
use Ziming\LaravelGetResponse\Requests\AbTestsSubject\PostAbtestsSubjectByIdWinnerRequest;

class AbTestsSubjectResource extends BaseResource
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getAbTestSubjectList(
        array $queryParameters = [],
        array $sortParameters = [],
        array $fields = [],
        ?int $perPage = null,
        ?int $page = null,
    ): Response {
        return $this->connector->send(new GetAbTestSubjectListRequest($queryParameters, $sortParameters, $fields, $perPage, $page));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function createSubjectAbTest(
        string $name,
        array $campaign,
        array $fromField,
        array $deliverySettings,
        array $variants,
        array $sendSettings,
        array $content,
        ?string $abTestId = null,
        ?array $replyTo = null,
        ?array $flags = null,
    ): Response {
        return $this->connector->send(new CreateSubjectAbTestRequest($name, $campaign, $fromField, $deliverySettings, $variants, $sendSettings, $content, $abTestId, $replyTo, $flags));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getAbTestSubjectById(
        string $abTestId,
        array $fields = [],
    ): Response {
        return $this->connector->send(new GetAbTestSubjectByIdRequest($abTestId, $fields));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function postAbtestsSubjectByIdWinner(
        string $abTestId,
        string $variantId,
    ): Response {
        return $this->connector->send(new PostAbtestsSubjectByIdWinnerRequest($abTestId, $variantId));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function deleteAbTest(
        string $abTestId,
    ): Response {
        return $this->connector->send(new DeleteAbTestRequest($abTestId));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function cancelAbTest(
        string $abTestId,
    ): Response {
        return $this->connector->send(new CancelAbTestRequest($abTestId));
    }
}
