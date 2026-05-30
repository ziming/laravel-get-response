<?php

declare(strict_types=1);

use Ziming\LaravelGetResponse\LaravelGetResponse;
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
