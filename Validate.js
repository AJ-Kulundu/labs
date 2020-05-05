//we create a function to validate our form
// we will call the function when the form is submitted

function validateForm(){
    const fname = documents.user_details.first_name.value;
    const lname = documents.user_details.last_name.value;
    const city = documents.user_details.city_name.value;

if(fname = null || lname == "" || city ==""){
    alert("All user details are required");
    return false;
}
    
}