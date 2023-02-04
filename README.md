## Installation

You can install the package via composer:

```bash
composer require epmnzava/crdb
```

## Usage

```php

<?php
namespace App\Http\Controllers;

use Epmnzava\Crdb\Crdb;

class PaymentController extends Controller
{
public function payVisa(){
$crdb = new Crdb;
$crdb->makepayment($card, $order_referenceId, $amount, $currency);

#example..
$redirect = $crdb->makepayment("Visa", 4434345, "4000", "TZS");
$redirect = $crdb->makepayment("MasterCard", 4434345, "4000", "TZS");

return redirect($redirect);

}

}



```

### Mastercard View

<img src="https://github.com/dbrax/crdb/blob/main/mastercard.png">

### Visa View

<img src="https://github.com/dbrax/crdb/blob/main/visa.png">

### Testing

```bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email epmnzava@gmail.com instead of using the issue tracker.

## Credits

- [Emmanuel Mnzava](https://github.com/dbrax)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
