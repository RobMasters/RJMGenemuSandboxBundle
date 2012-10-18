# RJMGenemuSandboxBundle

This bundle provides a sandbox to showcase how to use various Form Types provided by the [GenemuFormBundle](https://github.com/genemu/GenemuFormBundle)

## Installation

### Step 1: Install the bundle

Add the following dependency to your composer.json file:
``` json
{
    "require": {
        "_some_packages": "...",

        "robmasters/genemu-sandbox-bundle": "2.1.*"
    }
}
```

### Step 2: Import routing

Include the bundle's routing in `app/config/routing.yml`:
```yml
rjm_genemu_sandbox:
    resource: "@RJMGenemuSandboxBundle/Resources/config/routing.yml"
    prefix:   /
```

### Step 3: Enable the bundle

```php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new RJM\Bundle\GenemuSandboxBundle\RJMGenemuSandboxBundle(),
    );
}
```

### Step 4: Initialize assets

``` bash
$ php app/console assets:install web
```