<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\AbTestsSubject;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Delete A/B test
 *
 * DELETE /ab-tests/{abTestId}
 */
class DeleteAbTestRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(
        protected readonly string $abTestId,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/ab-tests/'.$this->abTestId;
    }
}
