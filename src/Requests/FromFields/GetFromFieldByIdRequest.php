<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\FromFields;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get a single 'From' address by ID
 *
 * GET /from-fields/{fromFieldId}
 */
class GetFromFieldByIdRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly string $fromFieldId,
        protected readonly array $fields = [],
    ) {}

    public function resolveEndpoint(): string
    {
        return '/from-fields/'.$this->fromFieldId;
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'fields' => implode(',', $this->fields),
        ]);
    }
}
