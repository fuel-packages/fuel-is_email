# is_email

This package is a wrapper for the [is_email() function](http://isemail.info/about) for the [FuelPHP Framework](http://fuelphp.com/).

The ```Validation``` class in FuelPHP uses PHP's [filter_var() function](http://php.net/manual/en/function.filter-var.php) method which may not be as accurate as ```is_email()```, though I imagine this only causes problems in extreme cases that aren't likely to happen, but still, it is worth doing things in the best way that you can.

*TODO: Links to reports comparing ```is_email()``` and ```filter_var()``` for accuracy and performance on PHP 5.2.x/5.3.x/5.4.x to come soon.*


## Install

```
git submodule add git://github.com/propcom/fuel-is_email.git fuel/packages/is_email
git commit -m "adding is_email package as a git submodule"
```


## Setup

Add the ```is_email``` package to your ```fuel/app/config.php``` 

```php
<?php

return array(

// ...

	'always_load' => array(
		
		// ...

		'packages' => array(

			// ...

			'is_email',

			// ...

		),

		// ...

	),

// ...

);
```


## Configuration

*TODO: Ability to configure is_email, then document it.*


## Usage

### Before

To validate e-mail addresses, you will probably be using Fuel's e-mail validation methods, ```valid_email``` or ```valid_emails```.

Example of your Model:

```php
<?php

class Model_User extends \Orm\Model
{
	// ...

	protected static $_properties = array(

		// ...

		'email' => array(
			'data_type' => 'varchar',
			'label' => 'E-Mail Address',
			'validation' => array(
				'required',
				'valid_email',
				'max_length' => array(254),
			),
		),
		'emails' => array(
			'data_type' => 'text',
			'label' => 'Display Name',
			'validation' => array(
				'required',
				'valid_emails',
			),
		),

		// ...

	);

	protected static $_observers = array(
		'Orm\\Observer_Validation' => array(
			'events' => array('before_save'),
		),

		// ...

	)

	// ...
}

```


### After

To use is_email() instead is very simple, just change ```valid_email``` to ```is_email```, or if validating multiple comma-separated e-mail addresses change ```valid_emails``` to ```is_emails```.

The validation methods that use ```is_email()``` behave in exactly the same way as Fuel's e-mail validation methods, in that they do not assume the field is required, so if the field is required you also need to set that.

Here is an example:

```php
<?php

class Model_User extends \Orm\Model
{
	// ...

	protected static $_properties = array(

		// ...

		'email' => array(
			'data_type' => 'varchar',
			'label' => 'E-Mail Address',
			'validation' => array(
				'required',
				'is_email',
				'max_length' => array(254),
			),
		),
		'emails' => array(
			'data_type' => 'text',
			'label' => 'Display Name',
			'validation' => array(
				'required',
				'is_emails',
			),
		),

		// ...

	);

	protected static $_observers = array(
		'Orm\\Observer_Validation' => array(
			'events' => array('before_save'),
		),

		// ...

	)

	// ...
}

```
