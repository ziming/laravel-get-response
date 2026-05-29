<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Contacts;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create multiple contacts at once
 *
 * POST /contacts/batch
 */
class CreateBatchContactsRequest extends Request implements HasBody
{
    protected Method $method = Method::POST;

    use HasJsonBody;

    public function __construct(
        protected readonly string $campaignId,
        protected readonly array $contacts,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/contacts/batch';
    }

    protected function defaultBody(): array
    {
        return [
            'campaignId' => $this->campaignId,
            'contacts' => $this->contacts,
        ];
    }
}
