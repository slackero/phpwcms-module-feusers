phpwcms Frontend User Permission
================================

The module **Frontend User Permission** helps to manage frontend user permissions and bind access to specific structure levels. It was used to give customers access to custom content (files, text, news…) which is curated by editors.


Compatibility
-------------

It’s compatible to versions of phpwcms released on/after March 7, 2017 only.


Setup
-----

Place the module into your installation. You can select it under modules in the backend then.
![Frontend User Permit](http://www.phpwcms.org/screenshot/mod-feuserpermit-list-view-2017.png)

The simplest thing to get it running in the frontend is to copy and paste the following code to your template (admin section of phpwcms' backend).

```
[PERMITTED]
	{PERMITTED}
	{CONTENT}
[/PERMITTED]
[PERMITTED_ELSE]
	{PERMITTED_ELSE}
[/PERMITTED_ELSE]
```

You have more possibilities by editing the template file of the module (see template/default.tmpl).


Using
-----

Add an user and give permissions by assigning the structure level(s) to which the user should get resctricted access after successful login.
![Frontend User Permit](http://www.phpwcms.org/screenshot/mod-feuserpermit-detail-view-2017.png)


Changes
-------

- **2017-03-07:** Multiple levels per user can be restricted, target of where to redirect the user after successful login, several fixes


Thanks!
-------

The module is funded by **[pixelpublic GmbH](https://www.pixelpublic.de)**. Thanks for your support guys.


Creator and supporter:
----------------------

**Oliver Georgi**

- [github.com/slackero](https://github.com/slackero)
- <og@phpwcms.org>


Copyright and license:
----------------------

Copyright 2015-2017 Oliver Georgi, released under [GNU GPL-2](https://github.com/slackero/phpwcms-extended/blob/master/LICENSE)
