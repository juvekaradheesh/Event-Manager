//fills a html div dynamically with a php page
function loadDoc(url,field) 
{   
    if (window.XMLHttpRequest)
    {

        // code for modern browsers
        xhttp = new XMLHttpRequest();
    }
    else
    {
        // code for IE6, IE5
        xhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xhttp.onreadystatechange = function()
    {
        if (this.readyState == 4 && this.status == 200)
        {
			
            document.getElementById(field).innerHTML = this.responseText; 
        }
    };
    xhttp.open("GET", url, true);
    xhttp.send();
}