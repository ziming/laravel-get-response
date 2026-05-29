<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\AbTestsSubject;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create a new A/B test
 *
 * POST /ab-tests/subject
 */
class CreateSubjectAbTestRequest extends Request implements HasBody
{
    protected Method $method = Method::POST;

    use HasJsonBody;

    public function __construct(
        protected readonly string $name,
        protected readonly array $campaign,
        protected readonly array $fromField,
        protected readonly array $deliverySettings,
        protected readonly array $variants,
        protected readonly array $sendSettings,
        protected readonly array $content,
        protected readonly ?string $abTestId = null,
        protected readonly ?array $replyTo = null,
        protected readonly ?array $flags = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/ab-tests/subject';
    }

    protected function defaultBody(): array
    {
        return array_filter([
            'name' => $this->name,
            'campaign' => $this->campaign,
            'fromField' => $this->fromField,
            'deliverySettings' => $this->deliverySettings,
            'variants' => $this->variants,
            'sendSettings' => $this->sendSettings,
            'content' => $this->content,
            'abTestId' => $this->abTestId,
            'replyTo' => $this->replyTo,
            'flags' => $this->flags,
        ], static fn ($value): bool => $value !== null);
    }
}
