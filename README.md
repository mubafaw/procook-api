# Simple Laravel CRUD RESTful API webservice to select, update and delete products for a given category
Create, Read, Update and Delete 

## To run locally play game
1) Simply download / clone repository<br>
2) Run Migration
    php artisan migrate
3) Seed database
    php artisan db:seed
4) Run app
    php artisan serve
5) Available endpoints

### Get all products
GET /api/product/all 

### Get all products in a given category
GET /api/product/cookware 

### Get product
GET /api/product/cookware/3 

### Create product
POST /api/product/10 
content-type: application/json
{
    "product_name" : "ProCook Non-Stick Bakeware Set 6 piece",
    "product_desc" : "Bakeware",
    "product_category" : "Baking",
    "product_price" : 44
}

### Update product
PUT /api/product/1 
content-type: application/json
{
    "product_price": 75.99
}

### Delete product
DELETE /api/product/7 

