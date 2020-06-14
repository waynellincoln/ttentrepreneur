 
$(document).ready(function(){
                  
    ClassicEditor
    .create( document.querySelector( '#body' ) )
    .catch( error => {
        console.error( error );
    } );                 
      
});


 $(document).ready(function(){   
     
    $('#selectAllBoxes').click(function(event){
        
        if(this.checked) {
            
            $('.checkBoxes').each(function(){
                
                this.checked = true;
                
            })
            
        }else {
            
            $('.checkBoxes').each(function(){
                
                this.checked = false;
                
            })
            
        }
        
    })        
        
    
});

function loadUsersOnline() {
    
    //send get request to functions.php and run function after a response is obtained
    $.get("functions.php?onlineusers=result", function(data) {
      
        $(".usersonline").text(data);
  
    });
          
setInterval(function(){
          
     loadUsersOnline();
          
},500); //to check the databse ever soo often



