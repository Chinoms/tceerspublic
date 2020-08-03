function _(id){
	return document.getElementById(id);
}

function redirectUser(ajaxFeedback){
	//redirect user to dashboard after login.
	window.location.assign("user/index.php?userid="+ajaxFeedback);
}
  
  function loginUser(){
	  event.preventDefault();
	  _("loginbtn").disabled = true;
	  _("loginInfo").innerHTML = "Checking for your account . . .";
	  var loginData = new FormData();
	  loginData.append("email", _("email").value);
	  loginData.append("password", _("password").value);
	  var ajax = new XMLHttpRequest();
	  ajax.open("POST", "modules/login.php");
	  ajax.onreadystatechange = function(){
		  if(ajax.readyState == 4 && ajax.status == 200){
			  if(ajax.responseText !== "failed"){
				  var ajaxFeedback = ajax.responseText;
				  _("loginInfo").innerHTML = ajaxFeedback;
					window.location.assign("pendingJournals.php");
				 //setTimeout(redirectUser, 2000)
				  
			  }else{
				  var ajaxFeedback = ajax.responseText;
				_("loginInfo").innerHTML = "Username/Password incorrect. Try again."
				_("loginbtn").disabled = false;
				//window.alert("We couldn't find your account."); 
			  }
		  }
	  }
	  ajax.send(loginData);
  }
  
  
  
  function signupUser() {
      event.preventDefault();
      _("signupbtn").disabled = true;
      _("signupInfo").innerHTML = "Processing data. Please wait . . .";
      let signupData = new FormData();
      signupData.append("fname", _("fname").value);
      signupData.append("lname", _("lname").value);
      signupData.append("email", _("email").value);
      signupData.append("pass1", _("pass1").value);
      signupData.append("pass2", _("pass2").value);
	  let runAjax = new XMLHttpRequest();
      runAjax.open("POST", "modules/signup.php");
      runAjax.onreadystatechange = function() {
          if(runAjax.readyState == 4 && runAjax.status == 200) {
              if(runAjax.responseText == "success") {
				  _("signupInfo").innerHTML = "Congrats! You've been signed up.";
				 // location.href="emailuser.php";
              } else if(runAjax.responseText == "emailexists"){
				  _("signupInfo").innerHTML = "The email address you're trying to use is on our system.";
				  _("signupbtn").disabled = false;
			  } else if(runAjax.responseText = "passwordmismatch") {
				_("signupInfo").innerHTML = "Both passwords do not match.";
				_("signupbtn").disabled = false;
				return;
			  } else {
				  _("signupInfo").innerHTML = runAjax.responseText;
			  }
          }
	  }
	  runAjax.send(signupData);
  }


function uploadArticle() {
	event.preventDefault();
	tinyMCE.triggerSave();
	_("sendarticle").disabled = true;
	_("sendarticle").innerHTML = "Uploading your article. Please wait . . .";
	//let fileData = document.getElementById("article").value;
	let fileSelect = _("articlefile");
	let articleInfo = new FormData();
	let files = fileSelect.files;
	let file=files[0];
	articleInfo.append('articlefile', file, file.name);
	//articleInfo.append('articlefile', fileData.files[0]);
	articleInfo.append("title", _("title").value);
	articleInfo.append("keywords", _("keywords").value);
	//articleInfo.append("article", _("article").value);
	articleInfo.append("authorid", _("authorid").value);
	articleInfo.append("fname", _("fname").value);
	articleInfo.append("lname", _("lname").value);
	articleInfo.append("description", _("description").value);
	//alert(articleInfo._("title"));
	let runArticle = new XMLHttpRequest;
	runArticle.open("POST", "modules/runArticle.php");
	runArticle.onreadystatechange =  function() {
		if(runArticle.readyState == 4 && runArticle.status == 200) {
			if(runArticle.responseText == "success") {
				_("formsuccess").style.display = "inline";
				_("articleform").reset();
				//_("forminfo").innerHTML = "Success";
				return;
			} else if(runArticle.responseText == "filetoolarge") {
				_("forminfo").innerHTML = "Your file is too large.";
				_("sendarticle").disabled = false;
				return
			} else if(runArticle.responseText == "invalidfiletype") {
				_("forminfo").innerHTML = "<span class='text-danger'>The file must be a PDF file.</span>";
				_("sendarticle").disabled = false;
				return;
			} else if (runArticle.responseText == "failed") {
				_("forminfo").innerHTML = "<span class='text-danger'>Oops! We couldn't upload your file.</span>";
				_("sendarticle").disabled = false;
				return;
			} else if(runArticle.responseText == "error") {
				_("forminfo").innerHTML = "Something went wrong. Try again.";
				_("sendarticle").disabled = false;
			} else if(runArticle.responseText =="failed") {
				_("formInfo").innerHTML = "Sorry, We couldn't proceed with the operation."
			} else {
				_("forminfo").innerHTML = runArticle.responseText;
				_("sendarticle").disabled = false;
				return;
			}
		}
	}
	runArticle.send(articleInfo);
}



function uploadJournal() {
	event.preventDefault();
	tinyMCE.triggerSave();
	_("sendjournal").disabled = true;
	_("sendjournal").innerHTML = "Uploading your article. Please wait . . .";
	//let fileData = document.getElementById("article").value;
	let fileSelect = _("journalfile");
	let journalInfo = new FormData();
	let files = fileSelect.files;
	let file=files[0];
	journalInfo.append('journalfile', file, file.name);
	//articleInfo.append('articlefile', fileData.files[0]);
	journalInfo.append("title", _("title").value);
	journalInfo.append("keywords", _("keywords").value);
	//articleInfo.append("article", _("article").value);
	journalInfo.append("authorid", _("authorid").value);
	journalInfo.append("fname", _("fname").value);
	journalInfo.append("lname", _("lname").value);
	journalInfo.append("description", _("description").value);
	journalInfo.append("parentjournal", _("parentjournal").value);
	//alert(articleInfo._("title"));
	let runJournal = new XMLHttpRequest;
	runJournal.open("POST", "modules/runJournal.php");
	runJournal.onreadystatechange =  function() {
		if(runJournal.readyState == 4 && runJournal.status == 200) {
			if(runJournal.responseText == "success") {
				_("formsuccess").style.display = "inline";
				_("journalform").reset();
				//_("forminfo").innerHTML = "Success";
				return;
			} else if(runJournal.responseText == "filetoolarge") {
				_("forminfo").innerHTML = "Your file is too large.";
				_("sendjournal").disabled = false;
				return
			} else if(runJournal.responseText == "invalidfiletype") {
				_("forminfo").innerHTML = "<span class='text-danger'>The file must be a PDF file.</span>";
				_("sendjournal").disabled = false;
				return;
			} else if (runJournal.responseText == "failed") {
				_("forminfo").innerHTML = "<span class='text-danger'>Oops! We couldn't upload your file.</span>";
				_("sendjournal").disabled = false;
				return;
			} else if(runJournal.responseText == "error") {
				_("forminfo").innerHTML = "Something went wrong. Try again.";
				_("sendjournal").disabled = false;
			} else if(runJournal.responseText =="failed") {
				_("formInfo").innerHTML = "Sorry, We couldn't proceed with the operation."
			} else {
				_("forminfo").innerHTML = runJournal.responseText;
				_("sendjournal").disabled = false;
				return;
			}
		}
	}
	runJournal.send(journalInfo);
}