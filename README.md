# WP Foundation Boilerplate

A simple WordPress boilerplate theme built on Foundation 5, utilising Bower.js and Grunt.

## Getting Started

* Clone the repository to your machine:
```git clone git@github.com:danielhomer/wp-foundation-boilerplate.git```

* ```npm install```
* ```bower install```
* ```grunt```

## How it works

### Stylesheets

* **styles.css** The main stylesheet contains normalize.css, foundation.css and your custom styles. Edit ```assets/scss/style.scss``` to customise.

### Scripts

* **vendor.min.js** Contains jQuery, Foundation, Modernizr and some other dependencies, loaded in the header of every page

* **home.min.js** Loaded in the footer of the homepage/front page. Edit ```assets/scripts/home.js```

* **core.min.js** Loaded in the footer of every page. Edit ```assets/scripts/core.js```

### Enqueuing

All of the styles and scripts are enqueued via the ```functions.php```, you don't need to (and shouldn't be) hard-coding anything into the ```header.php```.