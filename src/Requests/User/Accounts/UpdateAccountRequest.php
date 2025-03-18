<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\User\Accounts;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class UpdateAccountRequest extends Request implements HasBody
{
    protected Method $method = Method::POST;

    use HasJsonBody;

    public function __construct(
        protected readonly ?string $firstName,
        protected readonly ?string $lastName,
        protected readonly ?string $companyName,
        protected readonly ?string $phone,
        protected readonly ?string $state,
        protected readonly ?string $city,
        protected readonly ?string $street,
        protected readonly ?string $zipCode,
        protected readonly ?string $numberOfEmployees, // enum 50, 250, 500, more
        protected readonly ?string $timeFormat, // enum 12h, 24h
    ){}

    protected function defaultBody(): array
    {
        return [
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'companyName' => $this->companyName,
            'phone' => $this->phone,
            'state' => $this->state,
            'city' => $this->city,
            'street' => $this->street,
            'zipCode' => $this->zipCode,
            'numberOfEmployees' => $this->numberOfEmployees,
            'timeFormat' => $this->timeFormat,
        ];
    }

    public function resolveEndpoint(): string
    {
        return '/accounts';
    }
}
