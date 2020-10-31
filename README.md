# Mario Lego Barcodes

This project is an independent project meant to let you print barcode replacements, or create larger versions of the barcodes for fun.

This is a fan creation!  We encourage getting the official merch.  In fact this won't do much without at least getting the starter pack.  Then use this tool to add more fun options on top!  This was made for all the makers out there that like to customize their creations to the max.  What will you make?

# Installation

There are a few options here.  This assumes a little knowledge in setting up your own site, and using tools like composer and Docker.

## Install Locally Using Docker

**Requires:**  Docker

1.  Clone this repository locally.
1.  CD to the project folder, run `docker-compose build`
1.  Run `docker-compose up`
1.  Visit `http://localhost:8080`

## Install remotely

**Requires:** PHP 7.3+, composer

1.  On the remote server, clone this repo.
1.  In the project's folder, run `composer install`
1.  Point the document root to the `webroot` in this project.  Or if part of a larger project, you could add this repo somewhere (outside the web root) and create a sym link into the `webroot` folder.  However you do it, make sure only the files in `webroot` are exposed, not any of the files in the base folder.

# Usage

Once you have it running, just point your browser to the page, pick your options, click `generate`, then print it out.
