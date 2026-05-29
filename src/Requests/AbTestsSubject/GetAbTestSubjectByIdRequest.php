<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\AbTestsSubject;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get a single A/B test by ID
 *
 * GET /ab-tests/subject/{abTestId}
 */
class GetAbTestSubjectByIdRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly string $abTestId,
        protected readonly array $fields = [],
    ) {}

    public function resolveEndpoint(): string
    {
        return '/ab-tests/subject/'.$this->abTestId;
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'fields' => implode(',', $this->fields),
        ]);
    }
}
