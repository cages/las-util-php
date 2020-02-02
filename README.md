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
make initdirs

# Make database, this depends on Sqlite3 being installed
make initdb

# start development web server
make run
```

In a web browser, browse to:    
http://localhost:7000/upload

Select the LAS file **prj/example_data/sample_next.las** to upload.  It is
verified to process correctly.

The sample_next.las currently is made up of the header sections: version, well
and curve.  
Additional header sections and the '~A' data section will be added
in future iterations.

Click 'upload'    

  LAS-Util will:
  - upload the file to a local uploads directory
  - parse the the file's information and save it to the database

Select the 'Display LAS Files' menu item. The uploaded file will have the most recent date.

REST API
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


DESCRIPTION
-----------
Caution: This is beta software with limited functionality.

LAS (Log Ascii Standard) web utilities in non-framework PHP

This utility is based on the LAS file format specification   
maintained by the Canadian Well Logging Society at   
http://www.cwls.org/las/


LAS-Util current functionality:
- Upload a LAS file that includes only the VERSION, WELL and CURVE header
  sections
  Parse the sections and add them to the database
- Display a list of uploaded files
- Display details on a selected uploaded file
- Provide api for listing uploaded LAS docs and details


It has been tested with PHP 7.4.1 


Future versions will implement:
- Parse the PARAMETER las section if included in the upload file
- Implement unit testing
- Add LAS file posting api
- Improve web display layout


DEPENDENCIES
------------

SQLite3



OPTIONS
-------


BUGS
----

- Basic functionality is incomplete.


COPYRIGHT
------

Copyright (c) 2019 DC Slagel
