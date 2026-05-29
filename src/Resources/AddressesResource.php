<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Resources;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Ziming\LaravelGetResponse\Requests\Addresses\CreateAddressRequest;
use Ziming\LaravelGetResponse\Requests\Addresses\DeleteAddressRequest;
use Ziming\LaravelGetResponse\Requests\Addresses\GetAddressListRequest;
use Ziming\LaravelGetResponse\Requests\Addresses\GetAddressRequest;
use Ziming\LaravelGetResponse\Requests\Addresses\UpdateAddressRequest;

class AddressesResource extends BaseResource
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getAddressList(
        array $queryParameters = [],
        array $sortParameters = [],
        array $fields = [],
        ?int $perPage = null,
        ?int $page = null,
    ): Response {
        return $this->connector->send(new GetAddressListRequest($queryParameters, $sortParameters, $fields, $perPage, $page));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function createAddress(
        string $countryCode,
        string $name,
        ?string $addressId = null,
        ?string $href = null,
        ?string $countryName = null,
        ?string $firstName = null,
        ?string $lastName = null,
        ?string $address1 = null,
        ?string $address2 = null,
        ?string $city = null,
        ?string $zip = null,
        ?string $province = null,
        ?string $provinceCode = null,
        ?string $phone = null,
        ?string $company = null,
        ?string $createdOn = null,
        ?string $updatedOn = null,
    ): Response {
        return $this->connector->send(new CreateAddressRequest($countryCode, $name, $addressId, $href, $countryName, $firstName, $lastName, $address1, $address2, $city, $zip, $province, $provinceCode, $phone, $company, $createdOn, $updatedOn));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function deleteAddress(
        string $addressId,
    ): Response {
        return $this->connector->send(new DeleteAddressRequest($addressId));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getAddress(
        string $addressId,
        array $fields = [],
    ): Response {
        return $this->connector->send(new GetAddressRequest($addressId, $fields));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function updateAddress(
        string $addressId,
        ?string $href = null,
        ?string $countryCode = null,
        ?string $countryName = null,
        ?string $name = null,
        ?string $firstName = null,
        ?string $lastName = null,
        ?string $address1 = null,
        ?string $address2 = null,
        ?string $city = null,
        ?string $zip = null,
        ?string $province = null,
        ?string $provinceCode = null,
        ?string $phone = null,
        ?string $company = null,
        ?string $createdOn = null,
        ?string $updatedOn = null,
    ): Response {
        return $this->connector->send(new UpdateAddressRequest($addressId, $href, $countryCode, $countryName, $name, $firstName, $lastName, $address1, $address2, $city, $zip, $province, $provinceCode, $phone, $company, $createdOn, $updatedOn));
    }
}
