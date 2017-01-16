# hipchat-bundle for Symfony

Very basic and simple Hipchat integration.

[![Build Status](https://travis-ci.org/nixilla/hipchat-bundle.svg?branch=master)](https://travis-ci.org/nixilla/hipchat-bundle)

## Installation

Install with composer:

```bash
composer require nixilla/hipchat-bundle
```

Add budle to AppKernel:

```php
<?php

// app/AppKernel.php

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = [
            // other bundles here,
            new Nixilla\HipchatBundle\NixillaHipchatBundle()
        ];
        
        return $bundles;
    }
}
```

Configure parameters.yml:

```yaml
hipchat.token: tbc
hipchat.room: tbc
hipchat.domain: tbc
```


## Usage

Inject hipchat service in to your service:

```yaml
your.service:
    class: \YourClass
    arguments: [ "@hipchat.notifier" ]
```

Use in your class:

```php
<?php

class YourClass
{
    private $hipchat; // inject it via constructor
    
    public function yourMethod()
    {
        $this->hipchat->notify($colour = 'red', $message = 'Hello', $format = 'text', $notify = false);        
    }
}
```