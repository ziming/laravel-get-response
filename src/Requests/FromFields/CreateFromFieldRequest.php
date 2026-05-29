<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\FromFields;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create 'From' address
 *
 * POST /from-fields
 */
class CreateFromFieldRequest extends Request implements HasBody
{
    protected Method $method = Method::POST;

    use HasJsonBody;

    public function __construct(
        protected readonly string $email,
        protected readonly string $name,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/from-fields';
    }

    protected function defaultBody(): array
    {
        return [
            'email' => $this->email,
            'name' => $this->name,
        ];
    }
}
