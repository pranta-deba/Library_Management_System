function emtry(){
    let booksBox = document.forms["bookForm"]["books"].value;
    if(booksBox == ""){
        alert("Empty Search Box.");
        return false;
    }
};