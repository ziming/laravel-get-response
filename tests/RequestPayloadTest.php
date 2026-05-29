<?php

declare(strict_types=1);

use Saloon\Data\MultipartValue;
use Saloon\Enums\Method;
use Ziming\LaravelGetResponse\Requests\Accounts\GetAccountBlocklistRequest;
use Ziming\LaravelGetResponse\Requests\Autoresponders\CreateAutoresponderRequest;
use Ziming\LaravelGetResponse\Requests\Autoresponders\UpdateAutoresponderRequest;
use Ziming\LaravelGetResponse\Requests\Campaigns\CreateCampaignRequest;
use Ziming\LaravelGetResponse\Requests\Contacts\CreateBatchContactsRequest;
use Ziming\LaravelGetResponse\Requests\Contacts\CreateContactRequest;
use Ziming\LaravelGetResponse\Requests\Contacts\GetContactListRequest;
use Ziming\LaravelGetResponse\Requests\CustomFields\CreateCustomFieldRequest;
use Ziming\LaravelGetResponse\Requests\CustomFields\UpdateCustomFieldRequest;
use Ziming\LaravelGetResponse\Requests\CustomReports\GetCustomReportDetailsRequest;
use Ziming\LaravelGetResponse\Requests\Multimedia\UploadImageRequest;
use Ziming\LaravelGetResponse\Requests\ProductVariants\GetProductVariantByIdRequest;
use Ziming\LaravelGetResponse\Requests\RssNewsletters\CreateRssNewsletterRequest;
use Ziming\LaravelGetResponse\Requests\Workflows\GetWorkflowRequest;
use Ziming\LaravelGetResponse\Requests\Workflows\UpdateWorkflowRequest;

it('sends the workflow update as a POST to the singular /workflow endpoint with a JSON body', function (): void {
    $request = new UpdateWorkflowRequest(workflowId: 'abc', status: 'active');

    expect($request->getMethod())->toBe(Method::POST)
        ->and($request->resolveEndpoint())->toBe('/workflow/abc')
        ->and($request->body()->all())->toBe(['status' => 'active']);
});

it('reads a single workflow from the singular /workflow endpoint', function (): void {
    $request = new GetWorkflowRequest(workflowId: 'abc');

    expect($request->getMethod())->toBe(Method::GET)
        ->and($request->resolveEndpoint())->toBe('/workflow/abc');
});

it('reads custom report details from /custom-reports, not /reports', function (): void {
    $request = new GetCustomReportDetailsRequest(customReportId: 'r1');

    expect($request->resolveEndpoint())->toBe('/custom-reports/r1');
});

it('drops null and empty values from a create contact body but keeps required fields', function (): void {
    $request = new CreateContactRequest(
        campaign: ['campaignId' => 'L'],
        email: 'jane@example.com',
        name: 'Jane',
    );

    expect($request->body()->all())->toBe([
        'campaign' => ['campaignId' => 'L'],
        'email' => 'jane@example.com',
        'name' => 'Jane',
    ]);
});

it('keeps every required value in an all-required body', function (): void {
    $request = new CreateBatchContactsRequest(
        campaignId: 'L',
        contacts: [['email' => 'jane@example.com']],
    );

    expect($request->body()->all())->toBe([
        'campaignId' => 'L',
        'contacts' => [['email' => 'jane@example.com']],
    ]);
});

it('serialises list query parameters, sorting and comma-joined fields', function (): void {
    $request = new GetContactListRequest(
        queryParameters: ['email' => '@example.com'],
        sortParameters: ['createdOn' => 'DESC'],
        fields: ['contactId', 'email'],
        perPage: 50,
        page: 2,
    );

    expect($request->query()->all())->toBe([
        'query' => ['email' => '@example.com'],
        'sort' => ['createdOn' => 'DESC'],
        'fields' => 'contactId,email',
        'perPage' => 50,
        'page' => 2,
    ]);
});

it('nests the blocklist mask under the query parameter', function (): void {
    $request = new GetAccountBlocklistRequest(queryParameters: ['mask' => '*@example.com']);

    expect($request->query()->all())->toBe([
        'query' => ['mask' => '*@example.com'],
    ]);
});

it('resolves deeply nested shop resource endpoints', function (): void {
    $request = new GetProductVariantByIdRequest(
        shopId: 'shop1',
        productId: 'prod1',
        variantId: 'var1',
    );

    expect($request->resolveEndpoint())->toBe('/shops/shop1/products/prod1/variants/var1');
});

it('uses multipart form data for image uploads', function (): void {
    $request = new UploadImageRequest(file: 'image-bytes', filename: 'image.png');
    $file = $request->body()->get('file');

    expect($file)->toBeInstanceOf(MultipartValue::class)
        ->and($file->name)->toBe('file')
        ->and($file->value)->toBe('image-bytes')
        ->and($file->filename)->toBe('image.png');
});

it('serialises documented scalar enum values instead of arrays', function (): void {
    expect((new CreateCustomFieldRequest('age', 'string', 'text', 'false', []))->body()->all())
        ->toMatchArray([
            'type' => 'string',
            'format' => 'text',
            'hidden' => 'false',
        ])
        ->and((new UpdateCustomFieldRequest('field1', 'true', []))->body()->all())
        ->toMatchArray(['hidden' => 'true'])
        ->and((new CreateAutoresponderRequest([], 'Subject', 'enabled', [], []))->body()->all())
        ->toMatchArray(['status' => 'enabled'])
        ->and((new UpdateAutoresponderRequest('auto1', status: 'disabled'))->body()->all())
        ->toMatchArray(['status' => 'disabled'])
        ->and((new CreateCampaignRequest('List', isDefault: 'true'))->body()->all())
        ->toMatchArray(['isDefault' => 'true'])
        ->and((new CreateRssNewsletterRequest('https://example.com/rss', 'Subject', 'enabled', [], [], [], editor: 'text'))->body()->all())
        ->toMatchArray([
            'status' => 'enabled',
            'editor' => 'text',
        ]);
});
