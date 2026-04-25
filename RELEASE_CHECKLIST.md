# Release Checklist

Use this checklist before publishing a new GitHub release.

## Code Quality

- Confirm `composer.json` package metadata and repository URLs are current.
- Run `composer validate --no-check-lock --strict`.
- Run PHP lint on all module files.
- Confirm XML files are well-formed.

## Functional Checks

- Confirm `Categories` filter appears in admin product listing.
- Confirm category filtering works on Product, Related, Cross-sell, and Up-sell grids.
- Confirm `Categories` column renders category names correctly.

## Release Prep

- Update `CHANGELOG.md` with version/date changes.
- Commit all changes with a clear release message.
- Create and push annotated tag (example: `v1.0.0`).
- Publish GitHub release notes.
- Trigger Packagist update (manual refresh or webhook sync).

## Install Verification Matrix

- Verify stable install works: `composer require magematch/magento2-catalog-grid-category-tools:^1.0`.
- Verify dev fallback works for pre-tag testing: `composer require magematch/magento2-catalog-grid-category-tools:"dev-main@dev"`.
- Run validation against PHP `8.2` and `8.4` (same matrix as CI).
