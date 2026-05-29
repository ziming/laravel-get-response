<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Accounts;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Update account
 *
 * POST /accounts
 */
class UpdateAccountRequest extends Request implements HasBody
{
    protected Method $method = Method::POST;

    use HasJsonBody;

    public function __construct(
        protected readonly ?string $accountId = null,
        protected readonly ?string $email = null,
        protected readonly ?array $countryCode = null,
        protected readonly ?array $industryTag = null,
        protected readonly ?array $timeZone = null,
        protected readonly ?string $href = null,
        protected readonly ?string $firstName = null,
        protected readonly ?string $lastName = null,
        protected readonly ?string $companyName = null,
        protected readonly ?string $phone = null,
        protected readonly ?string $state = null,
        protected readonly ?string $city = null,
        protected readonly ?string $street = null,
        protected readonly ?string $zipCode = null,
        protected readonly ?string $numberOfEmployees = null,
        protected readonly ?string $timeFormat = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/accounts';
    }

    protected function defaultBody(): array
    {
        return array_filter([
            'accountId' => $this->accountId,
            'email' => $this->email,
            'countryCode' => $this->countryCode,
            'industryTag' => $this->industryTag,
            'timeZone' => $this->timeZone,
            'href' => $this->href,
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
        ], static fn ($value): bool => $value !== null);
    }
}
