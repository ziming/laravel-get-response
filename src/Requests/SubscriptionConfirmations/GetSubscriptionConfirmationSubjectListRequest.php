<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\SubscriptionConfirmations;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get collection of SUBSCRIPTION CONFIRMATIONS subjects
 *
 * GET /subscription-confirmations/subject/{languageCode}
 */
class GetSubscriptionConfirmationSubjectListRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly string $languageCode,
        protected readonly array $fields = [],
    ) {}

    public function resolveEndpoint(): string
    {
        return '/subscription-confirmations/subject/'.$this->languageCode;
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'fields' => implode(',', $this->fields),
        ]);
    }
}
