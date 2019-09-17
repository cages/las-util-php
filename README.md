NAME
----

LAS Util - LAS web tools in Php 

SYNOPSIS
--------

 ```bash
# Setup:
git clone https://github.com/dcslagel/las-util-php
cd las-util-php/prj

# View makefile menu
make help

# Make uploads and database directories
make init

# Make database, this depends on Sqlite3 being installed
make initdb

# start development web server
make run
```

In a web browser, browse to:    
http://localhost:7000/upload

Select a LAS file with only a ~VERSION section to upload.    
Version.las in prj/example_data is verified to work.    
Click 'upload'    

  LAS-Util will:
  - upload the file to las-util-flask/src/uploads
  - parse the version section and save it to the database

Select the 'Display LAS Files' menu item. The uploaded file will have the most recent date.

REST API
--------

To retrieve uploaded LAS docs:
```bash
curl http://127.0.0.1:7000/api/list
```

To retreive details of a specific LAS doc 
Syntax:    
```bash
curl http://127.0.0.1:7000/api/detail/[filename]    
```

Example:     
```bash
# first retrieve a filename from the prvious 'api/list' call
# example: las_file-2019-08-29-21-41-42.las
curl http://127.0.0.1:7000/api/detail/las_file-2019-08-29-21-41-42.las
```


DESCRIPTION
-----------
Caution: This is beta software!

LAS (Log Ascii Standard) web utilities in non-framework PHP

This utility is based on the LAS file format specification   
maintained by the Canadian Well Logging Society at   
http://www.cwls.org/las/


LAS-Util current functionality:
- Upload a LAS file that includes only the VERSION section
- Parse the VERSION section and save it to the database
- Display a list of uploaded files
- Display details on a selected uploaded file
- **Provide api for listing uploaded LAS docs and details**


It has been tested with PHP 7.3.9 


Future versions will implement:
- Add LAS file posting api
- Parse the next las section if included in the upload file
- Implement unit testing
- Clean up web display layout


DEPENDENCIES
------------

SQLite3



OPTIONS
-------

BUGS
----

- Functionality is very basic.


COPYRIGHT
------

Copyright (c) 2019 DC Slagel
