# WPCookie
PHP library for handling cookies especially created for WPEngine hosted sites

---

- [Requirements](#requirements)
- [Installation](#installation)
- [Available Methods](#available-methods)
- [Quick Start](#quick-start)
- [Usage](#usage)
- [Tests](#tests)
- [License](#license)
- [Copyright](#copyright)

---

## Requirements

This library is supported by **PHP versions 5.6** or higher.

## Installation

The preferred way to install this extension is through [Composer](http://getcomposer.org/download/).

To install **WPCookie library**, simply:

    $ composer require WPDiggerStudio/WPCookie


You can also **clone the complete repository** with Git:

	$ git clone https://github.com/WPDiggerStudio/WPCookie.git

## Available Methods

Available methods in this library:

### - Set cookie:

```php
Cookie::set($key, $value, $time);
```

| Attribute | Description | Type | Required | Default
| --- | --- | --- | --- | --- |
| $key | Cookie name. | string | Yes | |
| $value | The data to save. | string | Yes | |
| $time | Expiration time in days. | string | No | 100 |

**# Return** (boolean)

### - Get item from cookie:

```php
Cookie::get($key);
```

| Attribute | Description | Type | Required | Default
| --- | --- | --- | --- | --- |
| $key | Cookie name. | string | No | '' |

**# Return** (mixed|false) → returns cookie value or false

### - Extract item from cookie and delete cookie:

```php
Cookie::destroy($key);
```

| Attribute | Description | Type | Required | Default
| --- | --- | --- | --- | --- |
| $key | Cookie name to destroy. Not set to delete all. | string | No | '' |

**# Return** (boolean)

### - Set cookie prefix:

```php
Cookie::setPrefix($prefix);
```

| Attribute | Description | Type | Required | Default
| --- | --- | --- | --- | --- |
| $prefix | Cookie prefix. | string | Yes | |

**# Return** (boolean)

### - Get cookie prefix:

```php
Cookie::getPrefix();
```

**# Return** (string) → cookie prefix

----------------
## - Set cookie domain:

```php
Cookie::setDomain($domain);
```

| Attribute | Description | Type | Required | Default
| --- | --- | --- | --- | --- |
| $domain | Cookie domain. | string | Yes | |

**# Return** (boolean)

### - Get cookie domain:

```php
Cookie::getDomain();
```

**# Return** (string) → cookie domain

## - Set cookie secure:

```php
Cookie::setSecure($secure);
```

| Attribute | Description | Type | Required | Default
| --- | --- | --- | --- | --- |
| $secure | Cookie secure. | string | Yes | |

**# Return** (boolean)

### - Get cookie secure:

```php
Cookie::getSecure();
```

**# Return** (string) → cookie secure

## - Set cookie httpOnly:

```php
Cookie::setHttpOnly($httpOnly);
```

| Attribute | Description | Type | Required | Default
| --- | --- | --- | --- | --- |
| $httpOnly | Cookie httpOnly. | string | Yes | |

**# Return** (boolean)

### - Get cookie httpOnly:

```php
Cookie::getHttpOnly();
```

**# Return** (string) → cookie httpOnly

## Quick Start

To use this class with **Composer**:

```php
require __DIR__ . '/vendor/autoload.php';

use WPDiggerStudio\WPCookie\WPCookie;
```

Or If you installed it **manually**, use it:

```php
require_once __DIR__ . '/WPCookie.php';

use WPDiggerStudio\WPCookie\WPCookie;
```

## Usage

Example of use for this library:

### - Set cookie:

```php
Cookie::set('cookie_name', 'value', 100);
```

### - Get cookie:

```php
Cookie::get('cookie_name');
```

### - Get all cookies:

```php
Cookie::get('all');
```

### - Destroy one cookie:

```php
Cookie::destroy('cookie_name');
```

### - Set cookie prefix:

```php
Cookie::setPrefix('prefix_');
```

### - Get cookie prefix:

```php
Cookie::getPrefix();
```

## License

This project is licensed under **MIT license**. See the [LICENSE](LICENSE) file for more info.

## Copyright

WPDiggerStudio, [wpdigger.com](https://wpdigger.com/)

If you find it useful, let me know :wink:

You can contact me through my [email](mailto:admin@wpdigger.com).
