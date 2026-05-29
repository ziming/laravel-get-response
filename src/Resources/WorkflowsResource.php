<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Resources;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Ziming\LaravelGetResponse\Requests\Workflows\GetWorkflowListRequest;
use Ziming\LaravelGetResponse\Requests\Workflows\GetWorkflowRequest;
use Ziming\LaravelGetResponse\Requests\Workflows\UpdateWorkflowRequest;

class WorkflowsResource extends BaseResource
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getWorkflowList(
        array $fields = [],
        ?int $perPage = null,
        ?int $page = null,
    ): Response {
        return $this->connector->send(new GetWorkflowListRequest($fields, $perPage, $page));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function getWorkflow(
        string $workflowId,
        array $fields = [],
    ): Response {
        return $this->connector->send(new GetWorkflowRequest($workflowId, $fields));
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function updateWorkflow(
        string $workflowId,
        string $status,
    ): Response {
        return $this->connector->send(new UpdateWorkflowRequest($workflowId, $status));
    }
}
