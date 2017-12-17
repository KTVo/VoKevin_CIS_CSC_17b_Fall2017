function Survey(answers){
    this.answers = answers;
}

Survey.prototype.construct = function(){
	var inventory = [];
    var str = JSON.stringify(inventory);
    localStorage.setItem("Inv",str);
};

Survey.prototype.localStore = function(Inventory){
    //Get the information from the local URL
    var url=document.location.href;
    //Call the getForm function to place into an object
    var $_GET=getForm(url);
    //Retrieve from Inventory
    var str=localStorage.getItem(Inventory);
    //Parse the inventory to an object 
    var inventory=JSON.parse(str);
    //How many products are in inventory
    var number=inventory.length;
    //Add our new product to inventory
    inventory[number]=$_GET;
	
    //Put back the object into local storage after adding
    var str=JSON.stringify(inventory);
    localStorage.setItem(Inventory,str);
};

Survey.prototype.display = function(){
    //Retrieve the information from local storage
    var str=localStorage.getItem("Inv");
    //Parse the information back into an array
    var inventory=JSON.parse(str);
    //Display the array
    for(var pollNum = 0; pollNum < inventory.length; pollNum++){
        document.write("Result ------------------------>"+(pollNum + 1)+":</br>");
        var obj=inventory[pollNum];
        for(var property in obj){
            document.write(property+"="+obj[property]+"</br>");
        }
    }
};