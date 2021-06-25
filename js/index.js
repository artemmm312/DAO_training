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
			return response.json();
		};
		return response.json().then(error => {
			const err = new Error('Что-то пошло не так');
			err.data = error;
			throw err
		})
	});
};

//Вывода задачи по её ID
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
};

//Вывод всех задач
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

//Добавление новой задачи в базу данных
document.forms.addTask.onsubmit = function (e) {
	e.preventDefault();

	let text = document.querySelector('input[name="addTask_text"]').value;
	let isCompleted = document.querySelector('input[name="addTask_isCompleted"]').value;
	let createdAt = document.querySelector('input[name="addTask_createdAt"]').value;
	let userId = document.querySelector('input[name="addTask_userId"]').value;
	let body = {
		"addTask_text": text,
		"addTask_isCompleted": isCompleted,
		"addTask_createdAt": createdAt,
		"addTask_userId": userId,
		"action": 'insert'
	};
	sendRequest('POST', requestURL, body)
		.then(data => {
			alert(data);

			const addTask_text = document.querySelector('input[name="addTask_text"]');
			addTask_text.value = '';
			const addTask_isCompleted = document.querySelector('input[name="addTask_isCompleted"]');
			addTask_isCompleted.value = '';
			const addTask_createdAt = document.querySelector('input[name="addTask_createdAt"]');
			addTask_createdAt.value = '';
			const addTask_userId = document.querySelector('input[name="addTask_userId"]');
			addTask_userId.value = '';
		})
		.catch(err => console.log(err))
};

//Обнавление существующей задачи по её ID
document.forms.updateTask.onsubmit = function (e) {
	e.preventDefault();

	let id = document.querySelector('input[name="updateTask_id"]').value;
	let text = document.querySelector('input[name="updateTask_text"]').value;
	let isCompleted = document.querySelector('input[name="updateTask_isCompleted"]').value;
	let createdAt = document.querySelector('input[name="updateTask_createdAt"]').value;
	let userId = document.querySelector('input[name="updateTask_userId"]').value;
	let body = {
		"updateTask_id": id,
		"updateTask_text": text,
		"updateTask_isCompleted": isCompleted,
		"updateTask_createdAt": createdAt,
		"updateTask_userId": userId,
		"action": 'update'
	};
	sendRequest('POST', requestURL, body)
		.then(data => {
			alert(data);

			const updateTask_id = document.querySelector('input[name="updateTask_id"]');
			updateTask_id.value = '';
			const updateTask_text = document.querySelector('input[name="updateTask_text"]');
			updateTask_text.value = '';
			const updateTask_isCompleted = document.querySelector('input[name="updateTask_isCompleted"]');
			updateTask_isCompleted.value = '';
			const updateTask_createdAt = document.querySelector('input[name="updateTask_createdAt"]');
			updateTask_createdAt.value = '';
			const updateTask_userId = document.querySelector('input[name="updateTask_userId"]');
			updateTask_userId.value = '';
		})
		.catch(err => console.log(err))
};