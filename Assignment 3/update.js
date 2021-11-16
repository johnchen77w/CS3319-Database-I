window.onload=function(){
    prepareListener1();//calls listener 1 for province code element
}

function prepareListener1(){
    var ddms;
    ddms=document.getElementById("CountryName"); //finds var by id
    ddms.addEventListener("change", submit); //calls on submit on change
}

function submit(){
    this.form.submit();//submits the form
}