<?php

declare(strict_types=1);

use Ziming\LaravelGetResponse\Enums\AuthMethod;
use Ziming\LaravelGetResponse\LaravelGetResponse;
use Ziming\LaravelGetResponse\Requests\Accounts\GetAccountRequest;
use Ziming\LaravelGetResponse\Resources\AbTestsResource;
use Ziming\LaravelGetResponse\Resources\AbTestsSubjectResource;
use Ziming\LaravelGetResponse\Resources\AccountsResource;
use Ziming\LaravelGetResponse\Resources\AddressesResource;
use Ziming\LaravelGetResponse\Resources\AutorespondersResource;
use Ziming\LaravelGetResponse\Resources\CampaignsResource;
use Ziming\LaravelGetResponse\Resources\CartsResource;
use Ziming\LaravelGetResponse\Resources\CategoriesResource;
use Ziming\LaravelGetResponse\Resources\ClickTracksResource;
use Ziming\LaravelGetResponse\Resources\ContactsResource;
use Ziming\LaravelGetResponse\Resources\CustomEventsResource;
use Ziming\LaravelGetResponse\Resources\CustomFieldsResource;
use Ziming\LaravelGetResponse\Resources\CustomReportsResource;
use Ziming\LaravelGetResponse\Resources\FileLibraryResource;
use Ziming\LaravelGetResponse\Resources\FormsAndPopupsResource;
use Ziming\LaravelGetResponse\Resources\FormsResource;
use Ziming\LaravelGetResponse\Resources\FromFieldsResource;
use Ziming\LaravelGetResponse\Resources\GdprFieldsResource;
use Ziming\LaravelGetResponse\Resources\ImportsResource;
use Ziming\LaravelGetResponse\Resources\LandingPagesResource;
use Ziming\LaravelGetResponse\Resources\LegacyFormsResource;
use Ziming\LaravelGetResponse\Resources\LegacyLandingPagesResource;
use Ziming\LaravelGetResponse\Resources\MetaFieldsResource;
use Ziming\LaravelGetResponse\Resources\MultimediaResource;
use Ziming\LaravelGetResponse\Resources\NewslettersResource;
use Ziming\LaravelGetResponse\Resources\OrdersResource;
use Ziming\LaravelGetResponse\Resources\PredefinedFieldsResource;
use Ziming\LaravelGetResponse\Resources\ProductsResource;
use Ziming\LaravelGetResponse\Resources\ProductVariantsResource;
use Ziming\LaravelGetResponse\Resources\RssNewslettersResource;
use Ziming\LaravelGetResponse\Resources\SearchContactsResource;
use Ziming\LaravelGetResponse\Resources\ShopsResource;
use Ziming\LaravelGetResponse\Resources\SmsResource;
use Ziming\LaravelGetResponse\Resources\StatisticsResource;
use Ziming\LaravelGetResponse\Resources\SubscriptionConfirmationsResource;
use Ziming\LaravelGetResponse\Resources\SuppressionsResource;
use Ziming\LaravelGetResponse\Resources\TagsResource;
use Ziming\LaravelGetResponse\Resources\TaxesResource;
use Ziming\LaravelGetResponse\Resources\TrackingResource;
use Ziming\LaravelGetResponse\Resources\TransactionalEmailsResource;
use Ziming\LaravelGetResponse\Resources\TransactionalEmailTemplatesResource;
use Ziming\LaravelGetResponse\Resources\WebinarsResource;
use Ziming\LaravelGetResponse\Resources\WebsitesResource;
use Ziming\LaravelGetResponse\Resources\WorkflowsResource;

it('exposes a resource accessor for every API group', function (string $method, string $resourceClass): void {
    $connector = new LaravelGetResponse('fake-token');

    expect($connector->{$method}())->toBeInstanceOf($resourceClass);
})->with([
    'abTests' => ['abTests', AbTestsResource::class],
    'abTestsSubject' => ['abTestsSubject', AbTestsSubjectResource::class],
    'accounts' => ['accounts', AccountsResource::class],
    'addresses' => ['addresses', AddressesResource::class],
    'autoresponders' => ['autoresponders', AutorespondersResource::class],
    'campaigns' => ['campaigns', CampaignsResource::class],
    'carts' => ['carts', CartsResource::class],
    'categories' => ['categories', CategoriesResource::class],
    'clickTracks' => ['clickTracks', ClickTracksResource::class],
    'contacts' => ['contacts', ContactsResource::class],
    'customEvents' => ['customEvents', CustomEventsResource::class],
    'customFields' => ['customFields', CustomFieldsResource::class],
    'customReports' => ['customReports', CustomReportsResource::class],
    'fileLibrary' => ['fileLibrary', FileLibraryResource::class],
    'forms' => ['forms', FormsResource::class],
    'formsAndPopups' => ['formsAndPopups', FormsAndPopupsResource::class],
    'fromFields' => ['fromFields', FromFieldsResource::class],
    'gdprFields' => ['gdprFields', GdprFieldsResource::class],
    'imports' => ['imports', ImportsResource::class],
    'landingPages' => ['landingPages', LandingPagesResource::class],
    'legacyForms' => ['legacyForms', LegacyFormsResource::class],
    'legacyLandingPages' => ['legacyLandingPages', LegacyLandingPagesResource::class],
    'metaFields' => ['metaFields', MetaFieldsResource::class],
    'multimedia' => ['multimedia', MultimediaResource::class],
    'newsletters' => ['newsletters', NewslettersResource::class],
    'orders' => ['orders', OrdersResource::class],
    'predefinedFields' => ['predefinedFields', PredefinedFieldsResource::class],
    'productVariants' => ['productVariants', ProductVariantsResource::class],
    'products' => ['products', ProductsResource::class],
    'rssNewsletters' => ['rssNewsletters', RssNewslettersResource::class],
    'searchContacts' => ['searchContacts', SearchContactsResource::class],
    'shops' => ['shops', ShopsResource::class],
    'sms' => ['sms', SmsResource::class],
    'statistics' => ['statistics', StatisticsResource::class],
    'subscriptionConfirmations' => ['subscriptionConfirmations', SubscriptionConfirmationsResource::class],
    'suppressions' => ['suppressions', SuppressionsResource::class],
    'tags' => ['tags', TagsResource::class],
    'taxes' => ['taxes', TaxesResource::class],
    'tracking' => ['tracking', TrackingResource::class],
    'transactionalEmailTemplates' => ['transactionalEmailTemplates', TransactionalEmailTemplatesResource::class],
    'transactionalEmails' => ['transactionalEmails', TransactionalEmailsResource::class],
    'webinars' => ['webinars', WebinarsResource::class],
    'websites' => ['websites', WebsitesResource::class],
    'workflows' => ['workflows', WorkflowsResource::class],
]);

it('points at the GetResponse API base url', function (): void {
    expect((new LaravelGetResponse('fake-token'))->resolveBaseUrl())
        ->toBe('https://api.getresponse.com/v3/');
});

it('authenticates with an api key by default', function (): void {
    $pendingRequest = (new LaravelGetResponse('api-key secret'))
        ->createPendingRequest(new GetAccountRequest);

    expect($pendingRequest->headers()->get('X-Auth-Token'))->toBe('api-key secret')
        ->and($pendingRequest->headers()->get('Authorization'))->toBeNull();
});

it('authenticates with an api key via the named constructor', function (): void {
    $connector = LaravelGetResponse::usingApiKey('api-key secret');

    expect($connector->createPendingRequest(new GetAccountRequest)->headers()->get('X-Auth-Token'))
        ->toBe('api-key secret');
});

it('authenticates with an OAuth 2.0 bearer token', function (): void {
    $connector = LaravelGetResponse::usingOAuth('oauth-access-token');

    $pendingRequest = $connector->createPendingRequest(new GetAccountRequest);

    expect($pendingRequest->headers()->get('Authorization'))->toBe('Bearer oauth-access-token')
        ->and($pendingRequest->headers()->get('X-Auth-Token'))->toBeNull();
});

it('does not send an X-Domain header for non-MAX accounts', function (): void {
    $pendingRequest = (new LaravelGetResponse('fake-token'))
        ->createPendingRequest(new GetAccountRequest);

    expect($pendingRequest->headers()->get('X-Domain'))->toBeNull();
});

it('supports GetResponse MAX with a base url and X-Domain header', function (): void {
    $connector = LaravelGetResponse::usingApiKey(
        apiKey: 'api-key secret',
        domain: 'my-company.getresponse360.com',
        baseUrl: LaravelGetResponse::MAX_US_BASE_URL,
    );

    $pendingRequest = $connector->createPendingRequest(new GetAccountRequest);

    expect($connector->resolveBaseUrl())->toBe('https://api3.getresponse360.com/v3/')
        ->and($pendingRequest->headers()->get('X-Domain'))->toBe('my-company.getresponse360.com')
        ->and($pendingRequest->headers()->get('X-Auth-Token'))->toBe('api-key secret');
});

it('supports GetResponse MAX with OAuth and an X-Domain header', function (): void {
    $connector = new LaravelGetResponse(
        token: 'oauth-access-token',
        authMethod: AuthMethod::OAuth2,
        domain: 'my-company.getresponse360.pl',
        baseUrl: LaravelGetResponse::MAX_PL_BASE_URL,
    );

    $pendingRequest = $connector->createPendingRequest(new GetAccountRequest);

    expect($connector->resolveBaseUrl())->toBe('https://api3.getresponse360.pl/v3/')
        ->and($pendingRequest->headers()->get('Authorization'))->toBe('Bearer oauth-access-token')
        ->and($pendingRequest->headers()->get('X-Domain'))->toBe('my-company.getresponse360.pl');
});
