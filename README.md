NAME
----
LAS Util - LAS Web tools in php 

SYNOPSIS
--------

 ```bash
# Setup:
git clone https://github.com/dcslagel/las-util-php
cd las-util-php/prj

# Make uploads and database directories
make init

# start development web server
make run
```

In a web browser, browse to:    
http://localhost:8000/upload

Select a las file to upload. (version.las in prj/raw_data is a simple test file).
Click 'upload'    
A message will report whether the file was uploaded or is already there.
 

DESCRIPTION
-----------
Caution: This is very beta exploratory demo software!

This is a php project without a framework.

LAS-Util current functionality:
- uploads a las header file
- parses the file
- store it in a database
- display the stored las header file data 

Future versions will implement:
- parse the next las section if included in the upload file
- implement unit testing
- clean up web display layout

DEPENDENCIES
------------

SQLite3



OPTIONS
-------

BUGS
----

- Functionality is absolutely very basic...


COPYRIGHT
------

Copyright (c) 2019 DC Slagel

