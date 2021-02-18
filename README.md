# Simple Laravel CRUD RESTful API webservice to select, update and delete products for a given category
Create, Read, Update and Delete 

## To run 
1) Simply download / clone repository<br>
2) Run Migration<br>
    php artisan migrate
3) Seed database<br>
    php artisan db:seed
4) Run app<br>
    php artisan serve

5) Navigate your localhost (equivalent)  to see the API in use in the following locale <br>
    en-gb -> http://localhost/en-gb/data <br>
    fr-ch -> http://localhost/fr-ch/data <br>    

6) Available endpoints <br>
### Get all products
GET /api/product/all 

### Get all products in a given category
GET /api/product/cookware 

### Get product
GET /api/product/cookware/3 

### Create product
POST /api/product/10 <br>
content-type: application/json <br>
{
    "product_name" : "ProCook Non-Stick Bakeware Set 6 piece",
    "product_desc" : "Bakeware",
    "product_category" : "Baking",
    "product_price" : 44
}

### Update product
PUT /api/product/1 <br>
content-type: application/json <br>
{
    "product_price": 75.99
}

### Delete product
DELETE /api/product/7 

