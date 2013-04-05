OpenTBSBundle for Symfony
=========================

This bundle is just a convenient way to use OpenTBS, all the credits go to Skrol29 and the TinyButStrong team. http://www.tinybutstrong.com/

OpenTBS - create OpenOffice and Ms Office documents with PHP (and Symfony)


## Introduction

(Taken from http://www.tinybutstrong.com/plugins/opentbs/tbs_plugin_opentbs.html)

OpenTBS is a PHP tool to produce any OpenOffice and Ms Office documents with templates.

OpenTBS can merge any OpenDocument and Open XML files. It autommatically reconize extensions: odt, ods, odg, odf, odm, odp, ott, ots, otg, otp, docx, xlsx, pptx.
In fact it can merge any XML or Text file saved in a zip container (which is the case for both OpenDocuments and OpenXML documents).

What is special to OpenTBS:
* Design your templates directly with OpenOffice or MS Office.
* No exe file needed to merge documents.
* No temporary files needed to merge documents.
* Output directly as an http download, a new file on the disk, or as a string (for file attachment for example).
* Works with both PHP 4 and PHP 5.

## Versions included
TinyButStrong - 3.8.1
OpenTBS - 1.7.6

## Requirements

* Symfony2
* PHP needs to be a minimum version of PHP 5.3.2 (for Symfony2)
* It is better to have the [Zlib](http://www.php.net/manual/en/book.zlib.php) extension enabled on your PHP installation. If it's not, [here is what to do](http://www.tinybutstrong.com/plugins/opentbs/tbs_plugin_opentbs.html#zlib).

## Installation

### Step 1: Download the bundle using composer

Add the following in your composer.json:

```json
{
    "require": {
        "mbence/opentbs-bundle": "dev-master"
    }
}
```

Then download / update by running the command:

``` bash
$ php composer.phar update mbence/opentbs-bundle
```

Composer will install the bundle to your project's `vendor/mbence/opentbs-bundle` directory.

### Step 2: Enable the bundle in your AppKernel

```php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new MBence\OpenTBSBundle\OpenTBSBundle(),
    );
}
```

#### Now you can get the 'opentbs' service with $this->container->get('opentbs') which will give you a standard clsTinyButStrong class with OpenTBS plugin enabled.


## Using OpenTBSBundle

First you need to define the variables in your docx template (you can use any other supported document format).
```
... some text in a word file with a `[client.name]` variable ...

```
In TBS you always need a variable base (`client`) and a variable name (`name`).

Then in your controller you need to get the OpenTBS service, load your template and merge the fields (eg. replace the teplate variables).
```php
    // get the service
    $TBS = $this->container->get('opentbs');
    // load your template
    $TBS->LoadTemplate('template.docx');
    // replace variables
    $TBS->MergeField('client', array('name' => 'Ford Prefect'));
    // send the file
    $TBS->Show(OPENTBS_DOWNLOAD, 'file_name.docx');
```
A note for onshow automatic variables:
You could define your variables within the `onshow` base, (like `onshow.name`), but I strongly discourage this practice for it will only work if you use GLOBAL variables.


### For more information ...
read the TBS manual at http://www.tinybutstrong.com/manual.php and the OpenTBS plugin documentation at http://www.tinybutstrong.com/plugins/opentbs/tbs_plugin_opentbs.html
