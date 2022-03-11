function resetLibrary()
{
	console.log("In Reset");
		
	document.getElementById('inputBox').value = '';
	document.getElementById('gameInfoDiv').style.display = 'none';
	document.getElementById('mainBadgeID').value = '';	
	document.getElementById('mainBadgeID').disabled = true;
	document.getElementById('inputBox').disabled = false;
	document.getElementById('inputBox').focus()	
	

}

 function playSuccessBeep() {
	//new Audio('button-09.wav').play();
		  
}

function playFailBeep() {
	new Audio('button-10.wav').play();
		  
}
	
function playSamFrey() {
	new Audio('samFrey.m4a').play();
		  
}
	
	
function loadscript()
{	
	const node = document.getElementById('inputBox');
	node.addEventListener("keyup", function(event) {
    if (event.key === "Enter") {
       lookupClick();
    }
});	
	const mainIDBadge = document.getElementById('mainBadgeID');

	mainIDBadge.addEventListener("keyup", function(event) {
				if (event.key === "Enter") {
				   lookupClick();
				}
				});	
}

function loadStampsScript()
{	
	const node = document.getElementById('badgeID');
	node.addEventListener("keyup", function(event) {
    if (event.key === "Enter") {
       stampClick();
    }
});	
	

}

function loadPTWscript()
{	
	const node = document.getElementById('gameID');
	node.addEventListener("keyup", function(event) {
    if (event.key === "Enter") {
       ptwClick();
    }
});	
	
}

function nextBadge(badgeID, eventCode)
{
	 
	if (eventCode == 13)
	{
		if (badgeID != "badgeID12")
		{
			switch (badgeID)
			{
			case "badgeID1":
				nextBadgeID = "badgeID2";			
			break;
			case "badgeID2":
				nextBadgeID = "badgeID3";			
			break;
			case "badgeID3":
				nextBadgeID = "badgeID4";			
			break;
			case "badgeID4":
				nextBadgeID = "badgeID5";			
			break;
			case "badgeID5":
				nextBadgeID = "badgeID6";			
			break;
			case "badgeID6":
				nextBadgeID = "badgeID7";			
			break;
			case "badgeID7":
				nextBadgeID = "badgeID8";			
			break;
			case "badgeID8":
				nextBadgeID = "badgeID9";			
			break;
			case "badgeID9":
				nextBadgeID = "badgeID10";			
			break;
			case "badgeID10":
				nextBadgeID = "badgeID11";			
			break;
			case "badgeID11":
				nextBadgeID = "badgeID12";			
			break;
			case "badgeID12":
				nextBadgeID = "badgeID12";			
			break;
			
			}
			
			
			document.getElementById(nextBadgeID).focus();
		}
		
		
	}
	else
		return;
	
	
}


function stampClick(){
	
	document.getElementById('badgeError').style.display = 'none';
	
	badgeField = document.getElementById('badgeID');
	badgeID = badgeField.value.trim();
	
	if (badgeID == '')
	{
		document.getElementById('badgeError').innerHTML = "Badge ID is a required field.";
		document.getElementById('badgeError').style.display = 'block';
		playFailBeep();
		
		return;
	}
	
	var request = new XMLHttpRequest();
	var url = "http://pipartgames.com/tgdlibrary/stampsAction.php";
	var params = "badgeID=" + badgeID;
	
	console.log (params);
	request.open('POST', url, true);
	request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	
	request.onreadystatechange = function() {
        if (request.readyState === XMLHttpRequest.DONE) {
          if (request.status === 200) 
		  {
            var response = JSON.parse(request.response);
           				
			switch (response.result)
			{
				
			case "added":
			playSuccessBeep();
			console.log("Case: added");
			
			if (response.attendee == 'Sam Frey')
				playSamFrey();
			
			document.getElementById('badgeError').innerHTML = response.attendee +" was stamped.";
			document.getElementById('badgeError').style.display = 'block';
			badgeField.value = '';
			badgeField.focus();
							
			break;	
			
			case "error":
			playFailBeep();
			document.getElementById('badgeError').innerHTML = "Error: " + response.elog;
			document.getElementById('badgeError').style.display = 'block';
			badgeField.value = '';
			badgeField.focus();
			
			break;
	
			}
			
		  }	
		}
	};
	 request.send(params);
}

function ptwClick()
{
	gameID = document.getElementById('gameID').value;
	badge1 = document.getElementById('badgeID1').value.trim();
	badge2 = document.getElementById('badgeID2').value.trim();
	badge3 = document.getElementById('badgeID3').value.trim();
	badge4 = document.getElementById('badgeID4').value.trim();
	badge5 = document.getElementById('badgeID5').value.trim();
	badge6 = document.getElementById('badgeID6').value.trim();
	badge7 = document.getElementById('badgeID7').value.trim();
	badge8 = document.getElementById('badgeID8').value.trim();
	badge9 = document.getElementById('badgeID9').value.trim();
	badge10 = document.getElementById('badgeID10').value.trim();
	badge11 = document.getElementById('badgeID11').value.trim();
	badge12 = document.getElementById('badgeID12').value.trim();
	badgeError1 = document.getElementById('badgeError1');

	
	if (gameID.trim() == '')
	{
		document.getElementById('lookupError').innerHTML = "Game ID is a required field.";
		document.getElementById('lookupError').style.display = 'block';
		
		return;
	}
	
	gameName = document.getElementById('gameName');
	gameInfoDiv = document.getElementById('gameInfoDiv');
	statusSpan = document.getElementById('statusSpan');
	actionButton = document.getElementById('actionButton');
	badgeDiv = document.getElementById('badgeEntriesDiv');
	lookupError = document.getElementById('lookupError');
	
	lookupError.style.display = 'none';
	
	var request = new XMLHttpRequest();
	var url = "http://pipartgames.com/tgdlibrary/ptwAction.php";
	var buttonAction = actionButton.value;
	var params = "gameID=" + gameID;
	
	if (badge1 != "")
		params += "&badge1=" + badge1;
	if (badge2 != "")
		params += "&badge2=" + badge2;
	if (badge3 != "")
		params += "&badge3=" + badge3;
	if (badge4 != "")
		params += "&badge4=" + badge4;	
	if (badge5 != "")
		params += "&badge5=" + badge5;
	if (badge6 != "")
		params += "&badge6=" + badge6;
	if (badge7 != "")
		params += "&badge7=" + badge7;
	if (badge8 != "")
		params += "&badge8=" + badge8;
	if (badge9 != "")
		params += "&badge9=" + badge9;
	if (badge10 != "")
		params += "&badge10=" + badge10;
	if (badge11 != "")
		params += "&badge11=" + badge11;
	if (badge12 != "")
		params += "&badge12=" + badge12;
	
	
	console.log ("Params: " + params);
	request.open('POST', url, true);
	request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	
	request.onreadystatechange = function() {
        if (request.readyState === XMLHttpRequest.DONE) {
          if (request.status === 200) 
		  {
            var response = JSON.parse(request.response);
            if (response.result != 'error') 
			{
				
				switch (response.result)
				{
					
				case "gamefound":
				console.log("Case: available");
				lookupError.innerHTML = response.gamename;
				lookupError.style.display = 'block';
				badgeDiv.style.display = 'block';
				document.getElementById('badgeID1').focus();
				
												
				break;	
				
				case "badgesprocessed":
				document.getElementById('gameID').disabled = true;
				actionButton.disabled = true;
				lookupError.innerHTML = response.gamename;
				lookupError.style.display = 'block';
				console.log("Case: badges processed");
				if (typeof response.badge1 !== 'undefined')
				{
					if (response.badge1 == 'dupe')
						badgeError1.innerHTML = "Duplicate Entry";
					else if (response.badge1 == 'nope')
						badgeError1.innerHTML = "No Attendee Found for that Badge ID";
					else
						badgeError1.innerHTML = "PTW Entry added for " + response.badge1user;
				}
				if (typeof response.badge2 !== 'undefined')
					{
					if (response.badge2 == 'dupe')
						badgeError2.innerHTML = "Duplicate Entry";
					else if (response.badge2 == 'nope')
						badgeError2.innerHTML = "No Attendee Found for that Badge ID";
					else
						badgeError2.innerHTML = "PTW Entry added for " + response.badge2user;
				}
				if (typeof response.badge3 !== 'undefined')
					{
					if (response.badge3 == 'dupe')
						badgeError3.innerHTML = "Duplicate Entry";
					else if (response.badge3 == 'nope')
						badgeError3.innerHTML = "No Attendee Found for that Badge ID";
					else
						badgeError3.innerHTML = "PTW Entry added for " + response.badge3user;
				}
				if (typeof response.badge4 !== 'undefined')
					{
					if (response.badge4 == 'dupe')
						badgeError4.innerHTML = "Duplicate Entry";
					else if (response.badge1 == 'nope')
						badgeError4.innerHTML = "No Attendee Found for that Badge ID";
					else
						badgeError4.innerHTML = "PTW Entry added for " + response.badge4user;
				}
				if (typeof response.badge5 !== 'undefined')
					{
					if (response.badge5 == 'dupe')
						badgeError5.innerHTML = "Duplicate Entry";
					else if (response.badge5 == 'nope')
						badgeError5.innerHTML = "No Attendee Found for that Badge ID";
					else
						badgeError5.innerHTML = "PTW Entry added for " + response.badge5user;
				}
				if (typeof response.badge6 !== 'undefined')
					{
					if (response.badge6 == 'dupe')
						badgeError6.innerHTML = "Duplicate Entry";
					else if (response.badge6 == 'nope')
						badgeError6.innerHTML = "No Attendee Found for that Badge ID";
					else
						badgeError6.innerHTML = "PTW Entry added for " + response.badge6user;
				}
				if (typeof response.badge7 !== 'undefined')
					{
					if (response.badge7 == 'dupe')
						badgeError7.innerHTML = "Duplicate Entry";
					else if (response.badge7 == 'nope')
						badgeError7.innerHTML = "No Attendee Found for that Badge ID";
					else
						badgeError7.innerHTML = "PTW Entry added for " + response.badge7user;
				}
				if (typeof response.badge8 !== 'undefined')
					{
					if (response.badge8 == 'dupe')
						badgeError8.innerHTML = "Duplicate Entry";
					else if (response.badge8 == 'nope')
						badgeError8.innerHTML = "No Attendee Found for that Badge ID";
					else
						badgeError8.innerHTML = "PTW Entry added for " + response.badge8user;
				}
				if (typeof response.badge9 !== 'undefined')
					{
					if (response.badge9 == 'dupe')
						badgeError9.innerHTML = "Duplicate Entry";
					else if (response.badge9 == 'nope')
						badgeError9.innerHTML = "No Attendee Found for that Badge ID";
					else
						badgeError9.innerHTML = "PTW Entry added for " + response.badge9user;
				}
				if (typeof response.badge10 !== 'undefined')
					{
					if (response.badge10 == 'dupe')
						badgeError10.innerHTML = "Duplicate Entry";
					else if (response.badge10 == 'nope')
						badgeError10.innerHTML = "No Attendee Found for that Badge ID";
					else
						badgeError10.innerHTML = "PTW Entry added for " + response.badge10user;
				}
				if (typeof response.badge11 !== 'undefined')
					if (typeof response.badge11 !== 'undefined')
					{
					if (response.badge11 == 'dupe')
						badgeError11.innerHTML = "Duplicate Entry";
					else if (response.badge11 == 'nope')
						badgeError11.innerHTML = "No Attendee Found for that Badge ID";
					else
						badgeError11.innerHTML = "PTW Entry added for " + response.badge11user;
				}
				if (typeof response.badge12 !== 'undefined')
					if (typeof response.badge12 !== 'undefined')
					{
					if (response.badge12 == 'dupe')
						badgeError12.innerHTML = "Duplicate Entry";
					else if (response.badge12 == 'nope')
						badgeError12.innerHTML = "No Attendee Found for that Badge ID";
					else
						badgeError12.innerHTML = "PTW Entry added for " + response.badge12user;
				}
				
				break;

				
				default:
					console.log("Case: default");
					console.log(response.elog);
				break;
				
				} // End Switch
            }
			else
			{
				lookupError.innerHTML = response.elog;
				console.log(response.elog);
				lookupError.style.display = 'block';
			}
          }
		  
        } 
      };
      request.send(params);
}	


function lookupClick()
{
	gameID = document.getElementById('inputBox').value;
	badgeID = document.getElementById('mainBadgeID').value;
		
	if (gameID.trim() == '')
	{
		document.getElementById('lookupError').innerHTML = "Game ID is a required field.";
		document.getElementById('lookupError').style.display = 'block';
		resetLibrary();
		return;
	}
	
	gameName = document.getElementById('gameName');
	gameInfoDiv = document.getElementById('gameInfoDiv');
	statusSpan = document.getElementById('statusSpan');
	actionButton = document.getElementById('actionButton');
	mainBadgeID = document.getElementById('mainBadgeID');
	mainBadgeLabel = document.getElementById('mainBadgeLabel');
	checkedOutSpan = document.getElementById('checkedOutSpan');
	
	document.getElementById('lookupError').style.display = 'none';
	
	var request = new XMLHttpRequest();
	var url = "http://pipartgames.com/tgdlibrary/libraryAction.php";
	var buttonAction = actionButton.value;
	var params = "gameID=" + gameID + "&badgeID=" + badgeID;
	console.log (params);
	request.open('POST', url, true);
	request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	
	request.onreadystatechange = function() {
        if (request.readyState === XMLHttpRequest.DONE) {
          if (request.status === 200) 
		  {
            var response = JSON.parse(request.response);
            if (response.result != 'error') 
			{
				
				switch (response.result)
				{
					
				case "available":
				console.log("Case: available");
				gameInfoDiv.style.display = 'block';
				gameName.innerHTML = response.gamename;
				mainBadgeID.disabled = false;
				document.getElementById('inputBox').disabled = true;
				mainBadgeID.focus();
								
				break;	
								
				case "checkedout":
				console.log("Case: checkedout");
				if (response.attendee == 'Sam Frey')
					playSamFrey();
				document.getElementById('lookupError').innerHTML = response.gamename + " checked out to " + response.attendee;
				document.getElementById('lookupError').style.display = 'block';
				resetLibrary();
				
				break;
				
				case "checkedin":
				console.log("Case: checkedin");
				document.getElementById('lookupError').innerHTML = response.gamename + " was checked in successfully.";
				document.getElementById('lookupError').style.display = 'block';
				resetLibrary();
				break;
				
				case "badgeerror":
				console.log("Case: Badge Error");
				document.getElementById('lookupError').innerHTML = response.elog;
				document.getElementById('lookupError').style.display = 'block';
				break;
				
				case "badgeinuse":
				console.log("Case: Badge already being used.");
				document.getElementById('lookupError').innerHTML = response.elog;
				document.getElementById('lookupError').style.display = 'block';
				break;
				
				default:
					console.log("Case: default");
					console.log(response.elog);
				break;
				
				} // End Switch
            }
			else
			{
				document.getElementById('lookupError').innerHTML = response.elog;
				console.log(response.elog);
				document.getElementById('lookupError').style.display = 'block';
				resetLibrary();
            }
          }
		  
        } 
      };
      request.send(params);
}

function meepleClick(){
	
choice = Math.floor(Math.random() * 100) + 1;
	
switch (choice) {

case 7:
	new Audio('taunt.m4a').play();
break;

case 8:
	new Audio('engarde.m4a').play();
break;

case 9:
	new Audio('stopClicking.m4a').play();
break;

case 10:

break;

default:

break;

}	
	
	
}