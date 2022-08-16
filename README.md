![pepipostlogo](https://pepipost.com/wp-content/uploads/2017/07/P_LOGO.png)

[![Packagist](https://img.shields.io/packagist/dt/pepipost/pepipost-laravel-driver.svg?style=flat-square)](https://packagist.org/packages/pepipost/pepipost-laravel-driver)
[![Packagist](https://img.shields.io/github/contributors/pepipost/pepipost-laravel-driver.svg)](https://github.com/pepipost/pepipost-laravel-driver)
[![Open Source Helpers](https://www.codetriage.com/pepipost/pepipost-laravel-driver/badges/users.svg)](https://www.codetriage.com/pepipost/pepipost-laravel-driver)
[![Twitter Follow](https://img.shields.io/twitter/follow/pepi_post.svg?style=social&label=Follow)](https://twitter.com/pepi_post)

# Laravel SDK interface for  [Pepipost](http://www.pepipost.com/?utm_campaign=GitHubSDK&utm_medium=GithubSDK&utm_source=GithubSDK)

This package maps the Pepipost SDK to the laravel application

To use this package required your [Pepipost Api Key](https://app.pepipost.com). Please make it [Here](https://app.pepipost.com).

We are trying to make our libraries Community Driven- which means we need your help in building the right things in proper order we would request you to help us by sharing comments, creating new [issues](https://github.com/pepipost/laravel-pepipost-driver/issues) or [pull requests](https://github.com/pepipost/laravel-pepipost-driver/pulls).

We welcome any sort of contribution to this library.

The latest 1.0.0 version of this library provides is fully compatible with the latest Pepipost v5.1 API.

For any update of this library check [Releases](https://github.com/pepipost/laravel-pepipost-driver/releases).

# Table of Content
  
* [Installation](#installation)
* [Usage of library in Project](#inproject)
* [Announcements](#announcements)
* [Roadmap](#roadmap)
* [About](#about)
* [License](#license)

<a name="installation"></a>
# Installation

<a name="prereq"></a>

### Prerequisites

[PHP >= 7.x](https://www.php.net/manual/en/install.php)

[Composer v2.3.10](https://getcomposer.org/download/)

[Laravel >= 8.x](https://laravel.com/docs/9.x/installation)

A free account on Pepipost. If you don't have a one, [click here](https://email.netcorecloud.com/) to signup.

<a name="inproject"></a>

## Usage

### Configuring laravel project

#### Step 1 - Create New Laravel project 

```bash 
$ composer create-project laravel/laravel example-app
```

#### Step 2 - install with composer

```bash
$ composer require pepipost/pepipost-lib
```

#### Step 3 - Configurations 

1) Add API key to the .env file
    ```
    PEPIPOST_API_KEY='<API_TOKEN_KEY>'
    ```

2) Export the config file to the laravel app
    ```bash
    $ php artisan vendor:publish --provider="Pepipost\PepipostLib\PepipostServiceProvider" --tag="config"
     ```

#### Step 4-  Laravel Steps to create controller and route

1) Create Controller
    ```bash
    php artisan make:controller sendMail
    ```
2) Update controller with email structure
    ```php
        <?php
        namespace App\Http\Controllers;
        use Illuminate\Http\Request;
        use Pepipost\PepipostLib\Models;
        use Pepipost\PepipostLib\PepipostLib as Mailer;
        
        class Mailsend extends Controller
        {
            public static function send(Request $request){
        
                $body = new Models\Send;
                $body->from = new Models\From;
        
                $body->from->email = 'John@domain.com';
                $body->from->name = 'John';
                $body->subject = 'Pepipost Test Mail from laravel';
        
                $body->content = array();
                $body->content[0] = new Models\Content;
                $body->content[0]->type = Models\TypeEnum::HTML;
                $body->content[0]->value = '<html><body>Hello, Welcome to Pepipost Family àèìòù.<br>My name is [% name %].<br>my love is sending [% love %]</body> <br></html>';

                $body->attachments[0] = new Models\Attachments;
                $body->attachments[0]->attach(storage_path('Discussions.pdf'));
                #optional
                $body->attachments[0]->name = 'discussionwithteam.pdf';
        
                $body->personalizations = array();
                $body->personalizations[0] = new Models\Personalizations;
                $body->personalizations[0]->attributes = ["name" => "Pepi", "love" => "email"];
                $body->personalizations[0]->tokenTo = '<identity-string>';
        
                $body->personalizations[0]->to = array();
                $body->personalizations[0]->to[0] = new Models\EmailStruct;
                $body->personalizations[0]->to[0]->name = 'Doe';
                $body->personalizations[0]->to[0]->email = 'doe@domain.com';
        
                $body->personalizations[0]->cc = array();
                $body->personalizations[0]->cc[0] = new Models\EmailStruct;
                $body->personalizations[0]->cc[0]->name = 'elina';
                $body->personalizations[0]->cc[0]->email = 'elina@domain.com';
        
                $mailer = new Mailer();
                try {
                  var_dump($mailer->sendMail($body));
                } catch (Pepipost\PepipostLib\APIException $e) {
                  return $e->getMessage;
                }
            }
        }
    ```
3) Create Route in routes/web.php

      ```php
      Route::get('/sendmail', function () {
        return App::call('App\Http\Controllers\Mailsend@send');
      });
      ```

#### Step 5 - Testing

Host your laravel project and enter url- http://your_url.com/sendmail in browser

This will send email and display Email sent successfully on browser.

#### Additional Usage

For more advanced usage you can check the [advance usage doc](https://github.com/pepipost/pepipost-sdk-php/blob/master/advance-usage.php) for getting help with more complicated scenarios.

<a name="announcements"></a>
# Announcements

v1.0.0 has been released! Please see the [release notes](https://github.com/pepipost/laravel-pepipost-driver/releases/) for details.

All updates to this library are documented in our [releases](https://github.com/pepipost/laravel-pepipost-driver/releases). For any queries, feel free to reach out us at dx@pepipost.com

<a name="roadmap"></a>
## Roadmap

If you are interested in the future direction of this project, please take a look at our open [issues](https://github.com/pepipost/pepipost-lib/issues) and [pull requests](https://github.com/pepipost/pepipost-lib/pulls). We would love to hear your feedback.

<a name="about"></a>
## About
pepipost-laravel library is guided and supported by the [Pepipost Developer Experience Team](https://github.com/orgs/pepipost/teams/pepis/members) .
This pepipost library is maintained and funded by Pepipost Ltd. The names and logos for pepipost gem are trademarks of Pepipost Ltd.

<a name="license"></a>
## License
[MIT](https://choosealicense.com/licenses/mit/)
