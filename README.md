Limited Links
=============

Plugin for [YOURLS](http://yourls.org) 1.5+. 

Description
-----------
Limit redirections of a specific link with '_' + 'number' added to this link.

Installation
------------
1. In `/user/plugins`, create a new folder named `limited-links`.
2. Drop these files in that directory.
3. Go to the Plugins administration page ( *eg* `http://sho.rt/admin/plugins` ) and activate the plugin.
4. Have fun!

Optionnal Setup
---------------
Character `_` could be change in `plugin.php`.

1. Locate `define( 'LIMIT_BEFORE_CHAR', '_' );` at line 12
2. Change `_` with your specific character
