# Rameera Admin Product Grid Category Filter

`Rameera_AdminProductGridCategoryFilter` adds a category column and category filter dropdown to Magento admin product listing grids.

## Features

- Adds a `Categories` column to admin product grids.
- Adds a `Categories` filter for Product, Related, Cross-sell, and Up-sell listing grids.
- Uses category option source model for quick filter selection.
- Works with modern Magento 2.4 installations.

## Compatibility

- Magento Open Source / Adobe Commerce `2.4.4` and later in the `2.4.x` line.
- PHP `8.1`, `8.2`, `8.3`, and `8.4`.

## Installation

> Important: use **one installation mode only**.
>
> - If installed via Composer, do **not** keep a copy in `app/code/Rameera/AdminProductGridCategoryFilter`.
> - If using `app/code`, do **not** install `arjundhi/magento2-admin-product-grid-category-filter` via Composer.

### Install from app/code

Place the module under:

`app/code/Rameera/AdminProductGridCategoryFilter`

Then run:

```bash
php bin/magento module:enable Rameera_AdminProductGridCategoryFilter
php bin/magento setup:upgrade
php bin/magento cache:flush
```

### Install with Composer

```bash
composer require arjundhi/magento2-admin-product-grid-category-filter
php bin/magento module:enable Rameera_AdminProductGridCategoryFilter
php bin/magento setup:upgrade
php bin/magento cache:flush
```

## How to use

Go to `Catalog > Products` in admin:

- Use the `Categories` filter to narrow product lists.
- See product category names in the `Categories` column.

The same behavior is available in related product selectors (Related, Cross-sell, Up-sell).

## Module Structure

- `Model/Category/CategoryList.php` builds category filter options.
- `Ui/Component/Listing/Column/Category.php` renders category names in the grid column.
- `Ui/DataProvider/Product/*.php` applies category-based filtering for product listings.
- `view/adminhtml/ui_component/*.xml` injects the filter/column into admin listing UI components.

## CI Matrix

This repository includes a GitHub Actions workflow at `.github/workflows/ci.yml`.

Validation runs on:

- PHP `8.2`
- PHP `8.4`

It validates Composer metadata, PHP syntax, and XML well-formedness.

### Install commands by environment

Stable production install:

```bash
composer require arjundhi/magento2-admin-product-grid-category-filter:^1.0
```

Staging/dev install (before first stable tag is visible):

```bash
composer require arjundhi/magento2-admin-product-grid-category-filter:"dev-main@dev"
```

## Troubleshooting: duplicate module registration

If you see:

`Module 'Rameera_AdminProductGridCategoryFilter' ... has been already defined in 'vendor/...'.`

it means Magento found the same module in both locations:

- `app/code/Rameera/AdminProductGridCategoryFilter`
- `vendor/arjundhi/magento2-admin-product-grid-category-filter`

Fix (Composer-based install):

```bash
rm -rf app/code/Rameera/AdminProductGridCategoryFilter
composer install
php bin/magento setup:upgrade
php bin/magento cache:flush
```

Prevent this in deployment/CI by running the guard script before `setup:upgrade`:

```bash
bash vendor/arjundhi/magento2-admin-product-grid-category-filter/bin/check-single-install-mode.sh
```

If you run in `app/code` mode, call the local module path instead:

```bash
bash app/code/Rameera/AdminProductGridCategoryFilter/bin/check-single-install-mode.sh
```

Expected output:

- `OK: Single install mode verified ...` → safe to continue deployment.
- `ERROR: Duplicate module install detected ...` → remove one copy first.

## License

This project is licensed under the MIT License. See `LICENSE` for details.
