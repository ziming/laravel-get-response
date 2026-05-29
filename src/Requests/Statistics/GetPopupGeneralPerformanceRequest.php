<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Statistics;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get statistics for a single form or popup
 *
 * GET /statistics/popups/{popupId}/performance
 */
class GetPopupGeneralPerformanceRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly string $popupId,
        protected readonly array $queryParameters = [],
        protected readonly array $fields = [],
    ) {}

    public function resolveEndpoint(): string
    {
        return '/statistics/popups/'.$this->popupId.'/performance';
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'query' => $this->queryParameters,
            'fields' => implode(',', $this->fields),
        ]);
    }
}
