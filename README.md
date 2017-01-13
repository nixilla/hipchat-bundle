# hipchat-bundle for Symfony

Very basic and simple Hipchat integration.

[![Build Status](https://travis-ci.org/nixilla/hipchat-bundle.svg?branch=master)](https://travis-ci.org/nixilla/hipchat-bundle)

## Installation

Install with composer:

```#!bash
composer require nixilla/hipchat-bundle
```

Add budle to AppKernel:

```
<?php
new Nixilla\HipchatBundle\NixillaHipchatBundle(),
```

Configure parameters.yml:

    hipchat.token: tbc
    hipchat.room: tbc
    hipchat.domain: tbc

## Usage

Inject hipchat service in to your service:

    your.service:
        class: \YourClass
        arguments: [ "@hipchat.notifier" ]

Use in your class:

```#!php
$this->hipchat->notify();
```
