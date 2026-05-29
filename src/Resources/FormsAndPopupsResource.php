<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Resources;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Ziming\LaravelGetResponse\Requests\FormsAndPopups\GetPopupDetailsRequest;
use Ziming\LaravelGetResponse\Requests\FormsAndPopups\GetPopupsListRequest;

class FormsAndPopupsResource extends BaseResource
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getPopupsList(
        array $queryParameters = [],
        array $sortParameters = [],
        array $stats = [],
        array $fields = [],
        ?int $perPage = null,
        ?int $page = null,
    ): Response {
        return $this->connector->send(new GetPopupsListRequest($queryParameters, $sortParameters, $stats, $fields, $perPage, $page));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getPopupDetails(
        string $popupId,
        array $fields = [],
    ): Response {
        return $this->connector->send(new GetPopupDetailsRequest($popupId, $fields));
    }
}
