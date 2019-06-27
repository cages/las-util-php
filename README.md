NAME
----
LAS Util - LAS Web tools in php 

SYNOPSIS
--------

 ```bash
# Setup:
git clone https://github.com/cages/las-util-php
cd las-util-php/src
mkdir uploads
mkdir database
make startserver
```

In a web browser, browse to:    
http://localhost:8000/upload

Select a las file to upload. (There are examples in src/raw_data).
Click 'upload'    
A message will report whether the file was uploaded or is already there.
 

DESCRIPTION
-----------
Caution: This is very beta exporatory demo software!

This is a php project without a framework.

LAS-Util current functionality:
- uploads a las header file
- parses the file
- store it in a database

Future versions will implement:
- display the file data 
- implement unit testing

DEPENDENCIES
------------

bootstrap     
bootstrap version 3.3.7 is included in public/bootsrap    

newer versions can be downloaded from:    
https://github.com/twbs/bootstrap




OPTIONS
-------

BUGS
----

- Functionality is absolutely very basic...


COPYRIGHT
------

Copyright (c) 2019 DC Slagel

