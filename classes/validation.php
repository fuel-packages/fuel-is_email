<?php

namespace Is_Email;

class Validation extends \Fuel\Core\Validation
{
	public function _validation_is_email($val)
	{
		return $this->_empty($val) || is_email($val);
	}

	public function _validation_is_emails($val)
	{
		if ($this->_empty($val)) {
			return true;
		}

		$emails = explode(',', $val);

		foreach ($emails as $email) {
			if (! is_email($email)) {
				return false;
			}
		}

		return true;
	}
}
