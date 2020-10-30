#!/bin/bash

# create the webroot/dist folder if not exists
[ -d "webroot/dist" ] || mkdir webroot/dist

# Compile the sass css
./vendor/bin/pscss --style=compressed src/sass/index.scss > webroot/dist/index.css
./vendor/bin/pscss --style=compressed src/sass/generate.scss > webroot/dist/generate.css
