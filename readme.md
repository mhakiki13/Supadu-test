Supadu Test
==============

How to run
--------------
You need a PHP server running locally or hosted to be able to view the webpage. If you have PHP installed locally you can run a temp server using the following command from the terminal: 

**php -S localhost:3000** (make sure you do this from the root).

You may change port '3000' to your desired one.

Node/SCSS/Node
--------------
All the SASS files can be found under src/scss. These have already been compiled using the node-sass module so there's no need to do it again, the output can be found under /public/main.min.css.

If you wish to make changes to the CSS, run the below commands from the terminal first:

1. **npm install** - this will install the required node_modules from the package.json file
2. **npm run watch** - this will watch for changes in the scss files and automatically update the main.min.css file under /public/css/

The output will be combined and minified.

JS
--------------
There is only one JS file, 'main.js' which can be found under public/js. This cointains the logic for the Tabbed Navigation component.
