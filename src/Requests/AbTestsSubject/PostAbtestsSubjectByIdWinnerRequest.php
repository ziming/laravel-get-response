<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\AbTestsSubject;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Choose A/B test winner
 *
 * POST /ab-tests/subject/{abTestId}/winner
 */
class PostAbtestsSubjectByIdWinnerRequest extends Request implements HasBody
{
    protected Method $method = Method::POST;

    use HasJsonBody;

    public function __construct(
        protected readonly string $abTestId,
        protected readonly string $variantId,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/ab-tests/subject/'.$this->abTestId.'/winner';
    }

    protected function defaultBody(): array
    {
        return [
            'variantId' => $this->variantId,
        ];
    }
}
