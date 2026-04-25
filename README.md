# Catalog Grid Category Tools for Magento 2

> Free, open-source Magento 2 extension  
> by **Arjun Dhiman** — 
> [Adobe Commerce Certified Master](https://magematch.com/developers/arjun-dhiman)  
> Part of the [MageMatch](https://magematch.com) 
> developer ecosystem

# MageMatch Admin Product Grid Category Filter

`MageMatch_AdminProductGridCategoryFilter` adds a category column and category filter dropdown to Magento admin product listing grids.

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
> - If installed via Composer, do **not** keep a copy in `app/code/MageMatch/AdminProductGridCategoryFilter`.
> - If using `app/code`, do **not** install `magematch/magento2-catalog-grid-category-tools` via Composer.

### Install from app/code

Place the module under:

`app/code/MageMatch/AdminProductGridCategoryFilter`

Then run:

```bash
php bin/magento module:enable MageMatch_AdminProductGridCategoryFilter
php bin/magento setup:upgrade
php bin/magento cache:flush
```

### Install with Composer

```bash
composer require magematch/magento2-catalog-grid-category-tools
php bin/magento module:enable MageMatch_AdminProductGridCategoryFilter
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
composer require magematch/magento2-catalog-grid-category-tools:^1.0
```

Staging/dev install (before first stable tag is visible):

```bash
composer require magematch/magento2-catalog-grid-category-tools:"dev-main@dev"
```

## Troubleshooting: duplicate module registration

If you see:

`Module 'MageMatch_AdminProductGridCategoryFilter' ... has been already defined in 'vendor/...'.`

it means Magento found the same module in both locations:

- `app/code/MageMatch/AdminProductGridCategoryFilter`
- `vendor/magematch/magento2-catalog-grid-category-tools`

Fix (Composer-based install):

```bash
rm -rf app/code/MageMatch/AdminProductGridCategoryFilter
composer install
php bin/magento setup:upgrade
php bin/magento cache:flush
```

## License

This project is licensed under the MIT License. See `LICENSE` for details.

---
## Installation
```bash
composer require magematch/magento2-catalog-grid-category-tools
bin/magento module:enable MageMatch_CatalogGridCategoryTools
bin/magento setup:upgrade
bin/magento cache:clean
```

## Compatibility
- Magento Open Source 2.4.x
- Adobe Commerce 2.4.x
- PHP 8.1, 8.2, 8.3

## Support & Custom Development
Need custom Magento development?  
Find vetted Adobe Commerce developers at  
**[magematch.com](https://magematch.com)**

## License
MIT License — free to use commercially
