<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Suppressions;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Update a suppression list by ID
 *
 * POST /suppressions/{suppressionId}
 */
class UpdateSuppressionRequest extends Request implements HasBody
{
    protected Method $method = Method::POST;

    use HasJsonBody;

    public function __construct(
        protected readonly string $suppressionId,
        protected readonly string $name,
        protected readonly array $masks,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/suppressions/'.$this->suppressionId;
    }

    protected function defaultBody(): array
    {
        return [
            'name' => $this->name,
            'masks' => $this->masks,
        ];
    }
}
