### Get all products
GET http://localhost/api/product/all 

### Get all products in a given category
GET http://localhost/api/product/cookware 

### Get product
GET http://localhost/api/product/cookware/3 

### Create product
POST http://localhost/api/product/10 
content-type: application/json
{
    "product_name" : "ProCook Non-Stick Bakeware Set 6 piece",
    "product_desc" : "Bakeware",
    "product_category" : "Baking",
    "product_price" : 44
}

### Update product
PUT http://localhost/api/product/1 
content-type: application/json
{
    "product_price": 75.99
}

### Delete product
DELETE http://localhost/api/product/7 
