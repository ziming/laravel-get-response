<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\User\Accounts;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetAccountBlocklistMasksRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(protected readonly string $mask){}

    protected function defaultQuery(): array
    {
        return [
            'mask' => $this->mask,
        ];
    }

    public function resolveEndpoint(): string
    {
        return '/accounts/blocklists';
    }
}
