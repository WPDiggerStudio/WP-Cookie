<?php
/**
 * PHP library for handling cookies especially created for WPEngine hosted sites.
 *
 * @author    WPDiggerStudio <admin@wpdigger.com>
 * @license   https://opensource.org/licenses/MIT - The MIT License (MIT)
 * @link      https://github.com/WPDiggerStudio/WP-Cookie
 * @since     1.0.0
 */

namespace WPDiggerStudio\WPCookie;

use PHPUnit\Framework\TestCase;

/**
 * Tests class for WPCookie library.
 *
 * @since 1.0.0
 */
final class WPCookieTest extends TestCase {
	/**
	 * Cookie instance.
	 *
	 * @since 1.0.0
	 *
	 * @var object
	 */
	protected $Cookie;

	/**
	 * Cookie prefix.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	protected $cookiePrefix;
	
	/**
	 * Set up.
	 *
	 * @since 1.0.0
	 */
	public function setUp() {
		parent::setUp();

		$this->Cookie = new Cookie;

		$cookie = $this->Cookie;

		$this->cookiePrefix = $cookie::getPrefix();
	}

	/**
	 * Check if it is an instance of.
	 *
	 * @since 1.0.0
	 */
	public function testIsInstanceOf() {
		$this->assertInstanceOf( '\WPDiggerStudio\WPCookie\WPCookie', $this->Cookie );
	}

	/**
	 * Set cookie.
	 *
	 * @runInSeparateProcess
	 */
	public function testSetCookie() {
		$cookie = $this->Cookie;

		$this->assertTrue( $cookie::set( 'cookie_name', 'value', 100 ) );
	}

	/**
	 * Get item from cookie.
	 *
	 * @runInSeparateProcess
	 */
	public function testGetCookie() {
		$cookie = $this->Cookie;

		$_COOKIE[ $this->cookiePrefix . 'cookie_name' ] = 'value';

		$this->assertContains( $cookie::get( 'cookie_name' ), 'value' );
	}

	/**
	 * Return cookies array.
	 *
	 * @runInSeparateProcess
	 */
	public function testGetAllCookies() {
		$cookie = $this->Cookie;

		$_COOKIE[ $this->cookiePrefix . 'cookie_name_one' ] = 'value';
		$_COOKIE[ $this->cookiePrefix . 'cookie_name_two' ] = 'value';

		$this->assertArrayHasKey(
			$this->cookiePrefix . 'cookie_name_two',
			$cookie::get( 'all' )
		);
	}

	/**
	 * Return cookies array non-existent.
	 *
	 * @runInSeparateProcess
	 */
	public function testGetAllCookiesNonExistents() {
		$cookie = $this->Cookie;

		$this->assertFalse( $cookie::get( 'all' ) );
	}

	/**
	 * Destroy one cookie.
	 *
	 * @runInSeparateProcess
	 */
	public function testDestroyOneCookie() {
		$cookie = $this->Cookie;

		$_COOKIE[ $this->cookiePrefix . 'cookie_name' ] = 'value';

		$this->assertTrue( $cookie::destroy( 'cookie_name' ) );
	}

	/**
	 * Destroy one cookie non-existent.
	 *
	 * @runInSeparateProcess
	 */
	public function testDestroyOneCookieNonExistent() {
		$cookie = $this->Cookie;

		$this->assertFalse( $cookie::destroy( 'cookie_name' ) );
	}

	/**
	 * Destroy all cookies.
	 *
	 * @runInSeparateProcess
	 */
	public function testDestroyAllCookies() {
		$cookie = $this->Cookie;

		$_COOKIE[ $this->cookiePrefix . 'cookie_name_one' ] = 'value';
		$_COOKIE[ $this->cookiePrefix . 'cookie_name_two' ] = 'value';

		$this->assertTrue( $cookie::destroy() );
	}

	/**
	 * Destroy all cookies non-existents.
	 *
	 * @runInSeparateProcess
	 */
	public function testDestroyAllCookiesNonExistents() {
		$cookie = $this->Cookie;

		$this->assertFalse( $cookie::destroy() );
	}

	/**
	 * Get cookie prefix.
	 *
	 * @runInSeparateProcess
	 *
	 * @since 1.0.0
	 */
	public function testGetCookiePrefix() {
		$cookie = $this->Cookie;

		$this->assertContains( $cookie::getPrefix(), 'wp_' );
	}

	/**
	 * Set cookie prefix.
	 *
	 * @runInSeparateProcess
	 *
	 * @since 1.0.0
	 */
	public function testSetCookiePrefix() {
		$cookie = $this->Cookie;

		$this->assertTrue( $cookie::setPrefix( 'prefix_' ) );
	}

	/**
	 * Set cookie prefix incorrectly.
	 *
	 * @runInSeparateProcess
	 *
	 * @since 1.0.0
	 */
	public function testSetCookieIncorrectly() {
		$cookie = $this->Cookie;

		$this->assertFalse( $cookie::setPrefix( '' ) );
		$this->assertFalse( $cookie::setPrefix( 5 ) );
		$this->assertFalse( $cookie::setPrefix( true ) );
	}
}