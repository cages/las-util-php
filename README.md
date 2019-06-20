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
make startserver
```

In a web browser, browse to:    
http://localhost:8000/upload

Select a las file to upload. (There are examples in src/raw_data).
Click 'upload'    
A message will report whether the file was uploaded or is already there.
 

DESCRIPTION
-----------
Caution: This is very beta software!

LAS-Util currently only uploads a las file:

Future versions will implement:
- parsing the file
- storing the parsed file in a database

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

