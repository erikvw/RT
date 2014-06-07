RT
==

mediawiki Extension:RT for mysql

This is a modified version of the Mediawiki Extension:RT written by Greg Sabino Mullane. The modifications enable this extension to work with RT implementations using mysql. The extension on http://www.mediawiki.org/wiki/Extension:RT only works for Postgres.


1. Clone this repository into your mediawiki extensions folder, e.g. /usr/share/mediawiki/extensions

2. Add the following lines to the bottom of  your LocalSettings.php:

       ```php
       require_once "$IP/extensions/RT/RT.php";
       $wgRequestTracker_URL      = 'http://rt.example.com/Ticket/Display.html?id';
       $wgRequestTracker_DBuser   = 'rtuser';
       $wgRequestTracker_DBpasswd = 'wibble';
       $wgRequestTracker_DBhost   = 'rt.example.com';
       $wgRequestTracker_DBdbname = 'rtdb';
       ```
   Replace the RT URL, user, password, host and database name with yours. See http://www.mediawiki.org/wiki/Extension:RT    for other parameters. 
   
   Note: I do not use $wgRequestTracker_DBconn.

3. Mediawiki Extension:Balloons has been removed from the Mediawiki repository for security reasons so add this line to your LocalSettings.php.
       ```php 
       $wgRequestTracker_Useballoons = 0;
       ```

3. Reload apache

4. Refer to the Usage section at http://www.mediawiki.org/wiki/Extension:RT
