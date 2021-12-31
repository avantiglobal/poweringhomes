Avanti Global CRM Framework V2.0
Author: Avanti Global LLC - Adrian Gerig - All rights reserved.

BASICS
This is a simple but powerful web application that allows to easily create
Websites with a frontend and a backend.

STRUCTURE

The framework follows the MVC pattern. So, the app files are distributed accordingly.
This is the main file structure:

./application
./docs
./public

THE './application' DIRECTORY

Controls the business logic of the application. It handles the routing, the controllers, 
the DB connections & queries, and also the common functionality used across the framework.

It contains the following subdirectories:
./application
    ./configs           [ Main app configuration and routing ]
    ./controllers       [ The controller class is the main app driver. It is used for all of the
                        *  communications between the controllers, the models and the views 
                        *  (template class). It creates an object for the model class and an object 
                        *  for template class. The object for model class has the same name as the 
                        *  model itself ]
    ./library           [ Here we find the common functions on which the application depends on. 
                        * This functionality can be extended as needed. ]
    ./models            [ The model class extends the SQLQuery Class. Each controller needs its own a model file,
                        *  and every single model file will extended the main model class.
                        *  Each controller will create its own model object. 
                        *  This object becomes immediately accessible, so we can easily access and 
                        *  manipulate the data retrieved from the DB  ]
    ./views             [ The template class is in charge of rendering the final output processed by the controller.
                        *  Each controller will have a 'view' subdirectory. If you need that your controller action
                        *  has an HTML output, all you need to do is create a file inside of this directory with the
                        *  same name of your action.   ]

THE './docs' DIRECTORY

Contains the docs files, and the initial DB schema, which must be removed after the DB setup to accidentally upload
it to the production server.

THE './public' DIRECTORY

It contains the main application file, which is the 'index.php' file, and all of the public files and assets 
of the application.

==> APPLICATION FLOW <==

The 'index.php' file will create an object for the 'Application' class and will execute the 'run()' method. This method
will parse the current url to determine the controller, model, and action names. 

The url is comprised of the following structure:

    https://mydomain.test/controller/action/queryParam1

Once the 'Application' object validates if it is a valid controller (if the controller file exists), it will dynamically create 
the new object for that controller, which will create the rest of the needed objects. 

For example, these are the objects created every time the 'Page' controller object is created:

Object-> Page: Which extends the main controller.class.php, and this in turn, creates the following objects: 
    Object-> Model
        Object-> SQLQuery
    Object-> Template

After that, the 'Application' object will dispatch the controller's actions in the following order:

- beforeAction
- actual action
- afterAction

When this happens, the controller takes care of:
    1.- Communicating with the model to send or retrieve data.
    2.- Setting the the template's variables.
    3.- Rendering the corresponding controller's action template.