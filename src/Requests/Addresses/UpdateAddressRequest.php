<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Addresses;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Update address
 *
 * POST /addresses/{addressId}
 */
class UpdateAddressRequest extends Request implements HasBody
{
    protected Method $method = Method::POST;

    use HasJsonBody;

    public function __construct(
        protected readonly string $addressId,
        protected readonly ?string $href = null,
        protected readonly ?string $countryCode = null,
        protected readonly ?string $countryName = null,
        protected readonly ?string $name = null,
        protected readonly ?string $firstName = null,
        protected readonly ?string $lastName = null,
        protected readonly ?string $address1 = null,
        protected readonly ?string $address2 = null,
        protected readonly ?string $city = null,
        protected readonly ?string $zip = null,
        protected readonly ?string $province = null,
        protected readonly ?string $provinceCode = null,
        protected readonly ?string $phone = null,
        protected readonly ?string $company = null,
        protected readonly ?string $createdOn = null,
        protected readonly ?string $updatedOn = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/addresses/'.$this->addressId;
    }

    protected function defaultBody(): array
    {
        return array_filter([
            'href' => $this->href,
            'countryCode' => $this->countryCode,
            'countryName' => $this->countryName,
            'name' => $this->name,
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'address1' => $this->address1,
            'address2' => $this->address2,
            'city' => $this->city,
            'zip' => $this->zip,
            'province' => $this->province,
            'provinceCode' => $this->provinceCode,
            'phone' => $this->phone,
            'company' => $this->company,
            'createdOn' => $this->createdOn,
            'updatedOn' => $this->updatedOn,
        ], static fn ($value): bool => $value !== null);
    }
}
