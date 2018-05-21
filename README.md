# ballast 

Ballast is a SASS ready child theme for the Genesis framework. The PHP and SCSS files are arranged in modules for easy editing and accessibility. 

## Getting Started

Clone this repo into your themes folder and run `npm install` for the necessary packages. 

### WooCommerce

Ballast supports WooCommerce out of the box and is styled to match Genesis-Sample 2.6. This stylesheet is loaded seperately and WooCommerce functionality can be removed by commenting out 

```
'woocommerce/woocommerce-setup.php',
'woocommerce/woocommerce-output.php',
'woocommerce/woocommerce-notice.php',
```

in the `autoload.php` file.

#### Gulp

Here are some of the useful Gulp tasks already set up for you. 

- `postcss` Compile all of the SCSS files
- `cssminify` Compresses the style.css file
- `sass-lint` SASS linter
- `styles` runs `postcss`, `cssminify` and `sass-lint`
- `watch` a watcher for `styles`
- `woocss` compiles all of the WooCommerce SASS files
- `compressjs` compiles and uglifies all of the js files
- `watchjs` watcher for `compressjs`