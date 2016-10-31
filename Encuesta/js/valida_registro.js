with(document.registro){
	onsubmit = function(e){
		e.preventDefault();
		ok = true;
		if(ok && username.value==""){
			ok=false;
			alert("Debe escribir su nombre");
			username.focus();
		}
		if(ok &&fullname.value==""){
			ok=false;
			alert("Debe escribir su edad");
			fullname.focus();
		}
		if(ok && email.value==""){
			ok=false;
			alert("Debe escribir su edad");
			email.focus();
		}
			if(ok && email.value==""){
			ok=false;
			alert("Debe escribir su salario");
			email.focus();
		}

		if(ok){ submit(); }
	}
}
