// Объявление переменных input
function programmsInputVal() {
	let input = document.getElementById('programms').value
	return input
}
function haveTestInputVal() {
	let input = document.getElementById('have_test').value
	return input
}
function tgoInputVal() {
	let input = document.getElementById('tgo_magister').value
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
		// Показываем блок готовности к обучению
		document.getElementById('languageBlock').classList.remove('disabled')

		document.getElementById('have_test').value = "";
        document.getElementById('tgoMagisterBlock').classList.add('disabled')
		document.getElementById('tgo_magister').value = "";
		document.getElementById('profSubMagister1Block').classList.add('disabled')
		document.getElementById('prof_sub_magister_1').value = "";
		document.getElementById('profSubMagister2Block').classList.add('disabled')
		document.getElementById('prof_sub_magister_2').value = "";
		document.getElementById('engMagisterBlock').classList.add('disabled')
		document.getElementById('eng_magister').value = "";
	}
}

// Поступление на базе
function languageFunc() {
	// Показываем поле гражданство
	document.getElementById('haveTestBlock').classList.remove('disabled')
}

// Баллы по 1-му проф. предмету
function haveTestFunction() {
	if (haveTestInputVal() == true) {
		// Показываем тест на готовность к обучению
		document.getElementById('tgoMagisterBlock').classList.remove('disabled')

	} else {
		// Показываем выбор гражданства
		document.getElementById('citizenBlock').classList.remove('disabled')

		document.getElementById('tgoMagisterBlock').classList.add('disabled')
		document.getElementById('tgo_magister').value = "";
		document.getElementById('profSubMagister1Block').classList.add('disabled')
		document.getElementById('prof_sub_magister_1').value = "";
		document.getElementById('profSubMagister2Block').classList.add('disabled')
		document.getElementById('prof_sub_magister_2').value = "";
		document.getElementById('engMagisterBlock').classList.add('disabled')
		document.getElementById('eng_magister').value = "";
	}
}

// Баллы по 1-му проф. предмету
function tgoFunction() {
	if (tgoInputVal() !== null) {
		// Показываем профильный предмет 1
		document.getElementById('profSubMagister1Block').classList.remove('disabled')
	}
}
// Баллы по 2-му проф. предмету
function profSubMagister1Func() {
	if (profSubMagister1InputVal() !== null) {
		// Показываем профильный предмет 2
		document.getElementById('profSubMagister2Block').classList.remove('disabled')
	}
}
// Вводим баллы по 2-му профильному предмету
function profSubMagister2Func() {
	if (profSubMagister2InputVal() !== null && (programmsInputVal() === 'Авиационная техника и технологии (научно-педагогическая магистратура)' || programmsInputVal() === 'Летная эксплуатация летательных аппаратов и двигателей (научно-педагогическая магистратура)' || programmsInputVal() === 'Организация перевозок, движения и эксплуатация транспорта (научно-педагогическая магистратура)')) {
		// Показываем профильный предмет 2
		document.getElementById('engMagisterBlock').classList.remove('disabled')
	} else {
		// Показываем выбор гражданства
		document.getElementById('citizenBlock').classList.remove('disabled')
	}
}

// Показываем блок гражданства
function englishMasterFunc() {
	if (englishMagisterInputVal() !== null) {
		// Показываем выбор гражданства
		document.getElementById('citizenBlock').classList.remove('disabled')
	}
}

// Выбор гражданства
function citizenFunc() {
	if (citizenInputVal() === 'Резидент РК') {
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

		document.getElementById('iin').classList.add('disabled')
		document.getElementById('iin').value = "";
		document.getElementById('regionBlock').classList.add('disabled')
		document.getElementById('region').value = "";
	}
}

// Выбор региона
function regionFunc() {
	if (regionInputVal() !== '-----') {
		// Показываем ФИО, телефон, кнопка "отправить"
		document.getElementById('iinBlock').classList.remove('disabled')
		// Маска для ввода телефона
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
