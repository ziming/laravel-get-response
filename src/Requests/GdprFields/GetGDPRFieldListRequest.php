<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\GdprFields;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get the GDPR fields list
 *
 * GET /gdpr-fields
 */
class GetGDPRFieldListRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly array $sortParameters = [],
        protected readonly array $fields = [],
        protected readonly ?int $perPage = null,
        protected readonly ?int $page = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/gdpr-fields';
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'sort' => $this->sortParameters,
            'fields' => implode(',', $this->fields),
            'perPage' => $this->perPage,
            'page' => $this->page,
        ]);
    }
}
