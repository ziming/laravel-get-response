<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Resources;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Ziming\LaravelGetResponse\Requests\SubscriptionConfirmations\GetSubscriptionConfirmationBodyListRequest;
use Ziming\LaravelGetResponse\Requests\SubscriptionConfirmations\GetSubscriptionConfirmationSubjectListRequest;

class SubscriptionConfirmationsResource extends BaseResource
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getSubscriptionConfirmationBodyList(
        string $languageCode,
        array $fields = [],
    ): Response {
        return $this->connector->send(new GetSubscriptionConfirmationBodyListRequest($languageCode, $fields));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getSubscriptionConfirmationSubjectList(
        string $languageCode,
        array $fields = [],
    ): Response {
        return $this->connector->send(new GetSubscriptionConfirmationSubjectListRequest($languageCode, $fields));
    }
}
