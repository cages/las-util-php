NAME
----
LAS Util - Log Ascii Standard 2.0 web tools in Php

TABLE-OF-CONTENTS
-----------------
- [DESCRIPTION](#description)
- [SYNOPSIS](#synopsis)
- [DEPENDENCIES](#dependencies)
- [PROJECT-ROADMAP](#project-roadmap)
- [REST-API](#rest-api)
- [FEATURE-REQUEST](#feature-request)
- [BUGS](#bugs)
- [COPYRIGHT](#copyright)

[DESCRIPTION](#name)
-----------

Caution: Las-Util-Php is beta software with limited functionality.

LAS (Log Ascii Standard) web utilities in non-framework PHP

The current goals of `las-util-php` are:
- Parse LAS 2.0 meta-data and data sections
- Explore software design issues related to non-framework PHP
- Explore responsive web design issue with data related web tools

This utility is based on the LAS file format specification   
maintained by the Canadian Well Logging Society at   
https://www.cwls.org/products/#products-las


LAS-Util current functionality:
- Upload a LAS file that includes only the VERSION, WELL and CURVE header
  sections
- Parse the sections and add them to the database
- Display a list of uploaded files
- Display details on a selected uploaded file
- Provide API for listing uploaded LAS docs and details
- Responsive multi-device display


LAS-Util has been tested with PHP 7.4.1

[SYNOPSIS](#name)
--------

 ```bash
# Setup:
git clone https://github.com/dcslagel/las-util-php
cd las-util-php/prj

# View makefile menu
make help

# Make uploads and database directories
make initdirs

# Make database, this depends on Sqlite3 being installed
make initdb

# start development web server
make run
```

In a web browser, browse to:    
http://localhost:7000/upload

Select the LAS file prj/example_data/sample_next.las to upload.
Sample_next.las has been verified that it will process correctly.

The sample_next.las currently is made up of the header sections: version, well
and curve.
Additional header sections and the '~A' data section will be added
in future iterations.

Click 'upload'

  LAS-Util will:
  - upload the file to a local uploads directory
  - parse the file's information and save it to the database

Select the 'Display LAS Files' menu item. The uploaded file will have the most recent date.

[DEPENDENCIES](#name)
------------

SQLite3


[PROJECT-ROADMAP](#name)
---------------
`LAS-Util-Php`'s project road-map is managed in github milestones at:    

https://github.com/dcslagel/las-util-php/milestones


[REST-API](#name)
--------

To retrieve uploaded LAS docs:
```bash
curl http://127.0.0.1:7000/api/list
```

To retrieve details of a specific LAS doc
Syntax:    
```bash
curl http://127.0.0.1:7000/api/detail?[filename]
```

Example:     
```bash
# first retrieve a filename from the previous 'api/list' call
# example: las_file-2019-08-29-21-41-42.las
curl http://127.0.0.1:7000/api/detail?las_file-2019-08-29-21-41-42.las
```


[FEATURE-REQUEST](#name)
----------------

To request and discuss a potential feature, create an issue at:
  - https://github.com/dcslagel/las-util-php/issues


[BUGS](#name)
----

- Functionality is limited to reading some fields from a LAS file containing
  only the v2.0 type sections.

- Report bugs by creating an issue at:
  - https://github.com/dcslagel/las-util-php/issues


[COPYRIGHT](#name)
------

Copyright (c) 2019, 2020 DC Slagel
