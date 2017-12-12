function Cart(){
	this.cart = [];

}

Cart.prototype.setValues = function(name, price, count){
	this.name = name;
	this.price = price;
	this.count = count;
};


Cart.prototype.addItemToCart = function(){
	//Checks for different items with the same name
	for(var i in this.cart){
		if (this.cart[i].name === this.name){
			this.cart[i].count+= this.count; //increase the count of that item if the names match
			return; //Uses return to end the function
		}
	}

	var item = new this.setValues(this.name, this.price, this.count);
	this.cart.push(item);
    this.saveCart();
		 	
 };


//Completely empties the cart
Cart.prototype.clearCart = function(){
    this.cart = []; //setting the cart to an empty array clears the cart
    this.saveCart();
};

//totalItems() --> return the total number of items in the cart
//Counts all of the items in the cart
Cart.prototype.totalItems = function(){
    var totQuantity = 0;
            
    for(var i in this.cart){
	    totQuantity += this.cart[i].count;
    }
return totQuantity;
};

// totalPrice() --> return the total cost of the carts
Cart.prototype.totalCost = function(){
    var totalCost = 0.00;
    for(var i in this.cart){
         totalCost += this.cart[i].price * this.cart[i].count;
    }
    return totalCost.toFixed(2);
};

 // showCart() --> returns an array of all items
Cart.prototype.showCart = function () { // -> array of Items
	//Retrieve the information from local storage
    var str=localStorage.getItem("shoppingCart");
    //Parse the information back into an array
    var inventory=JSON.parse(str);
    //Display the array
	
    for(var pollNum = 0; pollNum < inventory.length; pollNum++){
		if(pollNum !== 0)
			document.write("<hr>");
		
        document.write("Item #"+(pollNum + 1)+":</br>");
        var obj=inventory[pollNum];
        for(var property in obj){
            document.write(property+": "+obj[property]+"</br>");

        }
    }
	document.write("</br>" + "<b>Total Items in Cart:</b> "+this.totalItems());
	document.write("</br>" + "<b>Total Cost:</b> $"+this.totalCost());

	
};

// saveCart() --> saves cart to local storage with cookies for people to return and view their cart later
Cart.prototype.saveCart = function() {
    //var str = JSON.stringify(this.cart);
    localStorage.setItem("shoppingCart", JSON.stringify(this.cart));
    //alert(localStorage.getItem('shoppingCart'));
};

// loadCart() --> pulls up a page to review the cart from local storage
Cart.prototype.loadCart = function() {
	this.cart = JSON.parse(localStorage.getItem("shoppingCart"));
        if (this.cart === null) {
            this.cart = []
        }
};

 //Adds item to cart & set values
 Cart.prototype.add = function(name, price, count){
 	this.setValues(name, price, count);
 	this.addItemToCart();
	this.saveCart();
 	this.loadCart();


 };
 
 //Quick view cart with an alert window
 Cart.prototype.quickView = function(){
	alert("*Cart Info* Quantity: " +  this.totalItems() + "    -----------    Total Price: $" + this.totalCost());
 };
