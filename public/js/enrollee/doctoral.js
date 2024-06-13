// Объявление переменных input
function programmsInputVal() {
	let input = document.getElementById('programms').value
	return input
}
function profSubMagister1InputVal() {
	let input = document.getElementById('prof_sub_magister_1').value
	return input
}
function profSubMagister2InputVal() {
	let input = document.getElementById('prof_sub_magister_2').value
	return input
}
function englishMagisterInputVal() {
	let input = document.getElementById('eng_magister').value
	return input
}
function citizenInputVal() {
	let input = document.getElementById('citizen').value
	return input
}
function regionInputVal() {
	let input = document.getElementById('region').value
	return input
}
function countryInputVal() {
	let input = document.getElementById('countries').value
	return input
}

// Выбор образовательной программы
function programmsFunc() {
	if (programmsInputVal() !== null) {
		// Показываем выбор гражданства
		document.getElementById('languageBlock').classList.remove('disabled')
	}
}

// Поступление на базе
function languageFunc() {
	// Показываем поле гражданство
	document.getElementById('citizenBlock').classList.remove('disabled')
}

// Выбор гражданства
function citizenFunc() {
	if (citizenInputVal() === 'Резидент РК') {
		// Добавляем маску с поля телефона
		document.getElementById('phoneBlock-1').querySelector('input').id = 'phone_1'
		document.getElementById('phoneBlock-2').querySelector('input').id = 'phone_2'
		// Маска для ввода телефона
		$(function () {
			$(".phone").mask("+7 (999) 999-99-99")
		})
		// Показываем поле выбора региона
		document.getElementById('regionBlock').classList.remove('disabled')
		document.getElementById('iin').classList.remove('disabled')

		document.getElementById('countryBlock').classList.add('disabled')
		document.getElementById('countries').value = "";
	} else {
		// Показываем поле выбора страны
		document.getElementById('countryBlock').classList.remove('disabled')

		document.getElementById('regionBlock').classList.add('disabled')
		document.getElementById('region').value = "";
		document.getElementById('iin').classList.add('disabled')
		document.getElementById('iin').value = "";
	}
}

// Выбор региона
function regionFunc() {
	if (regionInputVal() !== '-----') {
		// Показываем ФИО, телефон, кнопка "отправить"
		document.getElementById('iinBlock').classList.remove('disabled')
		// Маска для ввода ИИН
		$(function () {
			$("#iin").mask("999999999999")
		})
		document.getElementById('surnameBlock').classList.remove('disabled')
		document.getElementById('nameBlock').classList.remove('disabled')
		document.getElementById('patronymicBlock').classList.remove('disabled')
		document.getElementById('birthdateBlock').classList.remove('disabled')
		document.getElementById('genderBlock').classList.remove('disabled')
		document.getElementById('nationalityBlock').classList.remove('disabled')
		document.getElementById('phoneBlock-1').classList.remove('disabled')
		document.getElementById('phoneBlock-2').classList.remove('disabled')
		document.getElementById('emailBlock').classList.remove('disabled')
		document.getElementById('button').classList.remove('disabled')
	}
}

// Выбор страны
function countryFunc() {
	if (countryInputVal() !== '-----') {
		// Показываем ФИО, телефон, кнопка "отправить"
		document.getElementById('surnameBlock').classList.remove('disabled')
		document.getElementById('nameBlock').classList.remove('disabled')
		document.getElementById('patronymicBlock').classList.remove('disabled')
		document.getElementById('birthdateBlock').classList.remove('disabled')
		document.getElementById('genderBlock').classList.remove('disabled')
		document.getElementById('nationalityBlock').classList.remove('disabled')
		document.getElementById('phoneBlock-1').classList.remove('disabled')
		document.getElementById('phoneBlock-2').classList.remove('disabled')
		document.getElementById('emailBlock').classList.remove('disabled')
		document.getElementById('button').classList.remove('disabled')
	}
}
