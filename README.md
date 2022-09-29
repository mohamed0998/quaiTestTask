## :hugs: Requirements

        *  Laravel 9
        *  Composer
        *  Vuejs 3

## :clap: Installation:

```bash
    composer install

    npm install

    cp .env.example .env

    # Database Connection on .env

    php artisan migrate:fresh

    php artisan db:seed

    # Run Backend Server by Terminal
    php artisan serve

    # Run Frontend Server by Terminal
    npm run dev

```

SPECIFICATIONS
Brief:
The company DOUANE EXPRESS wishes to manage from an interface the management of its services
as well as its purchase orders.
The client's default services that are already entered into the application are as follows:
The particularity of the articles of this client is that certain articles are particular because they
are directly related to quantity. This is the case here for the notification of a title of
transit (DOU002 and DOU003) and document printing (DOU014, DOU015 and DOU016)
Let's imagine that we create a purchase order and that we put 3 transit title notifications
as well as a printout of a 26-page document. The detail of the purchase order drawn up at
customer will be done as follows:
DOU002 - x 1 - 25.00 €
DOU003 - x 2 - 30.00 €
DOU014 - x 1 - 10.00 €
DOU015 - x 1 - 5.00 €
DOU016 - x 6 - 2.50 €
reference name price
DOU001 Account opening / opening
account
30.00
DOU002 Notification of a transit document 25.00
DOU003 Notification from the second
transit
15.00
DOU005 Reload fee per shot
fork
50.00
DOU006 Storage: flat rate of 48 hours per
palette
15.00
DOU014 Printing documents 1 to 10
pages
10.00
DOU015 Printing documents 11 to 20
pages
5.00
DOU016 Document printing > 20 pages
/ page
0.50
Needs :
The client therefore needs an interface with a simple menu:
1. Services
On this page, the customer will find all the services already entered in the base and will be able to
add new ones. He may also modify existing services and delete them. The edition
or the addition of a service will be done via a modal to simplify the user experience.
2. Purchase Orders
On this page, the customer will find all the purchase orders created. He will be able to
also create new, modify and delete them.
A purchase order takes the form of a reference generated automatically on creation,
a status (open / closed), a date to select, services attached with a quantity and a
total price calculated in real time according to the services indicated and their quantity.
On the modal for adding / editing a purchase order, we will therefore have a date field with
a datepicker as well as a select field with integrated search that will allow you to select a
base service. Once the service is selected, this will add it to a listing above this
select. On the line of the service added, we will have the possibility of modifying its quantity and we
we will also have the possibility to remove it from the services added via a button.
On the modal, a button will allow us to open or close a purchase order. As soon as a
purchase order is closed, it can be consulted but can no longer be modified.
Example of interface expected for the management of services on the modal of the purchase order
Constraints and indications:
⁃ The algorithm for calculating purchase orders must imperatively be done on the back side
for later reuse by a third-party service.
⁃ The use of a pivot table for the management of services on purchase orders is
imperative.
⁃ The interface must use bootstrap.
⁃ It is not mandatory to perform authentication management to connect to
the interface.
