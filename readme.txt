 ----------------------------------------------------------------------
 Model-View-Controller-like Membership System - Web authentication suite
 Copyright (C) 2003 Voznyak Nazar
 ----------------------------------------------------------------------
 LICENSE
 This program is free software; you can redistribute it and/or
 modify it under the terms of the GNU General Public License (GPL)
 as published by the Free Software Foundation; either version 2
 of the License, or (at your option) any later version.
 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.
 You should have recieved the lincence included with the disribution.
 If not visit http://www.gnu.org/copyleft/gpl.html
 ----------------------------------------------------------------------

MVC-like Membership System v.0.0.1

"Membership System" is a compact MVC-like suite which can easily be used in
any PHP script. MVC-like (model-view-controller) means that system is separated onto
three different parts: system logic, access to databases and pages lookout.
With Membership System, developers can build applications with the standard user authentication complete, 
and developers can drop-in modules to handle extra user information and 
add functionality.</p>

Requirements:
>> Smarty 2.6.0
>> ADODB 4.05 

Sections
> 1. Intro
> 2. Model
> 3. View
> 4. Controller
> 5. Setup
> 6. Example

1. Intro
2. Model
3. View
4. Controller

5. Setup
a) Edit setup.php
You must edit the vales shown below:

/*** ADOdb library path */
  define('LIB_ADODB', ROOT.'../adodb/');

/*** Smarty library path */
  define('LIB_SMARTY', ROOT.'../smarty/');

b) Edit db/dbsetup.inc
You must edit the vales shown below:

  $dbHost = "localhost";
  $dbUsername = "root";
  $dbPassword = "0";
  $dbName = "escort";
  $go_conn = &ADONewConnection('mysql');

c) Then you need to run install/installdb.php to create tables

6. Example
The first thing that has to be added is:
require_once '../setup.php';

That needs to be placed before anything else in the page.
