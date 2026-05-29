<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\FromFields;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Set a 'From' address as default
 *
 * POST /from-fields/{fromFieldId}/default
 */
class SetFromFieldAsDefaultRequest extends Request
{
    protected Method $method = Method::POST;

    public function __construct(
        protected readonly string $fromFieldId,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/from-fields/'.$this->fromFieldId.'/default';
    }
}
