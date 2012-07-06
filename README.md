Yourls Plugin 
=============


Limited Links
------------------

Plugin for [YOURLS 1.5+](http://yourls.org/): To limit redirections of a specific link with a '_' + 'number' added to this link

### Install

* In `/user/plugins`, create a new folder named `limited-links`
* In this new directory, copy file named `plugin.php`
* Go to the Plugins administration page and activate the plugin 

### Optional configuration

Character `_` could be change in `plugin.php`

* Locate `define( 'LIMIT_BEFORE_CHAR', '_' );` at line 12
* Change `_` with your specific character

### More

See more information at [Yourls Code](http://code.google.com/p/yourls/)