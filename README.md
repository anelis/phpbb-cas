phpBB CAS Authentication plugin
===============================
This plugin enables your [phpBB forum][phpBB] users to authenticate through a [CAS][CAS] server.

It relies on [phpCAS][phpCAS] as a backend for the CAS protocol.

Installation
------------

You can install this plugin in a few steps either manually or using [AutoMOD][AutoMOD].

As a first step, you **must** install [phpCAS][phpCAS]. Download it from their [GitHub][phpCAS] page.
Then, install it wherever you want to.

Currently, the plugin looks for phpCAS in a directory called ``CAS``.
You may either create a symlink in the ``includes/auth`` directory of your phpBB installation _or_
have it installed in your server php setup.

### Using AutoMOD

* Download the [latest zip package][latest].
* In the ``AutoMOD`` tab of the *administration panel*, upload your package and follow the instructions.

### Manually

[Download the archive][latest] and extract it in your phpbb root directory.

Usage
-----

In your **administration panel**, under ``Authentication``, select ``CAS``.
Then fill your CAS settings (*server name*, *port*...) and apply.

Now the login process will take place through [CAS][CAS].



  [phpBB]: http://www.phpbb.com/
  [phpCAS]: https://www.github/Jasig/phpCAS
  [CAS]: http://www.jasig.org/cas
  [AutoMOD]: http://www.phpbb.com/mods/automod/
  [latest]: https://github.com/anelis/phpbb-cas/zipball/master