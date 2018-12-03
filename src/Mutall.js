/**
 * Create an ajax class that will handle requests to the server and back 
 * We will use the fetch api and es7 async/await as opposed to promises for 
 * neater code
 * Provide a url to the constructor. an example is index.php?q=
 * @type type
 */
class Ajax{
    constructor(url){
        this.url = url;
    }
    
    async get(){
        const response = await fetch(this.url, {
                method:'GET'
            })
        return await response.json();
    }
    
    async post(data){
        const response = await fetch(this.url, {
                method:'POST',
                headers:{
                    'Content-Type':'application/json'
                }, 
                body: JSON.stringify(data)
            })
            
        return await response.json();
    }
    
}
/*
 * Create the main mutall object where othe classes extend from it 
 * What will the mutall object have?? properties?? methods??
 * 
 */

class Mutall{
    constructor(){
        
    }
}
/**
 * Create a field class that extends the mutall class 
 * The field will have two methods in general
 * one for edit and another for saving.
 * This is because this methods involves interacting with the dom
 */
class Field extends Mutall{
    constructor(id){
        super ()
        this.id = id;
    }
    //get the id of the element to be edited 
    edit(){
        
    }
    //save the element
    save(){
        
    }
}