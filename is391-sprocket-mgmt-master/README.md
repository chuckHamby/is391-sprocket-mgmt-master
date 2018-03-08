# is391-sprocket-mgmt
Simple PHP MVC Example

## Design
---
This MVC sample project is designed to leverage URL paths to deciding which controller class to invoke. For example:
```http request
   http://localhost/list?id=123
```
will result in invoking a controller class name:
```php
   ListController in a file call ListController.php
```
If the controller class is multi-word(s) and camel case then the url path should use a dash(-) to separate each word.  Examples:
```php
   ListSprockets in a file call ListSprockets.php
   LocateCustomerDetail in a file call LocateCustomerDetail.php
```
then the url should follow this pattern respectively:
```http request
   http://localhost/list-sprockets?id=123
   http://localhost/locate-customer-detail?id=123
```
Below is a high-level flow of this application:

```
Request-->index.php-->RouterController.php-->[Specific Controller]-->View
```
All requests will hit the index.php. The index.php instantiates the RouterControll class and calls its process function.  The RouterController will interrogate the URL Path and instantiate the correct Controller class to process the request.  After processing is complete, the controller will forward data to the view to be rendered.

## Important Files
---
**.htaccess**
* Disables indexing directory contents so that files will not be listed if a user types in a directory path in his browser.
* Pretty URLs.
* Let PHP handle the URL processing, so "disable" it in Apache and redirect all requests to index.php (where URLs are handled manually).
* Process the .phtml extension in a way that makes it impossible for anyone to view our templates' source code. .phtml files behave just like .php files.
---
**index.php**

All of the communication will take place here, as well as all of the URL address redirections. Register a function *(autoloadFunction)* that is called every time an unloaded class is used. 
Load the class in using function so that classes are loaded automatically when needed. Two types of classes are loaded: **models** (from the models folder) and **controllers** (from the controllers folder). 
Views will not be classes but rather more like HTML pages. The auto-load function will  determine whether the class being loaded is a model or a controller and look through the appropriate folder based on that.

When controllers are added, they are able to be used regularly (without any includes/requires):

````PHP
    $router = new RouterController();
````    

Since PHP hasn't loaded the RouterController.php class from the controllers folder, it will call the autoload function. The autoload function will in turn (internally) execute the following command:

````PHP
    require('controllers/RouterController.php');
````    

---
**config/app-config.ini**

Supported application specific configurations. Refer to documentation within the file for each property.

---
**config/creds.ini**

Sample database properties configuration. If the *_credential.file.location_* property in the app-config.ini is not set then the application will use this file. **It is strongly recommended that you place live system's database configuration elsewhere and set the *_credential.file.location_* it.**

---
## Project Structure
```
 |--.htaccess
 |--index.php
    |--config
    |--controllers
    |--css
    |--log
    |--misc
    |--models
```
**config** folder - Location of application specific properties. 

**controllers** folder - All application Controllers must be placed in this folder.

**misc** folder - Miscellaneous files. Do not deploy this folder or its contents.

**models** folder - Location of all model classes must be placed in this folder.


## Important Classes
---

**AbstractController**- Provides some common functions.  All controllers should extend this class and implement the **process()** function.

**RouterController**- The front controller responsible for routing each request to the correct Controller that will process the request. Internally it will instantiate a controller based on the context path in the URL.

---
## Tech Stacks
This implementation can be deployed on the following technology stacks:
* Apache Web Server 2.2.31 or higher
* PHP 7.1.1 or higher
* MySQL 5.6 or higher


---
## Deployment

Copy the files/folders to the web server document root (www or htdoc) folder.
 * config folder and all sub-folders/files
 * controllers folder and all sub-folders/files
 * models folder and all sub-folders/files
 * index.php
 * .htaccess
 
Update the config/creds.ini to match the Database being used if you do not intend to place credential files elsewhere. 

Update the config/app-config.ini to match your system's needs.
 
Start the web server. Type in the url *http://YOUR_SITE_NAME* in a web browser, where YOUR_SITE_NAME is your web address. On a local machine it would be: _http://localhost_ (assuming your server is listening on port 80).

