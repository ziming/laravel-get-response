<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Webinars;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetWebinarByIdRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(protected readonly string $webinarId, protected readonly array $fields = []) {}

    protected function defaultQuery(): array
    {
        return [
            'fields' => implode(',', $this->fields),
        ];
    }

    public function resolveEndpoint(): string
    {
        return '/webinars/'.$this->webinarId;
    }
}
