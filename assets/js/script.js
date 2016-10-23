function capitalize(string) {
    return string.replace(/^./, string[0].toUpperCase());
}

function errorHandler(form, fields, errorBox) {
	var errors = [];
	var errorBox = document.getElementById(errorBox);

	for (var i = 0; i < fields.length; i++) {
		if (document.getElementById(fields[i]).value === '') {
			errors.push(capitalize(fields[i]) + ' can not be empty.');
		}
	}

	
	if (errors.length == 0) {
		form.submit();
	} else {
		var data = '';
		data += '<ul>';
		for (var i = 0; i < errors.length; i++) {
			data += '<li>' + errors[i] + '</li>';
		}
		data += '</ul>';
		errorBox.innerHTML = data;
	}
}


var loginform = document.getElementById('loginform');
loginform.onsubmit = function () {
	errorHandler(loginform, ['username', 'password'], 'errors');
	return false;
};

