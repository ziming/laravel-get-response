<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\User\Accounts;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class UpdateAccountBlocklistRequest extends Request implements HasBody
{
    protected Method $method = Method::POST;

    use HasJsonBody;

    public function __construct(
        protected readonly array $masks,
        protected readonly ?string $additionalFlags,
    ){}

    protected function defaultQuery(): array
    {
        return [
            'additionalFlags' => $this->additionalFlags,
        ];
    }

    protected function defaultBody(): array
    {
        return [
            'masks' => $this->masks,
        ];
    }

    public function resolveEndpoint(): string
    {
        return '/accounts/blocklists';
    }
}
