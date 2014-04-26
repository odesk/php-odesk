# Introduction
This project provides a set of oDesk API from http://developers.odesk.com
 based on OAuth 1.0a.

# Features
The following features are supported:

* My Info API
* MC API

# License
Licensed under the GNU Lesser General Public License as published by the Free 
Software Foundation, either version 3 of the License, or (at your option) any 
later version.

    https://www.gnu.org/licenses/lgpl.html

This roughly means that if you write some PHP application that uses this client 
you do not need to release your application under (L)GPL as well. Refer to the 
license for the exact details.

Usage of API is reglamented by another license

    http://developers.odesk.com/API-Terms-of-Use

# Application Integration
If you want to integrate this library you need to have

* PHP >= 5.3.0
* OAuth Extension installed
* Composer installed (optional)

## Example
In addition to this, a full example is available in the `example` directory. 
This includes `console.php` that gets an access token and requests the data
for non-webbased applications, and `web.php` for webbased applications.
Next to this a `composer.json` is included for use with Composer.

## Composer
In order to easily integrate with your application it is recommended to use
Composer to install the dependencies.
