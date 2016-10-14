<?php

/**
 * Genarate password hash and salt
 */
class Hash
{
	public static function generateHash($pass, $salt = '') {
		return hash('sha256', $pass . $salt);
	}

	public static function salt($length) {
		return mcrypt_create_iv($length);
	}

	public static function unique() {
		return self::generateHash(uniqid());
	}
}
