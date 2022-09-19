var delete_user = document.querySelector("#delete_user");
var delete_user_location = document.querySelector("#delete_user_location");
delete_user.addEventListener("click", function(e){
    e.preventDefault();
    if(confirm("Are you sure you want to delete this user?"))
    {
        
    }
    else
    {
        return false;
    }
})

