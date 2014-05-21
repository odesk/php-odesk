# Introduction
This project provides a set of oDesk API from http://developers.odesk.com
 based on OAuth 1.0a.

# Features
The following features are supported:

* My Info API
* Custom Payments API
* Hiring API
* Job and Freelancer Profile API
* Search Jobs and Freelancesr API
* Organization API
* MC API
* Time and Financial Reporting
* Metadata API
* Snapshot API
* Team API
* Workdiary API
* oTasks API

# Licence

Copyright 2014 oDesk Corporation. All Rights Reserved.

php-odesk is licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.

## SLA
Usage of API is reglamented by Terms of Use

    http://developers.odesk.com/API-Terms-of-Use

# Application Integration
If you want to integrate this library you need to have

* PHP >= 5.3.0
* OAuth Extension installed (optional, we recommend using official pecl
  extension, but in case you want to use own library, you need to drop
  line 'ext-oauth' from composer json, or do not use composer, which is
  also optional. In that case you need to setup 'authType' parameter
  in your configuration options. The source contains a oauth-php library
  that can be used as alternative. See more in AuthTypes directory if 
  you want to create an authentication layer for your own client library)
* Composer installed (optional)

## Example
In addition to this, a full example is available in the `example` directory. 
This includes `console.php` that gets an access token and requests the data
for non-webbased applications, and `web.php` for webbased applications.
Next to this a `composer.json` is included for use with Composer.

## Composer
In order to easily integrate with your application it is recommended to use
[Composer](https://getcomposer.org) to install the dependencies.

Below is a simple example `composer.json` file you could use:

    {
        "name": "odesk/my-oauth-app",
        "require": {
            "odesk/php-odesk": "dev-master"
        }
    }
