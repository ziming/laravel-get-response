# Changelog

All notable changes to `laravel-get-response` will be documented in this file.

## Unreleased

- Full coverage of the GetResponse API v3 (220 endpoints across 44 resource groups), each exposed as a
  Saloon request and reachable through a resource accessor on the connector.
- Fixed the Workflows endpoints: they now use the singular `/workflow` path and the update request is a
  `POST` that correctly sends a JSON body.
- Fixed `GetCustomReportDetailsRequest` to call `/custom-reports/{id}` instead of `/reports/{id}`.
- Fixed the account blocklist request to nest the search under `query[mask]`.
- Added a data-driven test suite asserting the HTTP method and resolved endpoint of every request.
