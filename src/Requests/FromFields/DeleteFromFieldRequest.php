<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\FromFields;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Delete 'From' address
 *
 * DELETE /from-fields/{fromFieldId}
 */
class DeleteFromFieldRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(
        protected readonly string $fromFieldId,
        protected readonly ?string $fromFieldIdToReplaceWith = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/from-fields/'.$this->fromFieldId;
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'fromFieldIdToReplaceWith' => $this->fromFieldIdToReplaceWith,
        ]);
    }
}
