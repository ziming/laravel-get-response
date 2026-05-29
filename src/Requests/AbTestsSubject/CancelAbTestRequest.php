<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\AbTestsSubject;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Cancel A/B test
 *
 * POST /ab-tests/{abTestId}/cancel
 */
class CancelAbTestRequest extends Request
{
    protected Method $method = Method::POST;

    public function __construct(
        protected readonly string $abTestId,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/ab-tests/'.$this->abTestId.'/cancel';
    }
}
