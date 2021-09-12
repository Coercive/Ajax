# Ajax response handler

## Get

```
composer require coercive/ajax
```

## Config

```php
use Coercive\Utility\Ajax\Response;

# Example of loading class Response
$response = new Response;

# Configuration options

// Deactivading the auto skip null parameters (and empty array)
// Useful for full params export
$response->skipNull(false);

// Require only certain fields
$response->requiredFields(['name']);
// The default required fields will not be reseted by reset() method.
$response->defaultRequiredFields(['id', 'status']);

// Preset HTTP response code for auto sending
$response->httpResponseCodes(203, 501);

// Useful if you always want to send OK 200 to your JS app
$response->httpResponseCodes(200, 200);

// Reset all parametters, but not the defaults options
$response->reset();

// It's possible to list fields to keep
$response->reset(['id', 'name', 'config']);
```

## Export

```php
use Coercive\Utility\Ajax\Response;
$response = new Response;

# Get full export params as array
$response->array();

# Get full export params as json string
$response->json();

# Auto export as json string
$response->__toString();

# Send as json string with clear buffer and http codes options
$response->send();

# Httpcodes setted here temporary overrides the setted codes with httpResponseCodes() method
$response->send(true, 200, 500);
```

## Defaults

```php
use Coercive\Utility\Ajax\Response;
$response = new Response;

# Default options
$response->setDefaultId('Hello123');

// This default option will not be reseted by reset() method.

# Associated custom parameter
$response->setId('World456');

// If id not setted, the default id will be used
```

## Defaults by status

```php
use Coercive\Utility\Ajax\Response;
$response = new Response;

# Some default parameters has status handler
$response
    ->setDefaultMessage('Default message for all status !');

# But you may wan't to have separate text in case of success or failure status
$response
    ->setDefaultSuccessMessage('Default message for success status only !')
    ->setDefaultFailureMessage('Default message for failure status only !');
```

## Predefined parameters

```php
use Coercive\Utility\Ajax\Response;
$response = new Response;

# Examples
$response
    ->setStatus(true)
    ->setLanguage('EN')
    ->setType('popup')
    ->setTitle('Alert')
    ->setMessage('This is an example message')
    ->setClose(true)
    ->setCloseLabel('ok')
    ->setDelay(3000);
    // etc...
```

## Data parameters

```php
use Coercive\Utility\Ajax\Response;
$response = new Response;

# Example config parameters
$response->setConfigs([
    'remote' => 9000,
    'transfer' => 600,
    'timesamp' => 1630676484,
]);
$config = $response->getConfigs();
$remote = $response->getConfig('remote');
$notExist = $response->getConfig('notExist', 'default_value');
// etc...

# Example data parameters
$response->setDatas([
    'additional_item_title' => 'Something',
    'items' => [
        0 => [
            'id' => '091826',
            'name' => 'first item',
            'price' => 5.50,
            'available' => true
        ],
        1 => [
            'id' => '732276',
            'name' => 'second item',
            'price' => 7.90,
            'available' => false
        ]
    ]
]);
$response->setData('forgoten', 'this one');
$response->removeData('additional_item_title');
// etc...

# Automatic array if several elements with the 'add...' method
$response->addData('array_element', 'content1');
$response->addData('array_element', 'content2');
$response->addData('array_element', 'content3');
// datas: {
//     array_element: [
//         "content1",
//         "content2",
//         "content3"
//     ]
// }

# Example text parameters
$response->setTexts([
    'article_title_1' => 'My First Article Title',
    'article_title_2' => 'My Second Article Title',
    'special_button' => 'Hello World'
]);

# Example options parameters
$response->setOptions([
    'otp1' => '1111',
    'otp2' => '2222',
    'otp3' => '3333',
]);
$response->removeOptions([
    'otp2' => '2222',
    'otp3' => '3333',
    'otp4' => '4444',
    'otp5' => '5555',
]);

# Example items parameters
$response->setItem('item1', [
    'id' => 1,
    'name' => 'name one',
    'price' => 6.50,
    'stock' => 99
]);
$response->clearItems();
```

## Custom parameters (generic accessors)

```php
use Coercive\Utility\Ajax\Response;
$response = new Response;

# Global setter
$response->set('entry_name', [
    'key' => 'value'
]);
$response->set('other_entry_name', 'value');

# Example merge
$response->merge('entry_name', [
    'additional_info' => 'value'
]);

# Example insert
$response->insert('entry_name', 'forgoten', 'value');

# Example add, automatic array if several elements with the 'add...' method
$response->add('array_element', 'example_key', 'content1');
$response->add('array_element', 'example_key', 'content2');
$response->add('array_element', 'example_key', 'content3');
// array_element: {
//     example_key: [
//         "content1",
//         "content2",
//         "content3"
//     ]
// }

# Example drop parameters
$response->set('options', [
    'otp1' => '1111',
    'otp2' => '2222',
    'otp3' => '3333',
]);
$response->drop('options', [
    'otp2' => '2222',
    'otp3' => '3333',
    'otp4' => '4444',
    'otp5' => '5555',
]);
$response->remove('options', 'otp1');

# Example getter
$value = $response->get('key');
$value = $response->target('array_element', 'example_key');
$notExist = $response->get('notExist', 'default_value');
$notExist = $response->target('array_element', 'notExist', 'default_value');
```

## Debug

```php
use Coercive\Utility\Ajax\Response;

$response = new Response;

# As datas, configs, options, texts
# The 'logs' parameter can be use for a JS console.log() for example
$response->setLogs([
    'test' => '{}"#&)°',
]);

# And there is some JSON compilation error getters
if($response->getJsonLastErrorStatus()) {
    echo $response->getJsonLastErrorCode();
    echo $response->getJsonLastErrorMessage();
}
```