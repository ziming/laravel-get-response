<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Tags;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Delete tag by ID
 *
 * DELETE /tags/{tagId}
 */
class DeleteTagRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(
        protected readonly string $tagId,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/tags/'.$this->tagId;
    }
}
