"use strict";

const requestURL = 'api.php'

async function sendRequest(method, url, body = null) {
	const headers = {
		'Content-Type': 'application/json;charset=utf-8'
	}
	return fetch(url, {
		method: method,
		body: JSON.stringify(body),
		headers: headers
	}).then(async response => {
		if (response.ok) {
			return response.json()
		};
		return response.json().then(error => {
			const err = new Error('Что-то пошло не так');
			err.data = error;
			throw err
		})
	});
};

document.forms.Task.onsubmit = function (e) {
	e.preventDefault();

	let id = document.querySelector('input[name="task_id"]').value;
	if (id == '') {
		alert("Введите ID!!!")
	} else {
		let body = {
			"task_id": id,
			"action": 'getById'
		};
		sendRequest('POST', requestURL, body)
			.then(data => {

				let div = document.querySelector('#Task');
				if (data.length == 0) {
					div.innerHTML = `<a>"Задач с таким ID нет."</a><a href='/DAO_training/'>На главную</a>"`;
				} else {

					let table = `<table border='1' cellspacing='0' width='50%'>
					<tr><th>Id</th><th>Текст</th><th>Выполнена</th><th>Дата</th><th>ID юсера</th></tr>`;

					for (let i = 0; i < data.length; i++) {
						table += "<tr></tr>";
						for (let j in data[i]) {
							table += `<td>${data[i][j]}</td>`;
						}
					}
					table += "</table>";
					div.innerHTML = table;
					document.body.insertAdjacentHTML("afterend", `<a href='/DAO_training/'>На главную</a>`);
				}
			})
			.catch(err => console.log(err))
	};
}

document.forms.Tasks.onsubmit = function (e) {
	e.preventDefault();

	let body = {
		"action": 'getAll'
	};
	sendRequest('POST', requestURL, body)
		.then(data => {

			let div = document.querySelector('#Tasks');
			if (data.length == 0) {
				div.innerHTML = `<a>"Нет задач."</a><a href='/DAO_training/'>На главную</a>"`;
			} else {

				let table = `<table border='1' cellspacing='0' width='50%'>
					<tr><th>Id</th><th>Текст</th><th>Выполнена</th><th>Дата</th><th>ID юсера</th></tr>`;

				for (let i = 0; i < data.length; i++) {
					table += "<tr></tr>";
					for (let j in data[i]) {
						table += `<td>${data[i][j]}</td>`;
					}
				}
				table += "</table>";
				div.innerHTML = table;
				document.body.insertAdjacentHTML("afterend", `<a href='/DAO_training/'>На главную</a>`);
			}
		})
		.catch(err => console.log(err))
};