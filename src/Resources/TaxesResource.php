<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Resources;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Ziming\LaravelGetResponse\Requests\Taxes\CreateTaxRequest;
use Ziming\LaravelGetResponse\Requests\Taxes\DeleteTaxRequest;
use Ziming\LaravelGetResponse\Requests\Taxes\GetTaxByIdRequest;
use Ziming\LaravelGetResponse\Requests\Taxes\GetTaxListRequest;
use Ziming\LaravelGetResponse\Requests\Taxes\UpdateTaxRequest;

class TaxesResource extends BaseResource
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getTaxList(
        string $shopId,
        array $queryParameters = [],
        array $sortParameters = [],
        array $fields = [],
        ?int $perPage = null,
        ?int $page = null,
    ): Response {
        return $this->connector->send(new GetTaxListRequest($shopId, $queryParameters, $sortParameters, $fields, $perPage, $page));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function createTax(
        string $shopId,
        string $name,
        float $rate,
        ?string $taxId = null,
        ?string $href = null,
    ): Response {
        return $this->connector->send(new CreateTaxRequest($shopId, $name, $rate, $taxId, $href));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function deleteTax(
        string $shopId,
        string $taxId,
    ): Response {
        return $this->connector->send(new DeleteTaxRequest($shopId, $taxId));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getTaxById(
        string $shopId,
        string $taxId,
        array $fields = [],
    ): Response {
        return $this->connector->send(new GetTaxByIdRequest($shopId, $taxId, $fields));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function updateTax(
        string $shopId,
        string $taxId,
        ?string $href = null,
        ?string $name = null,
        ?float $rate = null,
    ): Response {
        return $this->connector->send(new UpdateTaxRequest($shopId, $taxId, $href, $name, $rate));
    }
}
