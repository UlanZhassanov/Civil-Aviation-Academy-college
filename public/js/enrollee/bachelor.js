//фильтр для национальностей
// $(document).ready(function() {
//     $('.nationality').select2();
// });
// Объявление переменных input
function admissionInputVal() {
	let base = document.getElementById('base').value
	return base
}
function languageInputVal() {
	let language = document.getElementById('language').value
	return language
}
function citizenInputVal() {
	let citizen = document.getElementById('citizen').value
	return citizen
}
function haveENTInputVal() {
	let haveENT = document.getElementById('haveENT').value
	return haveENT
}
function quantENTInputVal() {
	let quantENT = document.getElementById('quantENT').value
	return quantENT
}
function profsubInputVal() {
	let profsub = document.getElementById('profSub').value
	return profsub
}
function physicsInputVal() {
	let physics = document.getElementById('physics').value
	return physics
}
function geographyInputVal() {
	let geography = document.getElementById('geography').value
	return geography
}
function programmsInputVal() {
	let programms = document.getElementById('programms').value
	console.log(programms)
	return programms
}
function regionInputVal() {
	let region = document.getElementById('region').value
	return region
}
function countryInputVal() {
	let country = document.getElementById('countries').value
	return country
}
function vlekInputVal() {
	let vlek = document.getElementById('vlek').value
	return vlek
}
function ieltsInputVal() {
	let ielts = document.getElementById('ielts').value
	return ielts
}

// Поступление на базе
function admissionFunc() {
	if (admissionInputVal() !== null) {
        if(admissionInputVal() === 'Технического и профессионального образования (колледжа)'){
            document.getElementById('haveENT').value = "";
            document.getElementById('haveENTBlock').classList.remove('disabled')

            document.getElementById('mathLitBlock').classList.add('disabled')
            document.getElementById('mathLit').value = "";
            document.getElementById('mathLit').required = false
            document.getElementById('readLitBlock').classList.add('disabled')
            document.getElementById('readLit').value = "";
            document.getElementById('readLit').required = false
            document.getElementById('historyKZBlock').classList.add('disabled')
            document.getElementById('historyKZ').value = "";
            document.getElementById('historyKZ').required = false
            document.getElementById('mathBlock').classList.add('disabled')
            document.getElementById('math').value = "";
            document.getElementById('math').required = false

            document.getElementById('profSubBlock').classList.add('disabled')
            document.getElementById('profSub').value = "";

            document.getElementById('physicsBlock').classList.add('disabled')
            document.getElementById('physics').value = "";
            document.getElementById('physics').required = false
            document.getElementById('geographyBlock').classList.add('disabled')
            document.getElementById('geography').value = "";
            document.getElementById('geography').required = false
            document.getElementById('aviaSecBlock').classList.add('disabled')
            document.getElementById('aviaSec').value = "";
            document.getElementById('aviaSec').required = false
            document.getElementById('natureSecBlock').classList.add('disabled')
            document.getElementById('natureSec').value = "";
            document.getElementById('natureSec').required = false

            document.getElementById('quantENT').value = "";
        } else if (admissionInputVal() === '11-го класса') {
            document.getElementById('haveENT').value = "";
            document.getElementById('haveENTBlock').classList.remove('disabled')

            document.getElementById('mathLitBlock').classList.add('disabled')
            document.getElementById('mathLit').value = "";
            document.getElementById('mathLit').required = false
            document.getElementById('readLitBlock').classList.add('disabled')
            document.getElementById('readLit').value = "";
            document.getElementById('readLit').required = false
            document.getElementById('historyKZBlock').classList.add('disabled')
            document.getElementById('historyKZ').value = "";
            document.getElementById('historyKZ').required = false
            document.getElementById('mathBlock').classList.add('disabled')
            document.getElementById('math').value = "";
            document.getElementById('math').required = false

            document.getElementById('profSubBlock').classList.add('disabled')
            document.getElementById('profSub').value = "";

            document.getElementById('physicsBlock').classList.add('disabled')
            document.getElementById('physics').value = "";
            document.getElementById('physics').required = false
            document.getElementById('geographyBlock').classList.add('disabled')
            document.getElementById('geography').value = "";
            document.getElementById('geography').required = false
            document.getElementById('aviaSecBlock').classList.add('disabled')
            document.getElementById('aviaSec').value = "";
            document.getElementById('aviaSec').required = false
            document.getElementById('natureSecBlock').classList.add('disabled')
            document.getElementById('natureSec').value = "";
            document.getElementById('natureSec').required = false

            document.getElementById('quantENTBlock').classList.add('disabled')
            document.getElementById('quantENT').value = "";
        } else {
            document.getElementById('haveENT').value = "";
            document.getElementById('haveENTBlock').classList.add('disabled')

            document.getElementById('mathLitBlock').classList.add('disabled')
            document.getElementById('mathLit').value = "";
            document.getElementById('mathLit').required = false
            document.getElementById('readLitBlock').classList.add('disabled')
            document.getElementById('readLit').value = "";
            document.getElementById('readLit').required = false
            document.getElementById('historyKZBlock').classList.add('disabled')
            document.getElementById('historyKZ').value = "";
            document.getElementById('historyKZ').required = false
            document.getElementById('mathBlock').classList.add('disabled')
            document.getElementById('math').value = "";
            document.getElementById('math').required = false

            document.getElementById('profSubBlock').classList.add('disabled')
            document.getElementById('profSub').value = "";

            document.getElementById('physicsBlock').classList.add('disabled')
            document.getElementById('physics').value = "";
            document.getElementById('physics').required = false
            document.getElementById('geographyBlock').classList.add('disabled')
            document.getElementById('geography').value = "";
            document.getElementById('geography').required = false
            document.getElementById('aviaSecBlock').classList.add('disabled')
            document.getElementById('aviaSec').value = "";
            document.getElementById('aviaSec').required = false
            document.getElementById('natureSecBlock').classList.add('disabled')
            document.getElementById('natureSec').value = "";
            document.getElementById('natureSec').required = false

            document.getElementById('quantENTBlock').classList.add('disabled')
            document.getElementById('quantENT').value = "";


            document.getElementById('programmsBlock').classList.remove('disabled')
            let optionProgramms = document.getElementById('programms').options
            for (let i = 0; i < optionProgramms.length; i++) {
                optionProgramms[i].classList.remove('disabled')
            }

        }
		// Показываем блок готовности к обучению
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
	if (citizenInputVal() === 'Резидент РК' && admissionInputVal() !== 'Высшего образования') {
		// Показываем поле "имеется ЕНТ"
		document.getElementById('haveENTBlock').classList.remove('disabled')
		// Маска для ввода телефона
		$(function () {
			$(".phone").mask("+7 999 999 99 99", { placeholder: "" })
		})
		document.getElementById('countryBlock').classList.add('disabled')
		document.getElementById('regionBlock').classList.remove('disabled')
		document.getElementById('countries').value = "";
		document.getElementById('region').value = "";
		document.getElementById('region').required = true
        document.getElementById('iin').classList.remove('disabled')
        document.getElementById('iin').value = "";
	} else if (citizenInputVal() === 'Резидент РК' && admissionInputVal() === 'Высшего образования') {
		// Показываем поле обр. программ
		document.getElementById('programmsBlock').classList.remove('disabled')
		let optionProgramms = document.getElementById('programms').options
		for (let i = 0; i < optionProgramms.length; i++) {
			optionProgramms[i].classList.remove('disabled')
		}
		// Маска для ввода телефона
		$(function () {
			$(".phone").mask("+7 999 999 99 99", { placeholder: "" })
		})
		document.getElementById('countryBlock').classList.add('disabled')
		document.getElementById('regionBlock').classList.remove('disabled')
		document.getElementById('countries').value = "";
		document.getElementById('region').value = "";
		document.getElementById('region').required = true
        document.getElementById('iin').classList.remove('disabled')
        document.getElementById('iin').value = "";

	} else if (citizenInputVal() === 'Нерезидент РК') {
		// Показываем поле обр. программ
		document.getElementById('programmsBlock').classList.remove('disabled')
		let optionProgramms = document.getElementById('programms').options
		for (let i = 0; i < optionProgramms.length; i++) {
			optionProgramms[i].classList.remove('disabled')
		}
		// Маска для ввода телефона
		$(function () {
			$(".phone").unmask()
		})
		// Показываем поле выбора страны
		document.getElementById('countryBlock').classList.remove('disabled')
		document.getElementById('countries').value = "";
		document.getElementById('regionBlock').classList.add('disabled')
		document.getElementById('region').value = "";
		document.getElementById('region').required = false
        document.getElementById('iin').classList.add('disabled')
        document.getElementById('iin').value = "";
	}
}

// Имеется ЕНТ или НЕТ
function haveENTFunc() {
	console.log(admissionInputVal())
	if (admissionInputVal() === '11-го класса' && haveENTInputVal() === 'Да') {
		// Скрываем ненужные предметы
		document.getElementById('profSub').options[3].classList.add('disabled')
		document.getElementById('profSub').options[4].classList.add('disabled')
		// Показываем блок ЕНТ с предметами
		document.getElementById('mathLitBlock').classList.remove('disabled')
		document.getElementById('mathLit').value = "";
		document.getElementById('mathLit').required = true
		document.getElementById('readLitBlock').classList.remove('disabled')
		document.getElementById('readLit').value = "";
		document.getElementById('readLit').required = true
		document.getElementById('historyKZBlock').classList.remove('disabled')
		document.getElementById('historyKZ').value = "";
		document.getElementById('historyKZ').required = true
		document.getElementById('mathBlock').classList.remove('disabled')
		document.getElementById('math').value = "";
		document.getElementById('math').required = true

		document.getElementById('profSubBlock').classList.remove('disabled')
		document.getElementById('profSub').value = "";

		document.getElementById('quantENTBlock').classList.add('disabled')
		document.getElementById('quantENT').value = "";
		document.getElementById('quantENT').required = false

        document.getElementById('physicsBlock').classList.add('disabled')
        document.getElementById('physics').value = "";
        document.getElementById('physics').required = false
		document.getElementById('geographyBlock').classList.add('disabled')
        document.getElementById('geography').value = "";
        document.getElementById('geography').required = false
		document.getElementById('aviaSecBlock').classList.add('disabled')
        document.getElementById('aviaSec').value = "";
        document.getElementById('aviaSec').required = false
		document.getElementById('natureSecBlock').classList.add('disabled')
        document.getElementById('natureSec').value = "";
        document.getElementById('natureSec').required = false

		// Показываем 2-й проф. предмет, геог. и физика
		document.getElementById('profSub').options[1].classList.remove('disabled')
		document.getElementById('profSub').options[2].classList.remove('disabled')
	} else if (admissionInputVal() === 'Технического и профессионального образования (колледжа)' && haveENTInputVal() === 'Да') {

        document.getElementById('mathLitBlock').classList.add('disabled')
        document.getElementById('mathLit').value = "";
		document.getElementById('mathLit').required = false
        document.getElementById('readLitBlock').classList.add('disabled')
        document.getElementById('readLit').value = "";
		document.getElementById('readLit').required = false
        document.getElementById('historyKZBlock').classList.add('disabled')
        document.getElementById('historyKZ').value = "";
		document.getElementById('historyKZ').required = false
        document.getElementById('mathBlock').classList.add('disabled')
        document.getElementById('math').value = "";
		document.getElementById('math').required = false
        document.getElementById('profSubBlock').classList.add('disabled')
        document.getElementById('profSub').value = "";

        document.getElementById('physicsBlock').classList.add('disabled')
        document.getElementById('physics').value = "";
        document.getElementById('physics').required = false
		document.getElementById('geographyBlock').classList.add('disabled')
        document.getElementById('geography').value = "";
        document.getElementById('geography').required = false
		document.getElementById('aviaSecBlock').classList.add('disabled')
        document.getElementById('aviaSec').value = "";
        document.getElementById('aviaSec').required = false
		document.getElementById('natureSecBlock').classList.add('disabled')
        document.getElementById('natureSec').value = "";
        document.getElementById('natureSec').required = false

		// Показываем блок ЕНТ с предметами
		document.getElementById('quantENTBlock').classList.remove('disabled')
		document.getElementById('quantENT').value = "";
		document.getElementById('quantENT').required = true
	}
	else {
        document.getElementById('mathLitBlock').classList.add('disabled')
        document.getElementById('mathLit').value = "";
		document.getElementById('mathLit').required = false
        document.getElementById('readLitBlock').classList.add('disabled')
        document.getElementById('readLit').value = "";
		document.getElementById('readLit').required = false
        document.getElementById('historyKZBlock').classList.add('disabled')
        document.getElementById('historyKZ').value = "";
		document.getElementById('historyKZ').required = false
        document.getElementById('mathBlock').classList.add('disabled')
        document.getElementById('math').value = "";
		document.getElementById('math').required = false
        document.getElementById('profSubBlock').classList.add('disabled')
        document.getElementById('profSub').value = "";

        document.getElementById('physicsBlock').classList.add('disabled')
        document.getElementById('physics').value = "";
        document.getElementById('physics').required = false
		document.getElementById('geographyBlock').classList.add('disabled')
        document.getElementById('geography').value = "";
        document.getElementById('geography').required = false
		document.getElementById('aviaSecBlock').classList.add('disabled')
        document.getElementById('aviaSec').value = "";
        document.getElementById('aviaSec').required = false
		document.getElementById('natureSecBlock').classList.add('disabled')
        document.getElementById('natureSec').value = "";
        document.getElementById('natureSec').required = false

		document.getElementById('quantENTBlock').classList.add('disabled')
		document.getElementById('quantENT').value = "";
		document.getElementById('quantENT').required = false

		// Показываем поле обр. программ
		document.getElementById('programmsBlock').classList.remove('disabled')
		let optionProgramms = document.getElementById('programms').options
		for (let i = 0; i < optionProgramms.length; i++) {
			optionProgramms[i].classList.remove('disabled')
		}
	}
}

// Выбор количества предметов после ТиПо
function quantENTFunc() {
	let quantLess = document.getElementById('profSubBlock').querySelectorAll('option')
	for (let quantLessOne = 0; quantLessOne < quantLess.length; quantLessOne++) { quantLess[quantLessOne].classList.add('disabled') }
	if (quantENTInputVal() === '5') {
        console.log(document.getElementById('natureSec').value);
		// Показываем блок ЕНТ с предметами
		document.getElementById('mathLitBlock').classList.remove('disabled')
		document.getElementById('mathLit').classList.remove('disabled')
		document.getElementById('mathLit').required = true
        document.getElementById('mathLit').value = "";
		document.getElementById('readLitBlock').classList.remove('disabled')
		document.getElementById('readLit').classList.remove('disabled')
		document.getElementById('readLit').required = true
        document.getElementById('readLit').value = "";
		document.getElementById('historyKZBlock').classList.remove('disabled')
		document.getElementById('historyKZ').classList.remove('disabled')
		document.getElementById('historyKZ').required = true
        document.getElementById('historyKZ').value = "";
		document.getElementById('mathBlock').classList.remove('disabled')
		document.getElementById('math').classList.remove('disabled')
		document.getElementById('math').required = true
        document.getElementById('math').value = "";

		document.getElementById('physicsBlock').classList.add('disabled')
        document.getElementById('physics').value = "";
        document.getElementById('physics').required = false
		document.getElementById('geographyBlock').classList.add('disabled')
        document.getElementById('geography').value = "";
        document.getElementById('geography').required = false
		document.getElementById('aviaSecBlock').classList.add('disabled')
        document.getElementById('aviaSec').value = "";
        document.getElementById('aviaSec').required = false
		document.getElementById('natureSecBlock').classList.add('disabled')
        document.getElementById('natureSec').value = "";
        document.getElementById('natureSec').required = false

        document.getElementById('profSub').classList.remove('disabled')
        document.getElementById('profSub').value = "";
        document.getElementById('profSub').required = true

        console.log(document.getElementById('natureSec').value);

		document.getElementById('profSubBlock').querySelector('label').innerHTML = translation2profSubj
		document.getElementById('profSubBlock').classList.remove('disabled')
		document.getElementById('profSub').options[1].classList.remove('disabled')
		document.getElementById('profSub').options[2].classList.remove('disabled')

		document.getElementById('profSub').options[3].classList.add('disabled')
		document.getElementById('profSub').options[4].classList.add('disabled')

	} else {
        document.getElementById('mathLitBlock').classList.add('disabled')
        document.getElementById('mathLit').value = "";
		document.getElementById('mathLit').required = false
		document.getElementById('readLitBlock').classList.add('disabled')
        document.getElementById('readLit').value = "";
		document.getElementById('mathLit').required = false
		document.getElementById('historyKZBlock').classList.add('disabled')
        document.getElementById('historyKZ').value = "";
		document.getElementById('mathLit').required = false
		document.getElementById('mathBlock').classList.add('disabled')
        document.getElementById('math').value = "";
		document.getElementById('mathLit').required = false

        document.getElementById('physicsBlock').classList.add('disabled')
        document.getElementById('physics').value = "";
        document.getElementById('physics').required = false
		document.getElementById('geographyBlock').classList.add('disabled')
        document.getElementById('geography').value = "";
        document.getElementById('geography').required = false
		document.getElementById('aviaSecBlock').classList.add('disabled')
        document.getElementById('aviaSec').value = "";
        document.getElementById('aviaSec').required = false
		document.getElementById('natureSecBlock').classList.add('disabled')
        document.getElementById('natureSec').value = "";
        document.getElementById('natureSec').required = false

        document.getElementById('profSub').classList.remove('disabled')
        document.getElementById('profSub').value = "";
        document.getElementById('profSub').required = true

		// Показываем блок ЕНТ с 2 предметами
		document.getElementById('profSubBlock').querySelector('label').innerHTML = translation1profSubj
		document.getElementById('profSubBlock').classList.remove('disabled')
		document.getElementById('profSub').options[3].classList.remove('disabled')
		document.getElementById('profSub').options[4].classList.remove('disabled')

		document.getElementById('profSub').options[1].classList.add('disabled')
		document.getElementById('profSub').options[2].classList.add('disabled')

	}
}

// Выбор профильного предмета
function profSubFunc() {
	if (profsubInputVal() === 'Физика') {
		// Показываем поле для ввода баллов по ФИЗИКЕ
		document.getElementById('physicsBlock').classList.remove('disabled')
        document.getElementById('physics').value = "";
        document.getElementById('physics').required = true

		document.getElementById('geographyBlock').classList.add('disabled')
        document.getElementById('geography').value = "";
        document.getElementById('physics').required = false
		document.getElementById('aviaSecBlock').classList.add('disabled')
        document.getElementById('aviaSec').value = "";
        document.getElementById('physics').required = false
		document.getElementById('natureSecBlock').classList.add('disabled')
        document.getElementById('natureSec').value = "";
        document.getElementById('physics').required = false
	} else if (profsubInputVal() === 'География') {
		// Показываем поле для ввода баллов по ГЕОГРАФИИ
		document.getElementById('geographyBlock').classList.remove('disabled')
        document.getElementById('geography').value = "";
        document.getElementById('geography').required = true

		document.getElementById('physicsBlock').classList.add('disabled')
        document.getElementById('physics').value = "";
        document.getElementById('physics').required = false
		document.getElementById('aviaSecBlock').classList.add('disabled')
        document.getElementById('aviaSec').value = "";
        document.getElementById('aviaSec').required = false
		document.getElementById('natureSecBlock').classList.add('disabled')
        document.getElementById('natureSec').value = "";
        document.getElementById('natureSec').required = false
	} else if (profsubInputVal() === 'Авиационная безопасность') {
		document.getElementById('aviaSecBlock').classList.remove('disabled')
        document.getElementById('aviaSec').value = "";
        document.getElementById('aviaSec').required = true
		document.getElementById('physicsBlock').querySelector('label').innerHTML = translationPhis2profSubj
		document.getElementById('physicsBlock').classList.remove('disabled')
        document.getElementById('physics').value = "";
        document.getElementById('physics').required = true

		document.getElementById('geographyBlock').classList.add('disabled')
        document.getElementById('geography').value = "";
        document.getElementById('geography').required = false
		document.getElementById('natureSecBlock').classList.add('disabled')
        document.getElementById('natureSec').value = "";
        document.getElementById('natureSec').required = false
	} else if (profsubInputVal() === 'Охрана труда') {
		document.getElementById('natureSecBlock').classList.remove('disabled')
        document.getElementById('natureSec').value = "";
        document.getElementById('natureSec').required = true
		document.getElementById('physicsBlock').querySelector('label').innerHTML = translationPhis2profSubj
		document.getElementById('physicsBlock').classList.remove('disabled')
        document.getElementById('physics').value = "";
        document.getElementById('physics').required = true

		document.getElementById('geographyBlock').classList.add('disabled')
        document.getElementById('geography').value = "";
        document.getElementById('geography').required = false
		document.getElementById('aviaSecBlock').classList.add('disabled')
        document.getElementById('aviaSec').value = "";
        document.getElementById('aviaSec').required = false
	}
}

// Выбор балов по физике и показ доступных обр. программ
function physicsFunc() {
	if (quantENTInputVal() === '5' && physicsInputVal() !== '-----' || admissionInputVal() === '11-го класса' && physicsInputVal() !== '-----') {
		// Скрываем недоступные обр. программы
		let geogr = document.querySelectorAll('.geogr-opt')
		for (let i = 0; i < geogr.length; i++) {
			geogr[i].classList.add('disabled')
		}
		// Показываем доступные обр. программы по данному предмету
		let physic = document.querySelectorAll('.physic-opt.disabled')
		for (let i = 0; i < physic.length; i++) {
			physic[i].classList.remove('disabled')
		}
		// Показываем список образовательных программам
		document.getElementById('programmsBlock').classList.remove('disabled')
        document.getElementById('programms').value = "";
	} else if (quantENTInputVal() === '2' && physicsInputVal() !== '-----' && profsubInputVal() === 'Авиационная безопасность') {
		// Скрываем недоступные обр. программы
		let geogr = document.querySelectorAll('.geogr-opt')
		for (let i = 0; i < geogr.length; i++) {
			geogr[i].classList.add('disabled')
		}
		// Скрываем недоступные обр. программы
		let physic = document.querySelectorAll('.physic-opt')
		for (let i = 0; i < physic.length; i++) {
			physic[i].classList.add('disabled')
		}
		// Показываем доступные обр. программы по данному предмету
		let b067 = document.querySelectorAll('.b067')
		for (let i = 0; i < b067.length; i++) {
			b067[i].classList.remove('disabled')
		}
		// Показываем список образовательных программам
		document.getElementById('programmsBlock').classList.remove('disabled')
        document.getElementById('programms').value = "";
	} else if (quantENTInputVal() === '2' && physicsInputVal() !== '-----' && profsubInputVal() === 'Охрана труда') {
		// Скрываем недоступные обр. программы
		let geogr = document.querySelectorAll('.geogr-opt')
		for (let i = 0; i < geogr.length; i++) {
			geogr[i].classList.add('disabled')
		}
		// Скрываем недоступные обр. программы
		let physic = document.querySelectorAll('.physic-opt')
		for (let i = 0; i < physic.length; i++) {
			physic[i].classList.add('disabled')
		}
		// Показываем доступные обр. программы по данному предмету
		let b095 = document.querySelectorAll('.b095')
		for (let i = 0; i < b095.length; i++) {
			b095[i].classList.remove('disabled')
		}
		// Показываем список образовательных программам
		document.getElementById('programmsBlock').classList.remove('disabled')
        document.getElementById('programms').value = "";
	}
}

// Выбор балов по географии и показ доступных обр. программ
function geographyFunc() {
	if ((quantENTInputVal() === '5' && geographyInputVal() !== '-----') || geographyInputVal() !== '-----') {
		// Показываем доступные обр. программы по данному предмету
		let geogr = document.querySelectorAll('.geogr-opt.disabled')
		for (let i = 0; i < geogr.length; i++) {
			geogr[i].classList.remove('disabled')
		}
		// Показываем список образовательных программам
		document.getElementById('programmsBlock').classList.remove('disabled')
        document.getElementById('programms').value = "";
		// Скрываем недоступные обр. программы
		let physic = document.querySelectorAll('.physic-opt')
		for (let i = 0; i < physic.length; i++) {
			physic[i].classList.add('disabled')
		}
	}
}

// Выбор образовательной программы
function programmsFunc() {
	if (programmsInputVal() === 'Лётная эксплуатация гражданских самолетов (пилот)' || programmsInputVal() === 'Лётная эксплуатация гражданских вертолетов (пилот)' || programmsInputVal() === 'Обслуживание воздушного движения и аэронавигационное обеспечение полетов') {
		document.getElementById('vlekBlock').classList.remove('disabled')

		document.getElementById('ieltsBlock').classList.add('disabled')
        document.getElementById('vlek').value = "";
		document.getElementById('vlekImage').value = "";
		document.getElementById('psychoImage').value = "";
		document.getElementById('ielts').value = "";
        document.getElementById('ieltsImage').value = "";
	} else if (citizenInputVal() === 'Резидент РК' && programmsInputVal() !== 'Лётная эксплуатация гражданских самолетов (пилот)' || citizenInputVal() === 'Резидент РК' && programmsInputVal() !== 'Лётная эксплуатация гражданских вертолетов (пилот)' || citizenInputVal() === 'Резидент РК' && programmsInputVal() !== 'Обслуживание воздушного движения и аэронавигационное обеспечение полетов') {
		// Показываем список регионов
		document.getElementById('regionBlock').classList.remove('disabled')
        document.getElementById('region').value = "";
		document.getElementById('countryBlock').classList.add('disabled')
        document.getElementById('countries').value = "";

        document.getElementById('vlekBlock').classList.add('disabled')
		document.getElementById('vlek').value = "";

		document.getElementById('vlekBlockImage').classList.add('disabled')
		document.getElementById('vlekImage').value = "";

		document.getElementById('psychoBlockImage').classList.add('disabled')
		document.getElementById('psychoImage').value = "";

		document.getElementById('ieltsBlock').classList.add('disabled')
		document.getElementById('ielts').value = "";

        document.getElementById('ieltsBlockImage').classList.add('disabled')
		document.getElementById('ieltsImage').value = "";

	} else if (citizenInputVal() === 'Нерезидент РК' && programmsInputVal() !== 'Лётная эксплуатация гражданских самолетов (пилот)' || citizenInputVal() === 'Нерезидент РК' && programmsInputVal() !== 'Лётная эксплуатация гражданских вертолетов (пилот)' || citizenInputVal() === 'Нерезидент РК' && programmsInputVal() !== 'Обслуживание воздушного движения и аэронавигационное обеспечение полетов') {
		// Показываем список стран
		document.getElementById('countryBlock').classList.remove('disabled')
        document.getElementById('countries').value = "";
		document.getElementById('regionBlock').classList.add('disabled')
        document.getElementById('region').value = "";
		document.getElementById('region').required = false

        document.getElementById('vlekBlock').classList.add('disabled')
		document.getElementById('vlek').value = "";

		document.getElementById('vlekBlockImage').classList.add('disabled')
		document.getElementById('vlekImage').value = "";

		document.getElementById('psychoBlockImage').classList.add('disabled')
		document.getElementById('psychoImage').value = "";

		document.getElementById('ieltsBlock').classList.add('disabled')
		document.getElementById('ielts').value = "";

        document.getElementById('ieltsBlockImage').classList.add('disabled')
		document.getElementById('ieltsImage').value = "";
	} else {
        document.getElementById('vlekBlock').classList.add('disabled')
        document.getElementById('vlek').value = "";

        document.getElementById('vlekBlockImage').classList.add('disabled')
        document.getElementById('vlekImage').value = "";

        document.getElementById('psychoBlockImage').classList.add('disabled')
        document.getElementById('psychoImage').value = "";

        document.getElementById('ieltsBlock').classList.add('disabled')
        document.getElementById('ielts').value = "";

        document.getElementById('ieltsBlockImage').classList.add('disabled')
        document.getElementById('ieltsImage').value = "";
    }

}
// Пройден ВЛЭК?
function vlekFunc() {
	if (vlekInputVal() === 'Да') {
        // Показываем прикрепление ВЛЭК
        document.getElementById('vlekBlockImage').classList.remove('disabled')
        document.getElementById('vlekImage').required = true
        document.getElementById('vlekImage').value = "";
        // Показываем прикрепление ПСИХОТЕСТА
        document.getElementById('psychoBlockImage').classList.remove('disabled')
        document.getElementById('psychoImage').value = "";

        document.getElementById('ieltsBlockImage').classList.add('disabled')
        document.getElementById('ieltsImage').value = "";
		document.getElementById('ielts').value = "";

	} else if (vlekInputVal() === 'Нет' && citizenInputVal() === 'Резидент РК') {
		// Показываем блок IELTS
        document.getElementById('vlekImage').required = false
		document.getElementById('vlekBlockImage').classList.add('disabled')
        document.getElementById('vlekImage').value = "";

		document.getElementById('psychoBlockImage').classList.add('disabled')
        document.getElementById('psychoImage').value = "";

		document.getElementById('ieltsBlock').classList.remove('disabled')
        document.getElementById('ielts').value = "";
        document.getElementById('ieltsImage').value = "";
		// Показываем список регионов
		document.getElementById('regionBlock').classList.remove('disabled')
	} else if (vlekInputVal() === 'Нет' && citizenInputVal() === 'Нерезидент РК') {
		// Показываем блок IELTS
        document.getElementById('vlekImage').required = false
		document.getElementById('vlekBlockImage').classList.add('disabled')
        document.getElementById('vlekImage').value = "";

		document.getElementById('psychoBlockImage').classList.add('disabled')
        document.getElementById('psychoImage').value = "";

		document.getElementById('ieltsBlock').classList.remove('disabled')
        document.getElementById('ielts').value = "";
        document.getElementById('ieltsImage').value = "";
		// Показываем список стран
		document.getElementById('countryBlock').classList.remove('disabled')
        document.getElementById('countries').value = "";
	}
}
// Имеется ВЛЭК
function vlekImageFunc() {
	// Показываем блок IELTS
	document.getElementById('ieltsBlock').classList.remove('disabled')
    document.getElementById('ielts').value = "";
}
// Имеется IELTS
function ieltsFunc() {
	if (ieltsInputVal() === 'Да') {
		document.getElementById('ieltsBlockImage').classList.remove('disabled')
        document.getElementById('ieltsImage').value = "";
	} else if (ieltsInputVal() === 'Нет' && citizenInputVal() === 'Резидент РК') {
		// Показываем список регионов
		document.getElementById('regionBlock').classList.remove('disabled')
        document.getElementById('region').value = "";

        document.getElementById('ieltsBlockImage').classList.add('disabled')
        document.getElementById('ieltsImage').value = "";
	} else if (ieltsInputVal() === 'Нет' && citizenInputVal() === 'Нерезидент РК') {
		// Показываем список стран
		document.getElementById('countryBlock').classList.remove('disabled')
        document.getElementById('countries').value = "";

        document.getElementById('ieltsBlockImage').classList.add('disabled')
        document.getElementById('ieltsImage').value = "";
	}
}
function ieltsImageFunc() {
	if (citizenInputVal() === 'Резидент РК') {
		// Показываем список регионов
		document.getElementById('regionBlock').classList.remove('disabled')
        document.getElementById('region').value = "";
        document.getElementById('iin').classList.remove('disabled')
        document.getElementById('iin').value = "";

	} else if (citizenInputVal() === 'Нерезидент РК') {
		// Показываем список стран
		document.getElementById('countryBlock').classList.remove('disabled')
        document.getElementById('countries').value = "";
        document.getElementById('iin').classList.add('disabled')
        document.getElementById('iin').value = "";
	}
}
// Выбор региона
function regionFunc() {
	// Показываем ФИО, телефон, кнопка "отправить"
	document.getElementById('iinBlock').classList.remove('disabled')
	// Маска для ввода телефона
	$(function () {
		$("#iin").mask("999999999999", { placeholder: "" })
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
// Выбор страны
function countryFunc() {
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

function sendApplication() {
	let button = document.querySelector("#button")
	if (button.classList.contains('first') === true) {
		var modal = document.getElementById("myModal");
		modal.style.display = "block";
		button.classList.remove('first')
	} else {
		button.setAttribute('type', 'submit')
	}
}
