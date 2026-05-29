<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Addresses;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create address
 *
 * POST /addresses
 */
class CreateAddressRequest extends Request implements HasBody
{
    protected Method $method = Method::POST;

    use HasJsonBody;

    public function __construct(
        protected readonly string $countryCode,
        protected readonly string $name,
        protected readonly ?string $addressId = null,
        protected readonly ?string $href = null,
        protected readonly ?string $countryName = null,
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
        return '/addresses';
    }

    protected function defaultBody(): array
    {
        return array_filter([
            'countryCode' => $this->countryCode,
            'name' => $this->name,
            'addressId' => $this->addressId,
            'href' => $this->href,
            'countryName' => $this->countryName,
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
