<?php
/**
 * PHP library for handling cookies especially created for WPEngine hosted sites.
 *
 * @author    WPDiggerStudio <admin@wpdigger.com>
 * @license   https://opensource.org/licenses/MIT - The MIT License (MIT)
 * @link      https://github.com/WPDiggerStudio/WP-Cookie
 * @since     1.0.0
 */

/**
 * WPCookie handler.
 *
 * @since 1.0.0
 */

namespace WPDiggerStudio\WPCookie;

class WPCookie {
	/**
	 * Prefix for cookies.
	 *
	 * @var string
	 */
	public static $prefix = 'wp_';

	/**
	 * Domain for cookies.
	 *
	 * @var string
	 */
	public static $domain = '';

	/**
	 * Secure cookies.
	 *
	 * @var boolean
	 */
	public static $secure = true;

	/**
	 * HTTP only .
	 *
	 * @var boolean
	 */
	public static $httpOnly = true;

	/**
	 * Set cookie.
	 *
	 * @param  string  $key  → name the data to save
	 * @param  string  $value  → the data to save
	 * @param  string  $time  → expiration time in days
	 *
	 * @return boolean
	 */
	public static function set( $key, $value, $time = 30 ) {
		$prefix = self::$prefix . $key;
		if ( is_array( $value ) ) {
			$value = serialize( $value );
		}

		return setcookie( $prefix, $value, time() + ( 60 * $time ), '/', self::$domain, self::$secure, self::$httpOnly );
	}

	/**
	 * Get item from cookie.
	 *
	 * @param  string  $key  → item to look for in cookie
	 *
	 * @return mixed|false → returns cookie value, cookies array or false
	 */
	public static function get( $key = '' ) {
		if ( isset( $_COOKIE[ self::$prefix . $key ] ) ) {
			if ( isset( $_COOKIE[ self::$prefix . $key ] ) ) {
				$cookieValue  = stripslashes( $_COOKIE[ self::$prefix . $key ] );
				$isSerialized = @unserialize( $cookieValue );
				if ( $isSerialized !== false ) {
					return $isSerialized;
				} else {
					return $_COOKIE[ self::$prefix . $key ];
				}
			}
		} elseif ( $key == 'all' ) {
			return ( isset( $_COOKIE ) && count( $_COOKIE ) ) ? $_COOKIE : false;
		}
	}
	

	/**
	 * Empties and destroys the cookies.
	 *
	 * @param  string  $key  → cookie name to destroy. Not set to delete all
	 *
	 * @return boolean
	 */
	public static function destroy( $key = '' ) {
		if ( isset( $_COOKIE[ self::$prefix . $key ] ) ) {
			setcookie( self::$prefix . $key, '', 0, '/', self::$domain, self::$secure, self::$httpOnly );

			return true;
		}

		return false;
	}

	/**
	 * Set cookie prefix.
	 *
	 * @param  string  $prefix  → cookie prefix
	 *
	 * @return boolean
	 * @since 1.0.0
	 *
	 */
	public static function setPrefix( $prefix ) {
		if ( ! empty( $prefix ) && is_string( $prefix ) ) {
			self::$prefix = $prefix;

			return true;
		}

		return false;
	}

	/**
	 * Get cookie prefix.
	 *
	 * @return string
	 * @since 1.0.0
	 *
	 */
	public static function getPrefix() {
		return self::$prefix;
	}

	/**
	 * Set cookie domain.
	 *
	 * @param  string  $domain  → cookie domain
	 *
	 * @return boolean
	 * @since 1.0.0
	 *
	 */
	public static function setDomain( $domain ) {
		if ( ! empty( $domain ) && is_string( $domain ) ) {
			self::$domain = $domain;

			return true;
		}

		return false;
	}

	/**
	 * Get cookie domain.
	 *
	 * @return string
	 * @since 1.0.0
	 *
	 */
	public static function getDomain() {
		return self::$domain;
	}

	/**
	 * Set cookie secure.
	 *
	 * @param  string  $secure  → cookie secure
	 *
	 * @return boolean
	 * @since 1.0.0
	 *
	 */
	public static function setSecure( $secure ) {
		if ( ! empty( $secure ) && is_string( $secure ) ) {
			self::$secure = $secure;

			return true;
		}

		return false;
	}

	/**
	 * Get cookie secure.
	 *
	 * @return string
	 * @since 1.0.0
	 *
	 */
	public static function getSecure() {
		return self::$secure;
	}

	/**
	 * Set cookie HttpOnly.
	 *
	 * @param  string  $httpOnly  → cookie httpOnly
	 *
	 * @return boolean
	 * @since 1.0.0
	 *
	 */
	public static function setHttpOnly( $httpOnly ) {
		if ( ! empty( $httpOnly ) && is_string( $httpOnly ) ) {
			self::$httpOnly = $httpOnly;

			return true;
		}

		return false;
	}

	/**
	 * Get cookie HttpOnly.
	 *
	 * @return string
	 * @since 1.0.0
	 *
	 */
	public static function getHttpOnly() {
		return self::$httpOnly;
	}
}