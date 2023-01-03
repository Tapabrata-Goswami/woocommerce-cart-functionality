
# WOOCOMMERCE CART FUNCTIONALITY DEVELOPMENT

###  👉 PROJECT REQUIREMENTS ###
 When the Customer will go for add-to-cart page after choosing a product, they will find a pop-up.The pop-up shows another product which has a *Discount*. If a customar wants to add this product, they just need to click **add-to-cart** option.After adding this discounted product to their cart, if on any reason the customer visit to any page and then go to the cart page, then the pop-up *will not show*. But a customer can *ignore* the pop-up and visit any page and when they come again and go to cart page then that pop-up *will be displayed* again. **By this time the product shown in the pop-up, is no longer available anywhere in the store**. If the customer *removes* the chosen product from cart, then the product given in the pop-up can't be bought.

# 
### 👉 HOW TO SET UP THIS CODE IN LOCAL ENVIRONMENT ###






#
### 👉 FACING PROBLEM WHEN WE WRITE THE CODE BASE ###
Our project is mainly based on **PHP & JS**.When we think to start the Project, we didn't know anything about PHP. Then we learn about PHP and start the project.So when we started the project,we faced some of problems like *How to fetch data from cart?* and *How to fetch all the items from the cart?*.When we learned about the *woocommerce documentation*,we learned that there are **webhooks** which are used for data calling.Then by programming we call the data with the help of webhook by running *for-loop*.