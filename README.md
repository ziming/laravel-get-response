# A PHP Laravel Library for GetResponse API

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ziming/laravel-get-response.svg?style=flat-square)](https://packagist.org/packages/ziming/laravel-get-response)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/ziming/laravel-get-response/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/ziming/laravel-get-response/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/ziming/laravel-get-response/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/ziming/laravel-get-response/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/ziming/laravel-get-response.svg?style=flat-square)](https://packagist.org/packages/ziming/laravel-get-response)

A PHP Laravel library for the [GetResponse API v3](https://apireference.getresponse.com/), built on top of [Saloon](https://docs.saloon.dev/). It covers the full public API surface — contacts, campaigns (lists), newsletters, autoresponders, SMS, transactional emails, ecommerce (shops, products, orders, carts), automation, statistics and more.

## Support

- Laravel 10.x, 11.x, 12.x, and 13.x

## Installation

You can install the package via composer:

```bash
composer require ziming/laravel-get-response
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-get-response-config"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

Create a connector with your API key (find it under *Integrations & API* → *API* in your GetResponse
account) and reach each part of the API through a resource accessor. Every call returns a
Saloon [`Response`](https://docs.saloon.dev/the-basics/responses).

```php
use Ziming\LaravelGetResponse\LaravelGetResponse;

$getResponse = new LaravelGetResponse(config('services.getresponse.token'));

// List contacts (query / sort / fields / pagination are all optional)
$response = $getResponse->contacts()->getContactList(
    queryParameters: ['email' => '@example.com'],
    sortParameters: ['createdOn' => 'DESC'],
    fields: ['contactId', 'email', 'name'],
    perPage: 100,
    page: 1,
);

$contacts = $response->json();

// Create a contact
$getResponse->contacts()->createContact(
    campaign: ['campaignId' => 'AbC12'],
    email: 'jane@example.com',
    name: 'Jane Doe',
);

// Fetch a single contact
$getResponse->contacts()->getContactById(contactId: 'pVyRW');
```

Resources mirror the API groups, for example:

```php
$getResponse->campaigns()->getCampaignList();
$getResponse->newsletters()->createNewsletter(/* ... */);
$getResponse->autoresponders()->getAutoresponderList();
$getResponse->tags()->createTag(name: 'VIP', color: '#ff0000');
$getResponse->customFields()->getCustomFieldList();
$getResponse->sms()->sendSms(name: 'Promo', content: 'Hi!', recipientsType: 'contacts');
$getResponse->transactionalEmails()->getTransactionalEmailsList();
$getResponse->shops()->getShopList();
$getResponse->products()->getProductList(shopId: 'shop1');
$getResponse->statistics()->getRevenueStats();
$getResponse->workflows()->updateWorkflow(workflowId: 'w1', status: 'active');
```

### Available resources

`abTests()`, `abTestsSubject()`, `accounts()`, `addresses()`, `autoresponders()`, `campaigns()`,
`carts()`, `categories()`, `clickTracks()`, `contacts()`, `customEvents()`, `customFields()`,
`customReports()`, `fileLibrary()`, `forms()`, `formsAndPopups()`, `fromFields()`, `gdprFields()`,
`imports()`, `landingPages()`, `legacyForms()`, `legacyLandingPages()`, `metaFields()`,
`multimedia()`, `newsletters()`, `orders()`, `predefinedFields()`, `productVariants()`, `products()`,
`rssNewsletters()`, `searchContacts()`, `shops()`, `sms()`, `statistics()`,
`subscriptionConfirmations()`, `suppressions()`, `tags()`, `taxes()`, `tracking()`,
`transactionalEmailTemplates()`, `transactionalEmails()`, `webinars()`, `websites()`, `workflows()`.

You can also send any request object through the connector directly:

```php
use Ziming\LaravelGetResponse\Requests\Contacts\GetContactByIdRequest;

$getResponse->send(new GetContactByIdRequest(contactId: 'pVyRW'));
```

### Rate limiting

The connector ships with GetResponse's documented throttling limits (80 requests/second and
30,000 requests per 10 minutes) via the Saloon rate limit plugin, backed by your default Laravel
cache store.

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [ziming](https://github.com/ziming)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
