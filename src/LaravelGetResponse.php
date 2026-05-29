<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse;

use Illuminate\Support\Facades\Cache;
use Saloon\Http\Auth\HeaderAuthenticator;
use Saloon\Http\Connector;
use Saloon\RateLimitPlugin\Contracts\RateLimitStore;
use Saloon\RateLimitPlugin\Limit;
use Saloon\RateLimitPlugin\Stores\LaravelCacheStore;
use Saloon\RateLimitPlugin\Traits\HasRateLimits;
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

/*
 * Add OAuth authenticator in the future
 */
class LaravelGetResponse extends Connector
{
    use HasRateLimits;

    public function __construct(protected readonly string $token) {}

    protected function defaultAuth(): HeaderAuthenticator
    {
        return new HeaderAuthenticator($this->token, 'X-AUTH-TOKEN');
    }

    public function resolveBaseUrl(): string
    {
        return 'https://api.getresponse.com/v3/';
    }

    protected function resolveLimits(): array
    {
        return [
            Limit::allow(80)
                ->everySeconds(1),

            // 600 seconds is 10 minutes
            Limit::allow(30_000)
                ->everySeconds(600),
        ];
    }

    protected function resolveRateLimitStore(): RateLimitStore
    {
        return new LaravelCacheStore(
            Cache::store(config('cache.default'))
        );
    }

    public function abTests(): AbTestsResource
    {
        return new AbTestsResource($this);
    }

    public function abTestsSubject(): AbTestsSubjectResource
    {
        return new AbTestsSubjectResource($this);
    }

    public function accounts(): AccountsResource
    {
        return new AccountsResource($this);
    }

    public function addresses(): AddressesResource
    {
        return new AddressesResource($this);
    }

    public function autoresponders(): AutorespondersResource
    {
        return new AutorespondersResource($this);
    }

    public function campaigns(): CampaignsResource
    {
        return new CampaignsResource($this);
    }

    public function carts(): CartsResource
    {
        return new CartsResource($this);
    }

    public function categories(): CategoriesResource
    {
        return new CategoriesResource($this);
    }

    public function clickTracks(): ClickTracksResource
    {
        return new ClickTracksResource($this);
    }

    public function contacts(): ContactsResource
    {
        return new ContactsResource($this);
    }

    public function customEvents(): CustomEventsResource
    {
        return new CustomEventsResource($this);
    }

    public function customFields(): CustomFieldsResource
    {
        return new CustomFieldsResource($this);
    }

    public function customReports(): CustomReportsResource
    {
        return new CustomReportsResource($this);
    }

    public function fileLibrary(): FileLibraryResource
    {
        return new FileLibraryResource($this);
    }

    public function formsAndPopups(): FormsAndPopupsResource
    {
        return new FormsAndPopupsResource($this);
    }

    public function forms(): FormsResource
    {
        return new FormsResource($this);
    }

    public function fromFields(): FromFieldsResource
    {
        return new FromFieldsResource($this);
    }

    public function gdprFields(): GdprFieldsResource
    {
        return new GdprFieldsResource($this);
    }

    public function imports(): ImportsResource
    {
        return new ImportsResource($this);
    }

    public function landingPages(): LandingPagesResource
    {
        return new LandingPagesResource($this);
    }

    public function legacyForms(): LegacyFormsResource
    {
        return new LegacyFormsResource($this);
    }

    public function legacyLandingPages(): LegacyLandingPagesResource
    {
        return new LegacyLandingPagesResource($this);
    }

    public function metaFields(): MetaFieldsResource
    {
        return new MetaFieldsResource($this);
    }

    public function multimedia(): MultimediaResource
    {
        return new MultimediaResource($this);
    }

    public function newsletters(): NewslettersResource
    {
        return new NewslettersResource($this);
    }

    public function orders(): OrdersResource
    {
        return new OrdersResource($this);
    }

    public function predefinedFields(): PredefinedFieldsResource
    {
        return new PredefinedFieldsResource($this);
    }

    public function productVariants(): ProductVariantsResource
    {
        return new ProductVariantsResource($this);
    }

    public function products(): ProductsResource
    {
        return new ProductsResource($this);
    }

    public function rssNewsletters(): RssNewslettersResource
    {
        return new RssNewslettersResource($this);
    }

    public function searchContacts(): SearchContactsResource
    {
        return new SearchContactsResource($this);
    }

    public function shops(): ShopsResource
    {
        return new ShopsResource($this);
    }

    public function sms(): SmsResource
    {
        return new SmsResource($this);
    }

    public function statistics(): StatisticsResource
    {
        return new StatisticsResource($this);
    }

    public function subscriptionConfirmations(): SubscriptionConfirmationsResource
    {
        return new SubscriptionConfirmationsResource($this);
    }

    public function suppressions(): SuppressionsResource
    {
        return new SuppressionsResource($this);
    }

    public function tags(): TagsResource
    {
        return new TagsResource($this);
    }

    public function taxes(): TaxesResource
    {
        return new TaxesResource($this);
    }

    public function tracking(): TrackingResource
    {
        return new TrackingResource($this);
    }

    public function transactionalEmailTemplates(): TransactionalEmailTemplatesResource
    {
        return new TransactionalEmailTemplatesResource($this);
    }

    public function transactionalEmails(): TransactionalEmailsResource
    {
        return new TransactionalEmailsResource($this);
    }

    public function webinars(): WebinarsResource
    {
        return new WebinarsResource($this);
    }

    public function websites(): WebsitesResource
    {
        return new WebsitesResource($this);
    }

    public function workflows(): WorkflowsResource
    {
        return new WorkflowsResource($this);
    }
}
