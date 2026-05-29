<?php

declare(strict_types=1);

use Ziming\LaravelGetResponse\LaravelGetResponse;

it('exposes a resource accessor for every API group', function (string $method, string $resourceClass): void {
    $connector = new LaravelGetResponse('fake-token');

    expect($connector->{$method}())->toBeInstanceOf($resourceClass);
})->with([
    'abTests' => ['abTests', \Ziming\LaravelGetResponse\Resources\AbTestsResource::class],
    'abTestsSubject' => ['abTestsSubject', \Ziming\LaravelGetResponse\Resources\AbTestsSubjectResource::class],
    'accounts' => ['accounts', \Ziming\LaravelGetResponse\Resources\AccountsResource::class],
    'addresses' => ['addresses', \Ziming\LaravelGetResponse\Resources\AddressesResource::class],
    'autoresponders' => ['autoresponders', \Ziming\LaravelGetResponse\Resources\AutorespondersResource::class],
    'campaigns' => ['campaigns', \Ziming\LaravelGetResponse\Resources\CampaignsResource::class],
    'carts' => ['carts', \Ziming\LaravelGetResponse\Resources\CartsResource::class],
    'categories' => ['categories', \Ziming\LaravelGetResponse\Resources\CategoriesResource::class],
    'clickTracks' => ['clickTracks', \Ziming\LaravelGetResponse\Resources\ClickTracksResource::class],
    'contacts' => ['contacts', \Ziming\LaravelGetResponse\Resources\ContactsResource::class],
    'customEvents' => ['customEvents', \Ziming\LaravelGetResponse\Resources\CustomEventsResource::class],
    'customFields' => ['customFields', \Ziming\LaravelGetResponse\Resources\CustomFieldsResource::class],
    'customReports' => ['customReports', \Ziming\LaravelGetResponse\Resources\CustomReportsResource::class],
    'fileLibrary' => ['fileLibrary', \Ziming\LaravelGetResponse\Resources\FileLibraryResource::class],
    'forms' => ['forms', \Ziming\LaravelGetResponse\Resources\FormsResource::class],
    'formsAndPopups' => ['formsAndPopups', \Ziming\LaravelGetResponse\Resources\FormsAndPopupsResource::class],
    'fromFields' => ['fromFields', \Ziming\LaravelGetResponse\Resources\FromFieldsResource::class],
    'gdprFields' => ['gdprFields', \Ziming\LaravelGetResponse\Resources\GdprFieldsResource::class],
    'imports' => ['imports', \Ziming\LaravelGetResponse\Resources\ImportsResource::class],
    'landingPages' => ['landingPages', \Ziming\LaravelGetResponse\Resources\LandingPagesResource::class],
    'legacyForms' => ['legacyForms', \Ziming\LaravelGetResponse\Resources\LegacyFormsResource::class],
    'legacyLandingPages' => ['legacyLandingPages', \Ziming\LaravelGetResponse\Resources\LegacyLandingPagesResource::class],
    'metaFields' => ['metaFields', \Ziming\LaravelGetResponse\Resources\MetaFieldsResource::class],
    'multimedia' => ['multimedia', \Ziming\LaravelGetResponse\Resources\MultimediaResource::class],
    'newsletters' => ['newsletters', \Ziming\LaravelGetResponse\Resources\NewslettersResource::class],
    'orders' => ['orders', \Ziming\LaravelGetResponse\Resources\OrdersResource::class],
    'predefinedFields' => ['predefinedFields', \Ziming\LaravelGetResponse\Resources\PredefinedFieldsResource::class],
    'productVariants' => ['productVariants', \Ziming\LaravelGetResponse\Resources\ProductVariantsResource::class],
    'products' => ['products', \Ziming\LaravelGetResponse\Resources\ProductsResource::class],
    'rssNewsletters' => ['rssNewsletters', \Ziming\LaravelGetResponse\Resources\RssNewslettersResource::class],
    'searchContacts' => ['searchContacts', \Ziming\LaravelGetResponse\Resources\SearchContactsResource::class],
    'shops' => ['shops', \Ziming\LaravelGetResponse\Resources\ShopsResource::class],
    'sms' => ['sms', \Ziming\LaravelGetResponse\Resources\SmsResource::class],
    'statistics' => ['statistics', \Ziming\LaravelGetResponse\Resources\StatisticsResource::class],
    'subscriptionConfirmations' => ['subscriptionConfirmations', \Ziming\LaravelGetResponse\Resources\SubscriptionConfirmationsResource::class],
    'suppressions' => ['suppressions', \Ziming\LaravelGetResponse\Resources\SuppressionsResource::class],
    'tags' => ['tags', \Ziming\LaravelGetResponse\Resources\TagsResource::class],
    'taxes' => ['taxes', \Ziming\LaravelGetResponse\Resources\TaxesResource::class],
    'tracking' => ['tracking', \Ziming\LaravelGetResponse\Resources\TrackingResource::class],
    'transactionalEmailTemplates' => ['transactionalEmailTemplates', \Ziming\LaravelGetResponse\Resources\TransactionalEmailTemplatesResource::class],
    'transactionalEmails' => ['transactionalEmails', \Ziming\LaravelGetResponse\Resources\TransactionalEmailsResource::class],
    'webinars' => ['webinars', \Ziming\LaravelGetResponse\Resources\WebinarsResource::class],
    'websites' => ['websites', \Ziming\LaravelGetResponse\Resources\WebsitesResource::class],
    'workflows' => ['workflows', \Ziming\LaravelGetResponse\Resources\WorkflowsResource::class],
]);

it('points at the GetResponse API base url', function (): void {
    expect((new LaravelGetResponse('fake-token'))->resolveBaseUrl())
        ->toBe('https://api.getresponse.com/v3/');
});
