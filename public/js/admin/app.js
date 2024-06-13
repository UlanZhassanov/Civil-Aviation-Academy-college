// Выбираем все элементы с классом title
let toggleButton = document.querySelectorAll('.dropdown .title');

// Перебираем массив и слушаем каждый элемент 
for (let i = 0; i < toggleButton.length; i++) {
	toggleButton[i].addEventListener('click', clickButton);
}
// При нажатии на кнопку
function clickButton(){
	let parentEl = this.parentNode;
	let angleIcon = parentEl.querySelector('.fa-angle-right');
	let pointCursor = parentEl.querySelector('.menu');
	if (angleIcon.classList.contains('rotate-90')){
		angleIcon.classList.remove('rotate-90');
		pointCursor.classList.add('hide');
	}else{
		angleIcon.classList.add('rotate-90');
		pointCursor.classList.remove('hide');
	}
}
