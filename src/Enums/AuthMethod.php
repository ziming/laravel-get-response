<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Enums;

/**
 * The authentication method used when talking to the GetResponse API.
 *
 * @see https://apireference.getresponse.com/#section/Authentication
 */
enum AuthMethod
{
    /**
     * API key sent verbatim in the `X-Auth-Token` header.
     *
     * The value must be prefixed with `api-key `, e.g. `api-key your-secret-key`.
     */
    case ApiKey;

    /**
     * OAuth 2.0 access token sent as `Authorization: Bearer <token>`.
     */
    case OAuth2;
}
