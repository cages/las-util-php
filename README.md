NAME
----
LAS Util - LAS Web tools in Php 

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

Select the 'Display LAS Files' menu item. The uploaded file will have the most recent date.
 

DESCRIPTION
-----------
Caution: This is very beta exploratory demo software!

LAS-Util-Php is a php project without a framework.

LAS file format versions are written and maintained by 
the Canadian Well Logging Society at   
http://www.cwls.org/las/


LAS-Util current functionality:
- Uploads a las header file
- Parses the file
- Store it in a database
- Display the stored las header file data 

Future versions will implement:
- Parse the next las section if included in the upload file
- Implement unit testing
- Implement rest api

DEPENDENCIES
------------

SQLite3



OPTIONS
-------

BUGS
----

- Functionality is very basic...


COPYRIGHT
------

Copyright (c) 2019 DC Slagel

