<?php

declare(strict_types=1);

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Ziming\LaravelGetResponse\Requests\AbTests\GetSplittestListRequest;
use Ziming\LaravelGetResponse\Requests\AbTests\GetSplittestRequest;
use Ziming\LaravelGetResponse\Requests\AbTestsSubject\CancelAbTestRequest;
use Ziming\LaravelGetResponse\Requests\AbTestsSubject\CreateSubjectAbTestRequest;
use Ziming\LaravelGetResponse\Requests\AbTestsSubject\DeleteAbTestRequest;
use Ziming\LaravelGetResponse\Requests\AbTestsSubject\GetAbTestSubjectByIdRequest;
use Ziming\LaravelGetResponse\Requests\AbTestsSubject\GetAbTestSubjectListRequest;
use Ziming\LaravelGetResponse\Requests\AbTestsSubject\PostAbtestsSubjectByIdWinnerRequest;
use Ziming\LaravelGetResponse\Requests\Accounts\DisableCallbacksRequest;
use Ziming\LaravelGetResponse\Requests\Accounts\GetAccountBadgeRequest;
use Ziming\LaravelGetResponse\Requests\Accounts\GetAccountBillingRequest;
use Ziming\LaravelGetResponse\Requests\Accounts\GetAccountBlocklistRequest;
use Ziming\LaravelGetResponse\Requests\Accounts\GetAccountLoginHistoryRequest;
use Ziming\LaravelGetResponse\Requests\Accounts\GetAccountRequest;
use Ziming\LaravelGetResponse\Requests\Accounts\GetCallbacksRequest;
use Ziming\LaravelGetResponse\Requests\Accounts\GetIndustriesRequest;
use Ziming\LaravelGetResponse\Requests\Accounts\GetSendingLimitsRequest;
use Ziming\LaravelGetResponse\Requests\Accounts\GetTimezonesRequest;
use Ziming\LaravelGetResponse\Requests\Accounts\UpdateAccountBadgeRequest;
use Ziming\LaravelGetResponse\Requests\Accounts\UpdateAccountBlocklistRequest;
use Ziming\LaravelGetResponse\Requests\Accounts\UpdateAccountRequest;
use Ziming\LaravelGetResponse\Requests\Accounts\UpdateCallbacksRequest;
use Ziming\LaravelGetResponse\Requests\Addresses\CreateAddressRequest;
use Ziming\LaravelGetResponse\Requests\Addresses\DeleteAddressRequest;
use Ziming\LaravelGetResponse\Requests\Addresses\GetAddressListRequest;
use Ziming\LaravelGetResponse\Requests\Addresses\GetAddressRequest;
use Ziming\LaravelGetResponse\Requests\Addresses\UpdateAddressRequest;
use Ziming\LaravelGetResponse\Requests\Autoresponders\CreateAutoresponderRequest;
use Ziming\LaravelGetResponse\Requests\Autoresponders\DeleteAutoresponderRequest;
use Ziming\LaravelGetResponse\Requests\Autoresponders\GetAutoresponderListRequest;
use Ziming\LaravelGetResponse\Requests\Autoresponders\GetAutoresponderRequest;
use Ziming\LaravelGetResponse\Requests\Autoresponders\GetAutoresponderStatisticsCollectionRequest;
use Ziming\LaravelGetResponse\Requests\Autoresponders\GetAutoresponderThumbnailRequest;
use Ziming\LaravelGetResponse\Requests\Autoresponders\GetSingleAutoresponderStatisticsRequest;
use Ziming\LaravelGetResponse\Requests\Autoresponders\UpdateAutoresponderRequest;
use Ziming\LaravelGetResponse\Requests\Campaigns\CreateCampaignRequest;
use Ziming\LaravelGetResponse\Requests\Campaigns\GetCampaignBlocklistRequest;
use Ziming\LaravelGetResponse\Requests\Campaigns\GetCampaignListRequest;
use Ziming\LaravelGetResponse\Requests\Campaigns\GetCampaignRequest;
use Ziming\LaravelGetResponse\Requests\Campaigns\GetCampaignStatisticsBalanceRequest;
use Ziming\LaravelGetResponse\Requests\Campaigns\GetCampaignStatisticsListSizeRequest;
use Ziming\LaravelGetResponse\Requests\Campaigns\GetCampaignStatisticsLocationsRequest;
use Ziming\LaravelGetResponse\Requests\Campaigns\GetCampaignStatisticsOriginsRequest;
use Ziming\LaravelGetResponse\Requests\Campaigns\GetCampaignStatisticsRemovalsRequest;
use Ziming\LaravelGetResponse\Requests\Campaigns\GetCampaignStatisticsSubscriptionsRequest;
use Ziming\LaravelGetResponse\Requests\Campaigns\GetCampaignStatisticsSummaryRequest;
use Ziming\LaravelGetResponse\Requests\Campaigns\UpdateCampaignBlocklistRequest;
use Ziming\LaravelGetResponse\Requests\Campaigns\UpdateCampaignRequest;
use Ziming\LaravelGetResponse\Requests\Carts\CreateCartRequest;
use Ziming\LaravelGetResponse\Requests\Carts\DeleteCartRequest;
use Ziming\LaravelGetResponse\Requests\Carts\GetCartRequest;
use Ziming\LaravelGetResponse\Requests\Carts\GetCartsRequest;
use Ziming\LaravelGetResponse\Requests\Carts\UpdateCartRequest;
use Ziming\LaravelGetResponse\Requests\Categories\CreateCategoryRequest;
use Ziming\LaravelGetResponse\Requests\Categories\DeleteCategoryRequest;
use Ziming\LaravelGetResponse\Requests\Categories\GetCategoriesRequest;
use Ziming\LaravelGetResponse\Requests\Categories\GetCategoryRequest;
use Ziming\LaravelGetResponse\Requests\Categories\UpdateCategoryRequest;
use Ziming\LaravelGetResponse\Requests\ClickTracks\GetClickTrackByIdRequest;
use Ziming\LaravelGetResponse\Requests\ClickTracks\GetClickTrackListRequest;
use Ziming\LaravelGetResponse\Requests\Contacts\CreateBatchContactsRequest;
use Ziming\LaravelGetResponse\Requests\Contacts\CreateContactRequest;
use Ziming\LaravelGetResponse\Requests\Contacts\DeleteContactRequest;
use Ziming\LaravelGetResponse\Requests\Contacts\GetActivitiesRequest;
use Ziming\LaravelGetResponse\Requests\Contacts\GetContactByIdRequest;
use Ziming\LaravelGetResponse\Requests\Contacts\GetContactConsentsByIdRequest;
use Ziming\LaravelGetResponse\Requests\Contacts\GetContactListRequest;
use Ziming\LaravelGetResponse\Requests\Contacts\GetContactsFromCampaignRequest;
use Ziming\LaravelGetResponse\Requests\Contacts\UpdateContactRequest;
use Ziming\LaravelGetResponse\Requests\Contacts\UpsertContactCustomsRequest;
use Ziming\LaravelGetResponse\Requests\Contacts\UpsertTagsRequest;
use Ziming\LaravelGetResponse\Requests\CustomEvents\CreateCustomEventRequest;
use Ziming\LaravelGetResponse\Requests\CustomEvents\DeleteCustomEventRequest;
use Ziming\LaravelGetResponse\Requests\CustomEvents\GetCustomEventByIdRequest;
use Ziming\LaravelGetResponse\Requests\CustomEvents\GetCustomEventsListRequest;
use Ziming\LaravelGetResponse\Requests\CustomEvents\TriggerCustomEventRequest;
use Ziming\LaravelGetResponse\Requests\CustomEvents\UpdateCustomEventRequest;
use Ziming\LaravelGetResponse\Requests\CustomFields\CreateCustomFieldRequest;
use Ziming\LaravelGetResponse\Requests\CustomFields\DeleteCustomFieldRequest;
use Ziming\LaravelGetResponse\Requests\CustomFields\GetCustomFieldByIdRequest;
use Ziming\LaravelGetResponse\Requests\CustomFields\GetCustomFieldListRequest;
use Ziming\LaravelGetResponse\Requests\CustomFields\UpdateCustomFieldRequest;
use Ziming\LaravelGetResponse\Requests\CustomReports\CreateCustomReportRequest;
use Ziming\LaravelGetResponse\Requests\CustomReports\GetCustomReportDetailsRequest;
use Ziming\LaravelGetResponse\Requests\CustomReports\GetCustomReportListRequest;
use Ziming\LaravelGetResponse\Requests\FileLibrary\CreateFileRequest;
use Ziming\LaravelGetResponse\Requests\FileLibrary\CreateFolderRequest;
use Ziming\LaravelGetResponse\Requests\FileLibrary\DeleteFileRequest;
use Ziming\LaravelGetResponse\Requests\FileLibrary\DeleteFolderRequest;
use Ziming\LaravelGetResponse\Requests\FileLibrary\GetFileByIdRequest;
use Ziming\LaravelGetResponse\Requests\FileLibrary\GetFileListRequest;
use Ziming\LaravelGetResponse\Requests\FileLibrary\GetFolderListRequest;
use Ziming\LaravelGetResponse\Requests\FileLibrary\QuotaRequest;
use Ziming\LaravelGetResponse\Requests\Forms\GetFormListRequest;
use Ziming\LaravelGetResponse\Requests\Forms\GetFormRequest;
use Ziming\LaravelGetResponse\Requests\Forms\GetFormVariantListRequest;
use Ziming\LaravelGetResponse\Requests\FormsAndPopups\GetPopupDetailsRequest;
use Ziming\LaravelGetResponse\Requests\FormsAndPopups\GetPopupsListRequest;
use Ziming\LaravelGetResponse\Requests\FromFields\CreateFromFieldRequest;
use Ziming\LaravelGetResponse\Requests\FromFields\DeleteFromFieldRequest;
use Ziming\LaravelGetResponse\Requests\FromFields\GetFromFieldByIdRequest;
use Ziming\LaravelGetResponse\Requests\FromFields\GetFromFieldListRequest;
use Ziming\LaravelGetResponse\Requests\FromFields\SetFromFieldAsDefaultRequest;
use Ziming\LaravelGetResponse\Requests\GdprFields\GetGDPRFieldListRequest;
use Ziming\LaravelGetResponse\Requests\GdprFields\GetGDPRFieldRequest;
use Ziming\LaravelGetResponse\Requests\Imports\CreateImportRequest;
use Ziming\LaravelGetResponse\Requests\Imports\GetImportByIdRequest;
use Ziming\LaravelGetResponse\Requests\Imports\GetImportListRequest;
use Ziming\LaravelGetResponse\Requests\LandingPages\GetLpsByIdRequest;
use Ziming\LaravelGetResponse\Requests\LandingPages\GetLpsListRequest;
use Ziming\LaravelGetResponse\Requests\LegacyForms\GetLegacyFormByIdRequest;
use Ziming\LaravelGetResponse\Requests\LegacyForms\GetLegacyFormListRequest;
use Ziming\LaravelGetResponse\Requests\LegacyLandingPages\GetLandingPageByIdRequest;
use Ziming\LaravelGetResponse\Requests\LegacyLandingPages\GetLandingPageListRequest;
use Ziming\LaravelGetResponse\Requests\MetaFields\CreateMetaFieldRequest;
use Ziming\LaravelGetResponse\Requests\MetaFields\DeleteMetaFieldRequest;
use Ziming\LaravelGetResponse\Requests\MetaFields\GetMetaFieldRequest;
use Ziming\LaravelGetResponse\Requests\MetaFields\GetMetaFieldsRequest;
use Ziming\LaravelGetResponse\Requests\MetaFields\UpdateMetaFieldRequest;
use Ziming\LaravelGetResponse\Requests\Multimedia\GetImageListRequest;
use Ziming\LaravelGetResponse\Requests\Multimedia\UploadImageRequest;
use Ziming\LaravelGetResponse\Requests\Newsletters\CancelMessageSendRequest;
use Ziming\LaravelGetResponse\Requests\Newsletters\CreateNewsletterRequest;
use Ziming\LaravelGetResponse\Requests\Newsletters\DeleteNewsletterRequest;
use Ziming\LaravelGetResponse\Requests\Newsletters\GetNewsletterActivitiesRequest;
use Ziming\LaravelGetResponse\Requests\Newsletters\GetNewsletterListRequest;
use Ziming\LaravelGetResponse\Requests\Newsletters\GetNewsletterRequest;
use Ziming\LaravelGetResponse\Requests\Newsletters\GetNewsletterStatisticsCollectionRequest;
use Ziming\LaravelGetResponse\Requests\Newsletters\GetNewsletterThumbnailRequest;
use Ziming\LaravelGetResponse\Requests\Newsletters\GetSingleNewsletterStatisticsRequest;
use Ziming\LaravelGetResponse\Requests\Newsletters\SendDraftRequest;
use Ziming\LaravelGetResponse\Requests\Orders\CreateOrderRequest;
use Ziming\LaravelGetResponse\Requests\Orders\DeleteOrderRequest;
use Ziming\LaravelGetResponse\Requests\Orders\GetOrderByIdRequest;
use Ziming\LaravelGetResponse\Requests\Orders\GetOrderListRequest;
use Ziming\LaravelGetResponse\Requests\Orders\UpdateOrderRequest;
use Ziming\LaravelGetResponse\Requests\PredefinedFields\CreatePredefinedFieldRequest;
use Ziming\LaravelGetResponse\Requests\PredefinedFields\DeletePredefinedFieldRequest;
use Ziming\LaravelGetResponse\Requests\PredefinedFields\GetPredefinedFieldByIdRequest;
use Ziming\LaravelGetResponse\Requests\PredefinedFields\GetPredefinedFieldListRequest;
use Ziming\LaravelGetResponse\Requests\PredefinedFields\UpdatePredefinedFieldRequest;
use Ziming\LaravelGetResponse\Requests\Products\CreateProductRequest;
use Ziming\LaravelGetResponse\Requests\Products\DeleteProductRequest;
use Ziming\LaravelGetResponse\Requests\Products\GetProductByIdRequest;
use Ziming\LaravelGetResponse\Requests\Products\GetProductListRequest;
use Ziming\LaravelGetResponse\Requests\Products\UpdateProductRequest;
use Ziming\LaravelGetResponse\Requests\Products\UpsertMetaFieldsRequest;
use Ziming\LaravelGetResponse\Requests\Products\UpsertProductCategoriesRequest;
use Ziming\LaravelGetResponse\Requests\ProductVariants\CreateProductVariantRequest;
use Ziming\LaravelGetResponse\Requests\ProductVariants\DeleteProductVariantRequest;
use Ziming\LaravelGetResponse\Requests\ProductVariants\GetProductVariantByIdRequest;
use Ziming\LaravelGetResponse\Requests\ProductVariants\GetProductVariantListRequest;
use Ziming\LaravelGetResponse\Requests\ProductVariants\UpdateProductVariantRequest;
use Ziming\LaravelGetResponse\Requests\RssNewsletters\CreateRssNewsletterRequest;
use Ziming\LaravelGetResponse\Requests\RssNewsletters\DeleteRssNewsletterRequest;
use Ziming\LaravelGetResponse\Requests\RssNewsletters\GetRssNewsletterByIdRequest;
use Ziming\LaravelGetResponse\Requests\RssNewsletters\GetRssNewslettersListRequest;
use Ziming\LaravelGetResponse\Requests\RssNewsletters\GetRssNewsletterStatisticsCollectionRequest;
use Ziming\LaravelGetResponse\Requests\RssNewsletters\GetSingleRssNewsletterStatisticsCollectionRequest;
use Ziming\LaravelGetResponse\Requests\RssNewsletters\UpdateRssNewsletterRequest;
use Ziming\LaravelGetResponse\Requests\SearchContacts\DeleteSearchContactsRequest;
use Ziming\LaravelGetResponse\Requests\SearchContacts\GetContactsByIdSearchContactsRequest;
use Ziming\LaravelGetResponse\Requests\SearchContacts\GetContactsFromSearchContactsConditionsRequest;
use Ziming\LaravelGetResponse\Requests\SearchContacts\GetSearchContactsByIdRequest;
use Ziming\LaravelGetResponse\Requests\SearchContacts\GetSearchContactsListRequest;
use Ziming\LaravelGetResponse\Requests\SearchContacts\NewSearchContactsRequest;
use Ziming\LaravelGetResponse\Requests\SearchContacts\UpdateSearchContactsRequest;
use Ziming\LaravelGetResponse\Requests\SearchContacts\UpsertCustomFieldsBySearchContactIdRequest;
use Ziming\LaravelGetResponse\Requests\Shops\CreateShopRequest;
use Ziming\LaravelGetResponse\Requests\Shops\DeleteShopRequest;
use Ziming\LaravelGetResponse\Requests\Shops\GetShopByIdRequest;
use Ziming\LaravelGetResponse\Requests\Shops\GetShopListRequest;
use Ziming\LaravelGetResponse\Requests\Shops\UpdateShopRequest;
use Ziming\LaravelGetResponse\Requests\Sms\GetSmsAutomationByIdRequest;
use Ziming\LaravelGetResponse\Requests\Sms\GetSMSAutomationListRequest;
use Ziming\LaravelGetResponse\Requests\Sms\GetSmsByIdRequest;
use Ziming\LaravelGetResponse\Requests\Sms\GetSMSListRequest;
use Ziming\LaravelGetResponse\Requests\Sms\GetSmsSenderNameListRequest;
use Ziming\LaravelGetResponse\Requests\Sms\SendSmsRequest;
use Ziming\LaravelGetResponse\Requests\Statistics\GetGeneralPerformanceStatsRequest;
use Ziming\LaravelGetResponse\Requests\Statistics\GetLpsGeneralPerformanceStatsRequest;
use Ziming\LaravelGetResponse\Requests\Statistics\GetPopupGeneralPerformanceRequest;
use Ziming\LaravelGetResponse\Requests\Statistics\GetRevenueStatsRequest;
use Ziming\LaravelGetResponse\Requests\Statistics\GetSmsStatsRequest;
use Ziming\LaravelGetResponse\Requests\Statistics\GetWbeGeneralPerformanceStatsRequest;
use Ziming\LaravelGetResponse\Requests\SubscriptionConfirmations\GetSubscriptionConfirmationBodyListRequest;
use Ziming\LaravelGetResponse\Requests\SubscriptionConfirmations\GetSubscriptionConfirmationSubjectListRequest;
use Ziming\LaravelGetResponse\Requests\Suppressions\CreateSuppressionRequest;
use Ziming\LaravelGetResponse\Requests\Suppressions\DeleteSuppressionRequest;
use Ziming\LaravelGetResponse\Requests\Suppressions\GetSuppressionByIdRequest;
use Ziming\LaravelGetResponse\Requests\Suppressions\GetSuppressionsListRequest;
use Ziming\LaravelGetResponse\Requests\Suppressions\UpdateSuppressionRequest;
use Ziming\LaravelGetResponse\Requests\Tags\CreateTagRequest;
use Ziming\LaravelGetResponse\Requests\Tags\DeleteTagRequest;
use Ziming\LaravelGetResponse\Requests\Tags\GetTagByIdRequest;
use Ziming\LaravelGetResponse\Requests\Tags\GetTagsListRequest;
use Ziming\LaravelGetResponse\Requests\Tags\UpdateTagRequest;
use Ziming\LaravelGetResponse\Requests\Taxes\CreateTaxRequest;
use Ziming\LaravelGetResponse\Requests\Taxes\DeleteTaxRequest;
use Ziming\LaravelGetResponse\Requests\Taxes\GetTaxByIdRequest;
use Ziming\LaravelGetResponse\Requests\Taxes\GetTaxListRequest;
use Ziming\LaravelGetResponse\Requests\Taxes\UpdateTaxRequest;
use Ziming\LaravelGetResponse\Requests\Tracking\GetFacebookPixelListRequest;
use Ziming\LaravelGetResponse\Requests\Tracking\GetTrackingRequest;
use Ziming\LaravelGetResponse\Requests\TransactionalEmails\CreateTransactionalEmailRequest;
use Ziming\LaravelGetResponse\Requests\TransactionalEmails\GetTransactionalEmailsByIdRequest;
use Ziming\LaravelGetResponse\Requests\TransactionalEmails\GetTransactionalEmailsListRequest;
use Ziming\LaravelGetResponse\Requests\TransactionalEmails\GetTransactionalEmailsStatisticsRequest;
use Ziming\LaravelGetResponse\Requests\TransactionalEmailTemplates\CreateTransactionalEmailTemplateRequest;
use Ziming\LaravelGetResponse\Requests\TransactionalEmailTemplates\DeleteTransactionalEmailsTemplateRequest;
use Ziming\LaravelGetResponse\Requests\TransactionalEmailTemplates\GetTransactionalEmailsTemplatesByIdRequest;
use Ziming\LaravelGetResponse\Requests\TransactionalEmailTemplates\GetTransactionalEmailsTemplatesListRequest;
use Ziming\LaravelGetResponse\Requests\TransactionalEmailTemplates\UpdateTransactionalEmailsTemplateRequest;
use Ziming\LaravelGetResponse\Requests\Webinars\GetWebinarByIdRequest;
use Ziming\LaravelGetResponse\Requests\Webinars\GetWebinarListRequest;
use Ziming\LaravelGetResponse\Requests\Websites\GetWebsiteByIdRequest;
use Ziming\LaravelGetResponse\Requests\Websites\GetWebsitesListRequest;
use Ziming\LaravelGetResponse\Requests\Workflows\GetWorkflowListRequest;
use Ziming\LaravelGetResponse\Requests\Workflows\GetWorkflowRequest;
use Ziming\LaravelGetResponse\Requests\Workflows\UpdateWorkflowRequest;

it('resolves the correct HTTP method and endpoint for every request', function (Request $request, string $method, string $endpoint): void {
    expect($request->getMethod())->toBe(Method::from($method))
        ->and($request->resolveEndpoint())->toBe($endpoint)
        ->and($request->resolveEndpoint())->not->toContain('{');
})->with([
    'AbTests\\GetSplittestListRequest' => [new GetSplittestListRequest, 'GET', '/splittests'],
    'AbTests\\GetSplittestRequest' => [new GetSplittestRequest('splittestId'), 'GET', '/splittests/splittestId'],
    'AbTestsSubject\\CancelAbTestRequest' => [new CancelAbTestRequest('abTestId'), 'POST', '/ab-tests/abTestId/cancel'],
    'AbTestsSubject\\CreateSubjectAbTestRequest' => [new CreateSubjectAbTestRequest('value', [], [], [], [], [], []), 'POST', '/ab-tests/subject'],
    'AbTestsSubject\\DeleteAbTestRequest' => [new DeleteAbTestRequest('abTestId'), 'DELETE', '/ab-tests/abTestId'],
    'AbTestsSubject\\GetAbTestSubjectByIdRequest' => [new GetAbTestSubjectByIdRequest('abTestId'), 'GET', '/ab-tests/subject/abTestId'],
    'AbTestsSubject\\GetAbTestSubjectListRequest' => [new GetAbTestSubjectListRequest, 'GET', '/ab-tests/subject'],
    'AbTestsSubject\\PostAbtestsSubjectByIdWinnerRequest' => [new PostAbtestsSubjectByIdWinnerRequest('abTestId', 'value'), 'POST', '/ab-tests/subject/abTestId/winner'],
    'Accounts\\DisableCallbacksRequest' => [new DisableCallbacksRequest, 'DELETE', '/accounts/callbacks'],
    'Accounts\\GetAccountBadgeRequest' => [new GetAccountBadgeRequest, 'GET', '/accounts/badge'],
    'Accounts\\GetAccountBillingRequest' => [new GetAccountBillingRequest, 'GET', '/accounts/billing'],
    'Accounts\\GetAccountBlocklistRequest' => [new GetAccountBlocklistRequest, 'GET', '/accounts/blocklists'],
    'Accounts\\GetAccountLoginHistoryRequest' => [new GetAccountLoginHistoryRequest, 'GET', '/accounts/login-history'],
    'Accounts\\GetAccountRequest' => [new GetAccountRequest, 'GET', '/accounts'],
    'Accounts\\GetCallbacksRequest' => [new GetCallbacksRequest, 'GET', '/accounts/callbacks'],
    'Accounts\\GetIndustriesRequest' => [new GetIndustriesRequest, 'GET', '/accounts/industries'],
    'Accounts\\GetSendingLimitsRequest' => [new GetSendingLimitsRequest, 'GET', '/accounts/sending-limits'],
    'Accounts\\GetTimezonesRequest' => [new GetTimezonesRequest, 'GET', '/accounts/timezones'],
    'Accounts\\UpdateAccountBadgeRequest' => [new UpdateAccountBadgeRequest('value'), 'POST', '/accounts/badge'],
    'Accounts\\UpdateAccountBlocklistRequest' => [new UpdateAccountBlocklistRequest([]), 'POST', '/accounts/blocklists'],
    'Accounts\\UpdateAccountRequest' => [new UpdateAccountRequest, 'POST', '/accounts'],
    'Accounts\\UpdateCallbacksRequest' => [new UpdateCallbacksRequest, 'POST', '/accounts/callbacks'],
    'Addresses\\CreateAddressRequest' => [new CreateAddressRequest('value', 'value'), 'POST', '/addresses'],
    'Addresses\\DeleteAddressRequest' => [new DeleteAddressRequest('addressId'), 'DELETE', '/addresses/addressId'],
    'Addresses\\GetAddressListRequest' => [new GetAddressListRequest, 'GET', '/addresses'],
    'Addresses\\GetAddressRequest' => [new GetAddressRequest('addressId'), 'GET', '/addresses/addressId'],
    'Addresses\\UpdateAddressRequest' => [new UpdateAddressRequest('addressId'), 'POST', '/addresses/addressId'],
    'Autoresponders\\CreateAutoresponderRequest' => [new CreateAutoresponderRequest([], 'value', 'enabled', [], []), 'POST', '/autoresponders'],
    'Autoresponders\\DeleteAutoresponderRequest' => [new DeleteAutoresponderRequest('autoresponderId'), 'DELETE', '/autoresponders/autoresponderId'],
    'Autoresponders\\GetAutoresponderListRequest' => [new GetAutoresponderListRequest, 'GET', '/autoresponders'],
    'Autoresponders\\GetAutoresponderRequest' => [new GetAutoresponderRequest('autoresponderId'), 'GET', '/autoresponders/autoresponderId'],
    'Autoresponders\\GetAutoresponderStatisticsCollectionRequest' => [new GetAutoresponderStatisticsCollectionRequest, 'GET', '/autoresponders/statistics'],
    'Autoresponders\\GetAutoresponderThumbnailRequest' => [new GetAutoresponderThumbnailRequest('autoresponderId'), 'GET', '/autoresponders/autoresponderId/thumbnail'],
    'Autoresponders\\GetSingleAutoresponderStatisticsRequest' => [new GetSingleAutoresponderStatisticsRequest('autoresponderId'), 'GET', '/autoresponders/autoresponderId/statistics'],
    'Autoresponders\\UpdateAutoresponderRequest' => [new UpdateAutoresponderRequest('autoresponderId'), 'POST', '/autoresponders/autoresponderId'],
    'Campaigns\\CreateCampaignRequest' => [new CreateCampaignRequest('value'), 'POST', '/campaigns'],
    'Campaigns\\GetCampaignBlocklistRequest' => [new GetCampaignBlocklistRequest('campaignId'), 'GET', '/campaigns/campaignId/blocklists'],
    'Campaigns\\GetCampaignListRequest' => [new GetCampaignListRequest, 'GET', '/campaigns'],
    'Campaigns\\GetCampaignRequest' => [new GetCampaignRequest('campaignId'), 'GET', '/campaigns/campaignId'],
    'Campaigns\\GetCampaignStatisticsBalanceRequest' => [new GetCampaignStatisticsBalanceRequest, 'GET', '/campaigns/statistics/balance'],
    'Campaigns\\GetCampaignStatisticsListSizeRequest' => [new GetCampaignStatisticsListSizeRequest, 'GET', '/campaigns/statistics/list-size'],
    'Campaigns\\GetCampaignStatisticsLocationsRequest' => [new GetCampaignStatisticsLocationsRequest, 'GET', '/campaigns/statistics/locations'],
    'Campaigns\\GetCampaignStatisticsOriginsRequest' => [new GetCampaignStatisticsOriginsRequest, 'GET', '/campaigns/statistics/origins'],
    'Campaigns\\GetCampaignStatisticsRemovalsRequest' => [new GetCampaignStatisticsRemovalsRequest, 'GET', '/campaigns/statistics/removals'],
    'Campaigns\\GetCampaignStatisticsSubscriptionsRequest' => [new GetCampaignStatisticsSubscriptionsRequest, 'GET', '/campaigns/statistics/subscriptions'],
    'Campaigns\\GetCampaignStatisticsSummaryRequest' => [new GetCampaignStatisticsSummaryRequest, 'GET', '/campaigns/statistics/summary'],
    'Campaigns\\UpdateCampaignBlocklistRequest' => [new UpdateCampaignBlocklistRequest('campaignId', []), 'POST', '/campaigns/campaignId/blocklists'],
    'Campaigns\\UpdateCampaignRequest' => [new UpdateCampaignRequest('campaignId', 'value'), 'POST', '/campaigns/campaignId'],
    'Carts\\CreateCartRequest' => [new CreateCartRequest('shopId', 'value', 1.0, 'value', []), 'POST', '/shops/shopId/carts'],
    'Carts\\DeleteCartRequest' => [new DeleteCartRequest('shopId', 'cartId'), 'DELETE', '/shops/shopId/carts/cartId'],
    'Carts\\GetCartRequest' => [new GetCartRequest('shopId', 'cartId'), 'GET', '/shops/shopId/carts/cartId'],
    'Carts\\GetCartsRequest' => [new GetCartsRequest('shopId'), 'GET', '/shops/shopId/carts'],
    'Carts\\UpdateCartRequest' => [new UpdateCartRequest('shopId', 'cartId'), 'POST', '/shops/shopId/carts/cartId'],
    'Categories\\CreateCategoryRequest' => [new CreateCategoryRequest('shopId', 'value'), 'POST', '/shops/shopId/categories'],
    'Categories\\DeleteCategoryRequest' => [new DeleteCategoryRequest('shopId', 'categoryId'), 'DELETE', '/shops/shopId/categories/categoryId'],
    'Categories\\GetCategoriesRequest' => [new GetCategoriesRequest('shopId'), 'GET', '/shops/shopId/categories'],
    'Categories\\GetCategoryRequest' => [new GetCategoryRequest('shopId', 'categoryId'), 'GET', '/shops/shopId/categories/categoryId'],
    'Categories\\UpdateCategoryRequest' => [new UpdateCategoryRequest('shopId', 'categoryId'), 'POST', '/shops/shopId/categories/categoryId'],
    'ClickTracks\\GetClickTrackByIdRequest' => [new GetClickTrackByIdRequest('clickTrackId'), 'GET', '/click-tracks/clickTrackId'],
    'ClickTracks\\GetClickTrackListRequest' => [new GetClickTrackListRequest, 'GET', '/click-tracks'],
    'Contacts\\CreateBatchContactsRequest' => [new CreateBatchContactsRequest('value', []), 'POST', '/contacts/batch'],
    'Contacts\\CreateContactRequest' => [new CreateContactRequest([], 'value'), 'POST', '/contacts'],
    'Contacts\\DeleteContactRequest' => [new DeleteContactRequest('contactId'), 'DELETE', '/contacts/contactId'],
    'Contacts\\GetActivitiesRequest' => [new GetActivitiesRequest('contactId'), 'GET', '/contacts/contactId/activities'],
    'Contacts\\GetContactByIdRequest' => [new GetContactByIdRequest('contactId'), 'GET', '/contacts/contactId'],
    'Contacts\\GetContactConsentsByIdRequest' => [new GetContactConsentsByIdRequest('contactId'), 'GET', '/contacts/contactId/consents'],
    'Contacts\\GetContactListRequest' => [new GetContactListRequest, 'GET', '/contacts'],
    'Contacts\\GetContactsFromCampaignRequest' => [new GetContactsFromCampaignRequest('campaignId'), 'GET', '/campaigns/campaignId/contacts'],
    'Contacts\\UpdateContactRequest' => [new UpdateContactRequest('contactId'), 'POST', '/contacts/contactId'],
    'Contacts\\UpsertContactCustomsRequest' => [new UpsertContactCustomsRequest('contactId', []), 'POST', '/contacts/contactId/custom-fields'],
    'Contacts\\UpsertTagsRequest' => [new UpsertTagsRequest('contactId', []), 'POST', '/contacts/contactId/tags'],
    'CustomEvents\\CreateCustomEventRequest' => [new CreateCustomEventRequest('value', []), 'POST', '/custom-events'],
    'CustomEvents\\DeleteCustomEventRequest' => [new DeleteCustomEventRequest('customEventId'), 'DELETE', '/custom-events/customEventId'],
    'CustomEvents\\GetCustomEventByIdRequest' => [new GetCustomEventByIdRequest('customEventId'), 'GET', '/custom-events/customEventId'],
    'CustomEvents\\GetCustomEventsListRequest' => [new GetCustomEventsListRequest, 'GET', '/custom-events'],
    'CustomEvents\\TriggerCustomEventRequest' => [new TriggerCustomEventRequest('value', 'value'), 'POST', '/custom-events/trigger'],
    'CustomEvents\\UpdateCustomEventRequest' => [new UpdateCustomEventRequest('customEventId', 'value', []), 'POST', '/custom-events/customEventId'],
    'CustomFields\\CreateCustomFieldRequest' => [new CreateCustomFieldRequest('value', 'string', 'text', 'false', []), 'POST', '/custom-fields'],
    'CustomFields\\DeleteCustomFieldRequest' => [new DeleteCustomFieldRequest('customFieldId'), 'DELETE', '/custom-fields/customFieldId'],
    'CustomFields\\GetCustomFieldByIdRequest' => [new GetCustomFieldByIdRequest('customFieldId'), 'GET', '/custom-fields/customFieldId'],
    'CustomFields\\GetCustomFieldListRequest' => [new GetCustomFieldListRequest, 'GET', '/custom-fields'],
    'CustomFields\\UpdateCustomFieldRequest' => [new UpdateCustomFieldRequest('customFieldId', 'false', []), 'POST', '/custom-fields/customFieldId'],
    'CustomReports\\CreateCustomReportRequest' => [new CreateCustomReportRequest('value', 'value', []), 'POST', '/custom-reports'],
    'CustomReports\\GetCustomReportDetailsRequest' => [new GetCustomReportDetailsRequest('customReportId'), 'GET', '/custom-reports/customReportId'],
    'CustomReports\\GetCustomReportListRequest' => [new GetCustomReportListRequest, 'GET', '/custom-reports'],
    'FileLibrary\\CreateFileRequest' => [new CreateFileRequest('value', 'value', 'value', []), 'POST', '/file-library/files'],
    'FileLibrary\\CreateFolderRequest' => [new CreateFolderRequest('value'), 'POST', '/file-library/folders'],
    'FileLibrary\\DeleteFileRequest' => [new DeleteFileRequest('fileId'), 'DELETE', '/file-library/files/fileId'],
    'FileLibrary\\DeleteFolderRequest' => [new DeleteFolderRequest('folderId'), 'DELETE', '/file-library/folders/folderId'],
    'FileLibrary\\GetFileByIdRequest' => [new GetFileByIdRequest('fileId'), 'GET', '/file-library/files/fileId'],
    'FileLibrary\\GetFileListRequest' => [new GetFileListRequest, 'GET', '/file-library/files'],
    'FileLibrary\\GetFolderListRequest' => [new GetFolderListRequest, 'GET', '/file-library/folders'],
    'FileLibrary\\QuotaRequest' => [new QuotaRequest, 'GET', '/file-library/quota'],
    'Forms\\GetFormListRequest' => [new GetFormListRequest, 'GET', '/forms'],
    'Forms\\GetFormRequest' => [new GetFormRequest('formId'), 'GET', '/forms/formId'],
    'Forms\\GetFormVariantListRequest' => [new GetFormVariantListRequest('formId'), 'GET', '/forms/formId/variants'],
    'FormsAndPopups\\GetPopupDetailsRequest' => [new GetPopupDetailsRequest('popupId'), 'GET', '/popups/popupId'],
    'FormsAndPopups\\GetPopupsListRequest' => [new GetPopupsListRequest, 'GET', '/popups'],
    'FromFields\\CreateFromFieldRequest' => [new CreateFromFieldRequest('value', 'value'), 'POST', '/from-fields'],
    'FromFields\\DeleteFromFieldRequest' => [new DeleteFromFieldRequest('fromFieldId'), 'DELETE', '/from-fields/fromFieldId'],
    'FromFields\\GetFromFieldByIdRequest' => [new GetFromFieldByIdRequest('fromFieldId'), 'GET', '/from-fields/fromFieldId'],
    'FromFields\\GetFromFieldListRequest' => [new GetFromFieldListRequest, 'GET', '/from-fields'],
    'FromFields\\SetFromFieldAsDefaultRequest' => [new SetFromFieldAsDefaultRequest('fromFieldId'), 'POST', '/from-fields/fromFieldId/default'],
    'GdprFields\\GetGDPRFieldListRequest' => [new GetGDPRFieldListRequest, 'GET', '/gdpr-fields'],
    'GdprFields\\GetGDPRFieldRequest' => [new GetGDPRFieldRequest('gdprFieldId'), 'GET', '/gdpr-fields/gdprFieldId'],
    'Imports\\CreateImportRequest' => [new CreateImportRequest('value', [], []), 'POST', '/imports'],
    'Imports\\GetImportByIdRequest' => [new GetImportByIdRequest('importId'), 'GET', '/imports/importId'],
    'Imports\\GetImportListRequest' => [new GetImportListRequest, 'GET', '/imports'],
    'LandingPages\\GetLpsByIdRequest' => [new GetLpsByIdRequest('lpsId'), 'GET', '/lps/lpsId'],
    'LandingPages\\GetLpsListRequest' => [new GetLpsListRequest, 'GET', '/lps'],
    'LegacyForms\\GetLegacyFormByIdRequest' => [new GetLegacyFormByIdRequest('webformId'), 'GET', '/webforms/webformId'],
    'LegacyForms\\GetLegacyFormListRequest' => [new GetLegacyFormListRequest, 'GET', '/webforms'],
    'LegacyLandingPages\\GetLandingPageByIdRequest' => [new GetLandingPageByIdRequest('landingPageId'), 'GET', '/landing-pages/landingPageId'],
    'LegacyLandingPages\\GetLandingPageListRequest' => [new GetLandingPageListRequest, 'GET', '/landing-pages'],
    'MetaFields\\CreateMetaFieldRequest' => [new CreateMetaFieldRequest('shopId', 'value', 'value', 'value'), 'POST', '/shops/shopId/meta-fields'],
    'MetaFields\\DeleteMetaFieldRequest' => [new DeleteMetaFieldRequest('shopId', 'metaFieldId'), 'DELETE', '/shops/shopId/meta-fields/metaFieldId'],
    'MetaFields\\GetMetaFieldRequest' => [new GetMetaFieldRequest('shopId', 'metaFieldId'), 'GET', '/shops/shopId/meta-fields/metaFieldId'],
    'MetaFields\\GetMetaFieldsRequest' => [new GetMetaFieldsRequest('shopId'), 'GET', '/shops/shopId/meta-fields'],
    'MetaFields\\UpdateMetaFieldRequest' => [new UpdateMetaFieldRequest('shopId', 'metaFieldId'), 'POST', '/shops/shopId/meta-fields/metaFieldId'],
    'Multimedia\\GetImageListRequest' => [new GetImageListRequest, 'GET', '/multimedia'],
    'Multimedia\\UploadImageRequest' => [new UploadImageRequest('image-bytes'), 'POST', '/multimedia'],
    'Newsletters\\CancelMessageSendRequest' => [new CancelMessageSendRequest('newsletterId'), 'POST', '/newsletters/newsletterId/cancel'],
    'Newsletters\\CreateNewsletterRequest' => [new CreateNewsletterRequest([], 'value', [], [], []), 'POST', '/newsletters'],
    'Newsletters\\DeleteNewsletterRequest' => [new DeleteNewsletterRequest('newsletterId'), 'DELETE', '/newsletters/newsletterId'],
    'Newsletters\\GetNewsletterActivitiesRequest' => [new GetNewsletterActivitiesRequest('newsletterId'), 'GET', '/newsletters/newsletterId/activities'],
    'Newsletters\\GetNewsletterListRequest' => [new GetNewsletterListRequest, 'GET', '/newsletters'],
    'Newsletters\\GetNewsletterRequest' => [new GetNewsletterRequest('newsletterId'), 'GET', '/newsletters/newsletterId'],
    'Newsletters\\GetNewsletterStatisticsCollectionRequest' => [new GetNewsletterStatisticsCollectionRequest, 'GET', '/newsletters/statistics'],
    'Newsletters\\GetNewsletterThumbnailRequest' => [new GetNewsletterThumbnailRequest('newsletterId'), 'GET', '/newsletters/newsletterId/thumbnail'],
    'Newsletters\\GetSingleNewsletterStatisticsRequest' => [new GetSingleNewsletterStatisticsRequest('newsletterId'), 'GET', '/newsletters/newsletterId/statistics'],
    'Newsletters\\SendDraftRequest' => [new SendDraftRequest('value', []), 'POST', '/newsletters/send-draft'],
    'Orders\\CreateOrderRequest' => [new CreateOrderRequest('shopId', [], 'value', 1.0, 'value'), 'POST', '/shops/shopId/orders'],
    'Orders\\DeleteOrderRequest' => [new DeleteOrderRequest('shopId', 'orderId'), 'DELETE', '/shops/shopId/orders/orderId'],
    'Orders\\GetOrderByIdRequest' => [new GetOrderByIdRequest('shopId', 'orderId'), 'GET', '/shops/shopId/orders/orderId'],
    'Orders\\GetOrderListRequest' => [new GetOrderListRequest('shopId'), 'GET', '/shops/shopId/orders'],
    'Orders\\UpdateOrderRequest' => [new UpdateOrderRequest('shopId', 'orderId'), 'POST', '/shops/shopId/orders/orderId'],
    'PredefinedFields\\CreatePredefinedFieldRequest' => [new CreatePredefinedFieldRequest('value', 'value', []), 'POST', '/predefined-fields'],
    'PredefinedFields\\DeletePredefinedFieldRequest' => [new DeletePredefinedFieldRequest('predefinedFieldId'), 'DELETE', '/predefined-fields/predefinedFieldId'],
    'PredefinedFields\\GetPredefinedFieldByIdRequest' => [new GetPredefinedFieldByIdRequest('predefinedFieldId'), 'GET', '/predefined-fields/predefinedFieldId'],
    'PredefinedFields\\GetPredefinedFieldListRequest' => [new GetPredefinedFieldListRequest, 'GET', '/predefined-fields'],
    'PredefinedFields\\UpdatePredefinedFieldRequest' => [new UpdatePredefinedFieldRequest('predefinedFieldId', 'value'), 'POST', '/predefined-fields/predefinedFieldId'],
    'ProductVariants\\CreateProductVariantRequest' => [new CreateProductVariantRequest('shopId', 'productId', 'value', 'value', 1.0, 1.0), 'POST', '/shops/shopId/products/productId/variants'],
    'ProductVariants\\DeleteProductVariantRequest' => [new DeleteProductVariantRequest('shopId', 'productId', 'variantId'), 'DELETE', '/shops/shopId/products/productId/variants/variantId'],
    'ProductVariants\\GetProductVariantByIdRequest' => [new GetProductVariantByIdRequest('shopId', 'productId', 'variantId'), 'GET', '/shops/shopId/products/productId/variants/variantId'],
    'ProductVariants\\GetProductVariantListRequest' => [new GetProductVariantListRequest('shopId', 'productId'), 'GET', '/shops/shopId/products/productId/variants'],
    'ProductVariants\\UpdateProductVariantRequest' => [new UpdateProductVariantRequest('shopId', 'productId', 'variantId'), 'POST', '/shops/shopId/products/productId/variants/variantId'],
    'Products\\CreateProductRequest' => [new CreateProductRequest('shopId', 'value', []), 'POST', '/shops/shopId/products'],
    'Products\\DeleteProductRequest' => [new DeleteProductRequest('shopId', 'productId'), 'DELETE', '/shops/shopId/products/productId'],
    'Products\\GetProductByIdRequest' => [new GetProductByIdRequest('shopId', 'productId'), 'GET', '/shops/shopId/products/productId'],
    'Products\\GetProductListRequest' => [new GetProductListRequest('shopId'), 'GET', '/shops/shopId/products'],
    'Products\\UpdateProductRequest' => [new UpdateProductRequest('shopId', 'productId'), 'POST', '/shops/shopId/products/productId'],
    'Products\\UpsertMetaFieldsRequest' => [new UpsertMetaFieldsRequest('shopId', 'productId', []), 'POST', '/shops/shopId/products/productId/meta-fields'],
    'Products\\UpsertProductCategoriesRequest' => [new UpsertProductCategoriesRequest('shopId', 'productId', []), 'POST', '/shops/shopId/products/productId/categories'],
    'RssNewsletters\\CreateRssNewsletterRequest' => [new CreateRssNewsletterRequest('value', 'value', 'enabled', [], [], []), 'POST', '/rss-newsletters'],
    'RssNewsletters\\DeleteRssNewsletterRequest' => [new DeleteRssNewsletterRequest('rssNewsletterId'), 'DELETE', '/rss-newsletters/rssNewsletterId'],
    'RssNewsletters\\GetRssNewsletterByIdRequest' => [new GetRssNewsletterByIdRequest('rssNewsletterId'), 'GET', '/rss-newsletters/rssNewsletterId'],
    'RssNewsletters\\GetRssNewsletterStatisticsCollectionRequest' => [new GetRssNewsletterStatisticsCollectionRequest, 'GET', '/rss-newsletters/statistics'],
    'RssNewsletters\\GetRssNewslettersListRequest' => [new GetRssNewslettersListRequest, 'GET', '/rss-newsletters'],
    'RssNewsletters\\GetSingleRssNewsletterStatisticsCollectionRequest' => [new GetSingleRssNewsletterStatisticsCollectionRequest('rssNewsletterId'), 'GET', '/rss-newsletters/rssNewsletterId/statistics'],
    'RssNewsletters\\UpdateRssNewsletterRequest' => [new UpdateRssNewsletterRequest('rssNewsletterId'), 'POST', '/rss-newsletters/rssNewsletterId'],
    'SearchContacts\\DeleteSearchContactsRequest' => [new DeleteSearchContactsRequest('searchContactId'), 'DELETE', '/search-contacts/searchContactId'],
    'SearchContacts\\GetContactsByIdSearchContactsRequest' => [new GetContactsByIdSearchContactsRequest('searchContactId'), 'GET', '/search-contacts/searchContactId/contacts'],
    'SearchContacts\\GetContactsFromSearchContactsConditionsRequest' => [new GetContactsFromSearchContactsConditionsRequest([], 'value', []), 'POST', '/search-contacts/contacts'],
    'SearchContacts\\GetSearchContactsByIdRequest' => [new GetSearchContactsByIdRequest('searchContactId'), 'GET', '/search-contacts/searchContactId'],
    'SearchContacts\\GetSearchContactsListRequest' => [new GetSearchContactsListRequest, 'GET', '/search-contacts'],
    'SearchContacts\\NewSearchContactsRequest' => [new NewSearchContactsRequest('value', [], 'value'), 'POST', '/search-contacts'],
    'SearchContacts\\UpdateSearchContactsRequest' => [new UpdateSearchContactsRequest('searchContactId', 'value', [], 'value'), 'POST', '/search-contacts/searchContactId'],
    'SearchContacts\\UpsertCustomFieldsBySearchContactIdRequest' => [new UpsertCustomFieldsBySearchContactIdRequest('searchContactId', []), 'POST', '/search-contacts/searchContactId/custom-fields'],
    'Shops\\CreateShopRequest' => [new CreateShopRequest('value', 'value', 'value'), 'POST', '/shops'],
    'Shops\\DeleteShopRequest' => [new DeleteShopRequest('shopId'), 'DELETE', '/shops/shopId'],
    'Shops\\GetShopByIdRequest' => [new GetShopByIdRequest('shopId'), 'GET', '/shops/shopId'],
    'Shops\\GetShopListRequest' => [new GetShopListRequest, 'GET', '/shops'],
    'Shops\\UpdateShopRequest' => [new UpdateShopRequest('shopId'), 'POST', '/shops/shopId'],
    'Sms\\GetSMSAutomationListRequest' => [new GetSMSAutomationListRequest, 'GET', '/sms-automation'],
    'Sms\\GetSMSListRequest' => [new GetSMSListRequest, 'GET', '/sms'],
    'Sms\\GetSmsAutomationByIdRequest' => [new GetSmsAutomationByIdRequest('smsId'), 'GET', '/sms-automation/smsId'],
    'Sms\\GetSmsByIdRequest' => [new GetSmsByIdRequest('smsId'), 'GET', '/sms/smsId'],
    'Sms\\GetSmsSenderNameListRequest' => [new GetSmsSenderNameListRequest, 'GET', '/sms/sender-names'],
    'Sms\\SendSmsRequest' => [new SendSmsRequest('value', 'value', 'value'), 'POST', '/sms'],
    'Statistics\\GetGeneralPerformanceStatsRequest' => [new GetGeneralPerformanceStatsRequest, 'GET', '/statistics/ecommerce/performance'],
    'Statistics\\GetLpsGeneralPerformanceStatsRequest' => [new GetLpsGeneralPerformanceStatsRequest('lpsId'), 'GET', '/statistics/lps/lpsId/performance'],
    'Statistics\\GetPopupGeneralPerformanceRequest' => [new GetPopupGeneralPerformanceRequest('popupId'), 'GET', '/statistics/popups/popupId/performance'],
    'Statistics\\GetRevenueStatsRequest' => [new GetRevenueStatsRequest, 'GET', '/statistics/ecommerce/revenue'],
    'Statistics\\GetSmsStatsRequest' => [new GetSmsStatsRequest('smsId'), 'GET', '/statistics/sms/smsId'],
    'Statistics\\GetWbeGeneralPerformanceStatsRequest' => [new GetWbeGeneralPerformanceStatsRequest('websiteId'), 'GET', '/statistics/wbe/websiteId/performance'],
    'SubscriptionConfirmations\\GetSubscriptionConfirmationBodyListRequest' => [new GetSubscriptionConfirmationBodyListRequest('languageCode'), 'GET', '/subscription-confirmations/body/languageCode'],
    'SubscriptionConfirmations\\GetSubscriptionConfirmationSubjectListRequest' => [new GetSubscriptionConfirmationSubjectListRequest('languageCode'), 'GET', '/subscription-confirmations/subject/languageCode'],
    'Suppressions\\CreateSuppressionRequest' => [new CreateSuppressionRequest('value'), 'POST', '/suppressions'],
    'Suppressions\\DeleteSuppressionRequest' => [new DeleteSuppressionRequest('suppressionId'), 'DELETE', '/suppressions/suppressionId'],
    'Suppressions\\GetSuppressionByIdRequest' => [new GetSuppressionByIdRequest('suppressionId'), 'GET', '/suppressions/suppressionId'],
    'Suppressions\\GetSuppressionsListRequest' => [new GetSuppressionsListRequest, 'GET', '/suppressions'],
    'Suppressions\\UpdateSuppressionRequest' => [new UpdateSuppressionRequest('suppressionId', 'value', []), 'POST', '/suppressions/suppressionId'],
    'Tags\\CreateTagRequest' => [new CreateTagRequest('value'), 'POST', '/tags'],
    'Tags\\DeleteTagRequest' => [new DeleteTagRequest('tagId'), 'DELETE', '/tags/tagId'],
    'Tags\\GetTagByIdRequest' => [new GetTagByIdRequest('tagId'), 'GET', '/tags/tagId'],
    'Tags\\GetTagsListRequest' => [new GetTagsListRequest, 'GET', '/tags'],
    'Tags\\UpdateTagRequest' => [new UpdateTagRequest('tagId', 'value'), 'POST', '/tags/tagId'],
    'Taxes\\CreateTaxRequest' => [new CreateTaxRequest('shopId', 'value', 1.0), 'POST', '/shops/shopId/taxes'],
    'Taxes\\DeleteTaxRequest' => [new DeleteTaxRequest('shopId', 'taxId'), 'DELETE', '/shops/shopId/taxes/taxId'],
    'Taxes\\GetTaxByIdRequest' => [new GetTaxByIdRequest('shopId', 'taxId'), 'GET', '/shops/shopId/taxes/taxId'],
    'Taxes\\GetTaxListRequest' => [new GetTaxListRequest('shopId'), 'GET', '/shops/shopId/taxes'],
    'Taxes\\UpdateTaxRequest' => [new UpdateTaxRequest('shopId', 'taxId'), 'POST', '/shops/shopId/taxes/taxId'],
    'Tracking\\GetFacebookPixelListRequest' => [new GetFacebookPixelListRequest, 'GET', '/tracking/facebook-pixels'],
    'Tracking\\GetTrackingRequest' => [new GetTrackingRequest, 'GET', '/tracking'],
    'TransactionalEmailTemplates\\CreateTransactionalEmailTemplateRequest' => [new CreateTransactionalEmailTemplateRequest('value'), 'POST', '/transactional-emails/templates'],
    'TransactionalEmailTemplates\\DeleteTransactionalEmailsTemplateRequest' => [new DeleteTransactionalEmailsTemplateRequest('transactionalEmailTemplateId'), 'DELETE', '/transactional-emails/templates/transactionalEmailTemplateId'],
    'TransactionalEmailTemplates\\GetTransactionalEmailsTemplatesByIdRequest' => [new GetTransactionalEmailsTemplatesByIdRequest('transactionalEmailTemplateId'), 'GET', '/transactional-emails/templates/transactionalEmailTemplateId'],
    'TransactionalEmailTemplates\\GetTransactionalEmailsTemplatesListRequest' => [new GetTransactionalEmailsTemplatesListRequest, 'GET', '/transactional-emails/templates'],
    'TransactionalEmailTemplates\\UpdateTransactionalEmailsTemplateRequest' => [new UpdateTransactionalEmailsTemplateRequest('transactionalEmailTemplateId'), 'POST', '/transactional-emails/templates/transactionalEmailTemplateId'],
    'TransactionalEmails\\CreateTransactionalEmailRequest' => [new CreateTransactionalEmailRequest([], [], 'value'), 'POST', '/transactional-emails'],
    'TransactionalEmails\\GetTransactionalEmailsByIdRequest' => [new GetTransactionalEmailsByIdRequest('transactionalEmailId'), 'GET', '/transactional-emails/transactionalEmailId'],
    'TransactionalEmails\\GetTransactionalEmailsListRequest' => [new GetTransactionalEmailsListRequest, 'GET', '/transactional-emails'],
    'TransactionalEmails\\GetTransactionalEmailsStatisticsRequest' => [new GetTransactionalEmailsStatisticsRequest, 'GET', '/transactional-emails/statistics'],
    'Webinars\\GetWebinarByIdRequest' => [new GetWebinarByIdRequest('webinarId'), 'GET', '/webinars/webinarId'],
    'Webinars\\GetWebinarListRequest' => [new GetWebinarListRequest, 'GET', '/webinars'],
    'Websites\\GetWebsiteByIdRequest' => [new GetWebsiteByIdRequest('websiteId'), 'GET', '/websites/websiteId'],
    'Websites\\GetWebsitesListRequest' => [new GetWebsitesListRequest, 'GET', '/websites'],
    'Workflows\\GetWorkflowListRequest' => [new GetWorkflowListRequest, 'GET', '/workflow'],
    'Workflows\\GetWorkflowRequest' => [new GetWorkflowRequest('workflowId'), 'GET', '/workflow/workflowId'],
    'Workflows\\UpdateWorkflowRequest' => [new UpdateWorkflowRequest('workflowId', 'value'), 'POST', '/workflow/workflowId'],
]);
