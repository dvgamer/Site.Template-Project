function loginValue(input, defualt) {
	if (input.value == defualt) { 
		input.value = '';
	}
}
function confirmed(text, redirect) {
	confirmResult = window.confirm(text);
	if (confirmResult) {
		window.location = redirect;
	}
}




//-------------- Upload Fuction --------------
function startUpload(){
	  document.getElementById('upload-process').style.visibility = "visible";
      return true;
}

function stopUpload(info,img){
	  clearValue(info,img);	  
	  document.getElementById('upload-process').style.visibility = "hidden";
	  return true;   
}

function getValue(id) {
	var myfile = window.document.getElementsByName("myfile[]");
	var myname = window.document.getElementsByName("name[]");
	myname[id].value = myfile[id].value;
}

function clearValue(info,img) {
	var myfile = window.document.getElementsByName("myfile[]");
	var myname = window.document.getElementsByName("name[]");
	for (i=0;i<myfile.length;i++) {
		var id = "infoimg-"+i;
		window.document.getElementById(id).innerHTML = img[i];
		myname[i].value = info[i];
		myfile[i].value = '';
	}
}

function preload(url,idDiv,idLoading,text) {   
// Create the XML request  
	xmlReq = null;
	if(window.XMLHttpRequest) 		xmlReq = new XMLHttpRequest();
	else if(window.ActiveXObject) 	xmlReq = new ActiveXObject("Microsoft.XMLHTTP");
	if(xmlReq==null) return; // Failed to create the request

// Anonymous function to handle changed request states
	xmlReq.onreadystatechange = function()
	{
		if (idDiv==idLoading)
		{
			switch(xmlReq.readyState)
			{
			case 0:	// Uninitialized
				document.getElementById(idLoading).innerHTML = "<center><strong>Now is Loading</strong></center>";
				break;
			case 1: // Loading
				document.getElementById(idLoading).innerHTML = "<center><strong>Please Wait... <br><img src=\"../images/loader.gif\" border=\"0\" /></strong></center>";
				break;
			case 2: // Loaded
				document.getElementById(idLoading).innerHTML = "<center><strong>Please Wait... <br><img src="../images/loader.gif/" border=\"0\" /></strong></center>";
				break;
			case 3: // Interactive
				document.getElementById(idLoading).innerHTML = text;
				break;
			case 4:	// Done!
			// Retrieve the data between the <quote> tags
				document.getElementById(idDiv).innerHTML = xmlReq.responseText;
				break;
			default:
				break;
			}
		} else {
			switch(xmlReq.readyState)
			{
			case 0:	// Uninitialized
				document.getElementById(idLoading).innerHTML = "Now is Loading";
				break;
			case 1: // Loading
				document.getElementById(idLoading).innerHTML = "Please Wait... <img src="../images/mini_loader.gif/" border=\"0\" />";
				break;
			case 2: // Loaded
				document.getElementById(idLoading).innerHTML = "Please Wait... <img src="../images/mini_loader.gif/" border=\"0\" />";
				break;
			case 3: // Interactive
				document.getElementById(idLoading).innerHTML = text;
				break;
			case 4:	// Done!
			// Retrieve the data between the <quote> tags
				document.getElementById(idDiv).innerHTML = xmlReq.responseText;
				break;
			default:
				break;
			}
		}
	}

// Make the request
	xmlReq.open ('GET', url, true);
	xmlReq.send (null);
}

var preload;
var seconds = 20;

function stopCount()
{
	clearTimeout(preload);
	seconds = 20;
}

function display()
{
	 seconds-=1;
	 preload = setTimeout("display()",1000);
	 if (seconds<10) {		 
		 document.getElementById('downloader').style.visibility = "hidden";
		 document.getElementById('now').style.visibility = "visible";		
	 } else {
		 document.getElementById('cooldown').innerHTML = seconds - 10;		 
	 }
	 if (seconds<=0) { stopCount();self.close(); }
  }