

function formatZip(zip) {
	var zipMatch = zip.value.match(/\d{9}/);
	if (zipMatch)
		zip.value = zip.value.substring(0,5) + "-" + zip.value.substring(5);
}

function formatPhone(phone) {
	var phoneMatch = phone.value.match(/\d{10}/);
	if (!phoneMatch) {
		phoneMatch = phone.value.match(/\(\d{3}\)\d{7}/);
		if (phoneMatch) {
			phone.value = phone.value.substring(1,4) + "-" + phone.value.substring(5,8) + "-" + 
				phone.value.substring(8);
		}	
	} else {
		phone.value = phone.value.substring(0,3) + "-" + phone.value.substring(3,6) + "-" + 
			phone.value.substring(6);
	}
}

function resetForm(regForm) {
	var formElems = regForm.elements;
	var fType;
	for (i = 0; i < formElems.length; i++) {
		fType = formElems[i].type;
		if (fType == "text" || fType == "email" || fType == "password")
			formElems[i].value = "";
		else if (fType == "radio")
			formElems[i].checked = false;
	}

}

/*function formValidate(userName, pass, rptPass, fName, lName, addr1, addr2, city, state, zip, phone,
						email, gender, marital, dob) {
	var errMsg = "";
	var errNode;

	//userName
	if (userName.value.length < 6) {
		errMsg += "Username must contain at least 6 characters.\n";
		highLight(userName);
	}
	//pass and rptPass
	if (pass.value.length < 8) {
		highLight(pass);
		highLight(rptPass);
		errMsg += "Password must contain at least 8 characters.\n";
	}	
	var digit = false;
	var lower = false;
	var upper = false;
	var special = false;
	var passMatch = false;
	
	for (i = 0; i < pass.value.length; i++) {
		if (pass.value[i].match(/\d/))
			digit = true;
		if (pass.value[i].match(/[A-Z]/))
			upper = true;
		if (pass.value[i].match(/[a-z]/))
			lower = true;
		if (pass.value[i].match(/\W/))
			special = true;
	}
	
	if (digit && lower && upper && special)
		passMatch = true;
	if (!passMatch) {
		highLight(pass);
		highLight(rptPass);	
		errMsg += "Password must contain at least 1 digit, 1 lowercase, 1 uppercase," +
					" and 1 special character.\n";
	}
	
	if (pass.value != rptPass.value) {
		highLight(pass);
		highLight(rptPass);	
		errMsg += "Passwords do not match.\n";
	}

	//FirstName
	if (fName.value == "") {
		highLight(fName);
		errMsg += "Enter a first name.\n";
	}

	//LastName
	if (lName.value == "") {
		highLight(lName);
		errMsg += "Enter a last name.\n";
	}

	//Addr1
	if (addr1.value == "") {
		highLight(addr1);
		errMsg += "Enter an address.\n";
	}

	//City
	if (city.value == "") {
		highLight(city);
		errMsg += "Enter a city.\n";
	}

	//state
	if (state.value == "null") {
		highLight(state);
		errMsg += "Select a state.\n";
		
	}

	//zip
	var zipMatch;
	zipMatch = zip.value.match(/^\d{5}$/);
	if (!zipMatch) {
		zipMatch = zip.value.match(/^\d{5}[-]\d{4}$/);
		if (!zipMatch) {
			highLight(zip);
			errMsg += "Invalid zip code.\n";
		}
	}

	//phone
	var phoneMatch;
	phoneMatch = phone.value.match(/\d{3}[-]\d{3}[-]\d{4}/);
	if (!phoneMatch) {
		errMsg += "Phone number must contain 10 digits.\n";
		highLight(phone);
	}

	//email
	var emailMatch;
	emailMatch = email.value.match(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/);

	if (!emailMatch) {
		errMsg += "Invalid email address.\n";
		highLight(email);	
	}

	//gender
	var goodBtn = false;
	for (i = 0; i<gender.length; i++) {
		if (gender[i].checked) {
			goodBtn = true;
			break;
		}
	}
	
	if (!goodBtn)
		errMsg += "Select a gender.\n";

	//marital
	goodBtn = false;
	for (i = 0; i<marital.length; i++) {
		if (marital[i].checked) {
			goodBtn = true;
			break;
		}
	}
	
	if (!goodBtn)
		errMsg += "Select a marital status.\n";

	//dob
	if (dob.value == "") {
		highLight(dob);
		errMsg += "Choose a date of birth.\n";
	}

	if (errMsg != "") {
		document.getElementById("errors").innerHTML = "";
		var errList = document.createElement("UL");
		var listNode;
		var textNode;
		var errArray = errMsg.split("\n");
		for (i = 0; i < errArray.length-1; i++) {
			listNode = document.createElement("LI");			
			textNode = document.createTextNode(errArray[i]);
			listNode.appendChild(textNode);
			errList.appendChild(listNode);
		}
		document.getElementById("errors").appendChild(errList);
		document.body.scrollTop = document.documentElement.scrollTop = 0;
		
	} else {
		alert("Thanks for registering!");
		document.getElementById("regForm").submit();
	}
}
*/
$(function() {
	$( "#dob" ).datepicker();
});

function highLight(elem) {
	$(function(){		
		$(elem).addClass("error");
	});
}

$(function() {
	$("#dob").datepicker();
});

$(function() {
	$("input").focus(function() {
		$(this).removeClass("error");
	});
});


