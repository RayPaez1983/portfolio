# Starter Project WP

This is a starter project empty and ready to start any project with Wordpress


## Installation

First you need download the code of the project, for that we use::

```
git clone --recursive https://gdmartinez93@bitbucket.org/gdmartinez93/starter-project-wp.git NAME_PROJECT
```

Next, we need configure us wp-config file, so we need duplicate the wp-config-sample.php and rename to wp-config.php.

```
cp wp-config-sample.php wp-config.php
```

Now, we need set the correct information on the constants of configuration file:

```
define('DB_NAME', 'database_name_here');
define('DB_USER', 'username_here');
define('DB_PASSWORD', 'password_here');
define('DB_HOST', 'localhost');
```

Is finished, now we can start to development# WP-starter-project
