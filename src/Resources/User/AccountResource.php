<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Resources\User;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Ziming\LaravelGetResponse\Requests\User\Accounts\GetAccountInformationRequest;

class AccountResource extends BaseResource
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getAccoountInformation(array $fields): Response
    {
        return $this->connector->send(new GetAccountInformationRequest($fields));
    }
}
