<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Resources;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Ziming\LaravelGetResponse\Requests\ProductVariants\CreateProductVariantRequest;
use Ziming\LaravelGetResponse\Requests\ProductVariants\DeleteProductVariantRequest;
use Ziming\LaravelGetResponse\Requests\ProductVariants\GetProductVariantByIdRequest;
use Ziming\LaravelGetResponse\Requests\ProductVariants\GetProductVariantListRequest;
use Ziming\LaravelGetResponse\Requests\ProductVariants\UpdateProductVariantRequest;

class ProductVariantsResource extends BaseResource
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getProductVariantList(
        string $shopId,
        string $productId,
        array $queryParameters = [],
        array $sortParameters = [],
        array $fields = [],
        ?int $perPage = null,
        ?int $page = null,
    ): Response {
        return $this->connector->send(new GetProductVariantListRequest($shopId, $productId, $queryParameters, $sortParameters, $fields, $perPage, $page));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function createProductVariant(
        string $shopId,
        string $productId,
        string $name,
        string $sku,
        float $price,
        float $priceTax,
        ?string $variantId = null,
        ?string $href = null,
        ?string $url = null,
        ?float $previousPrice = null,
        ?float $previousPriceTax = null,
        ?int $quantity = null,
        ?int $position = null,
        ?string $barcode = null,
        ?string $externalId = null,
        ?string $description = null,
        ?array $images = null,
        ?array $metaFields = null,
        ?array $taxes = null,
    ): Response {
        return $this->connector->send(new CreateProductVariantRequest($shopId, $productId, $name, $sku, $price, $priceTax, $variantId, $href, $url, $previousPrice, $previousPriceTax, $quantity, $position, $barcode, $externalId, $description, $images, $metaFields, $taxes));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function deleteProductVariant(
        string $shopId,
        string $productId,
        string $variantId,
    ): Response {
        return $this->connector->send(new DeleteProductVariantRequest($shopId, $productId, $variantId));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getProductVariantById(
        string $shopId,
        string $productId,
        string $variantId,
        array $fields = [],
    ): Response {
        return $this->connector->send(new GetProductVariantByIdRequest($shopId, $productId, $variantId, $fields));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function updateProductVariant(
        string $shopId,
        string $productId,
        string $variantId,
        ?string $href = null,
        ?string $name = null,
        ?string $url = null,
        ?string $sku = null,
        ?float $price = null,
        ?float $priceTax = null,
        ?float $previousPrice = null,
        ?float $previousPriceTax = null,
        ?int $quantity = null,
        ?int $position = null,
        ?string $barcode = null,
        ?string $externalId = null,
        ?string $description = null,
        ?array $images = null,
        ?array $metaFields = null,
        ?array $taxes = null,
        ?string $createdOn = null,
        ?string $updatedOn = null,
    ): Response {
        return $this->connector->send(new UpdateProductVariantRequest($shopId, $productId, $variantId, $href, $name, $url, $sku, $price, $priceTax, $previousPrice, $previousPriceTax, $quantity, $position, $barcode, $externalId, $description, $images, $metaFields, $taxes, $createdOn, $updatedOn));
    }
}
