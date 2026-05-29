<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\FormsAndPopups;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get a single form or popup by ID
 *
 * GET /popups/{popupId}
 */
class GetPopupDetailsRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly string $popupId,
        protected readonly array $fields = [],
    ) {}

    public function resolveEndpoint(): string
    {
        return '/popups/'.$this->popupId;
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'fields' => implode(',', $this->fields),
        ]);
    }
}
