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
if (!!loginform) {
	loginform.onsubmit = function () {
		errorHandler(loginform, ['username', 'password'], 'errors');
		return false;
	};
}


var toggleIcons = document.querySelectorAll('#toggle-icon');
var groupContents = document.querySelectorAll('.group-content');

for (var i = 0; i < toggleIcons.length; i++) {
	toggleIcons[i].onclick = function () {
		var display = groupContents[this.dataset.id - 1].style.display;
		if (display == 'block') {
			groupContents[this.dataset.id - 1].style.display = 'none';
		} else {
			groupContents[this.dataset.id - 1].style.display = 'block';
		}
	};
}
