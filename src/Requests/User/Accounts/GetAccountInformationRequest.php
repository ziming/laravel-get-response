<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\User\Accounts;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetAccountInformationRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(protected readonly array $fields = []) {}

    protected function defaultQuery(): array
    {
        return [
            'fields' => implode(',', $this->fields),
        ];
    }

    public function resolveEndpoint(): string
    {
        return '/accounts';
    }
}
