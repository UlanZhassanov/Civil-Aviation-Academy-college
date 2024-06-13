// on document ready
$(document).ready(function () {
	// show/hide the mobile menu based on class added to container
	$('.menu-icon').click(function () {
		$(this).parent().toggleClass('is-tapped');
		$('#hamburger').toggleClass('open');
		$('body').toggleClass('overflow-hidden');
	});

    $('.menu-iconLib').click(function () {
		$(this).parent().toggleClass('is-tapped');
		$('#hamburgerLib').toggleClass('open');
		$('body').toggleClass('overflow-hidden');
	});

	// handle touch device events on drop down, first tap adds class, second navigates
	$('.touch .sitenavigation li.nav-dropdown > a').on('touchend',
		function (e) {
			if ($('.menu-icon').is(':hidden')) {
				var parent = $(this).parent();
				$(this).find('.clicked').removeClass('clicked');
				if (parent.hasClass('clicked')) {
					window.location.href = $(this).attr('href');
				} else {
					$(this).addClass('linkclicked');

					// close other open menus at this level
					$(this).parent().parent().find('.clicked').removeClass('clicked');

					parent.addClass('clicked');
					e.preventDefault();
				}
			}
		});
	// handle the expansion of mobile menu drop down nesting
	$('.sitenavigation li.nav-dropdown').click(
		function (event) {
			if (event.stopPropagation) {
				event.stopPropagation();
			} else {
				event.cancelBubble = true;
			}

			if ($('.menu-icon').is(':visible')) {
				$(this).find('> ul').toggle();
				$(this).toggleClass('expanded');
			}
		}
	);
	// prevent links for propagating click/tap events that may trigger hiding/unhiding
	$('.sitenavigation a.nav-dropdown, .sitenavigation li.nav-dropdown a').click(
		function (event) {
			if (event.stopPropagation) {
				event.stopPropagation();
			} else {
				event.cancelBubble = true;
			}
		}
	);
	// javascript fade in and out of dropdown menu
	$('.sitenavigation li').hover(
		function () {
			if (!$('.menu-icon').is(':visible')) {
				$(this).find('> ul').fadeIn(100);
			}
		},
		function () {
			if (!$('.menu-icon').is(':visible')) {
				$(this).find('> ul').fadeOut(100);
			}
		}
	);
	$('.profile .title').click(function () {
		$(this).parent('.block').find('.detail').slideToggle();
	});
});
// Запускаем действия при полной загрузке страницы
window.addEventListener('load', function () {
	// Закрываем доступ к смене Select
	// let allSel = document.querySelectorAll('select')
	// for (let i = 0; i < allSel.length; i++) {
	// 	allSel[i].onclick = function () {
	// 		// Значение option выбранного select
	// 		let optionSelect = allSel[i].options[allSel[i].selectedIndex].text
	// 		// Создаём input со значением select
	// 		let hiddenSelect = '<input class="opacity-60" type="hidden" value="' + this.value + '" id="' + this.id + '" name="' + this.getAttribute('name') + '">'
	// 		let inputSelect = '<input class="opacity-60" type="text" value="' + optionSelect + '" readonly>'
	// 		if (optionSelect !== '-----') {
	// 			this.insertAdjacentHTML('afterend', hiddenSelect)
	// 			this.insertAdjacentHTML('afterend', inputSelect)
	// 			this.remove()
	// 		}
	// 	}
	// }

	// Добавляем прозрачность заполненным input
	let allInput = document.querySelectorAll('input')
	for (let i = 0; i < allInput.length; i++) {
		allInput[i].oninput = function () {
			this.classList.add('opacity-60')
		}
	}

	// Get the modal
	var modal = document.getElementById("myModal");

	// Get the button that opens the modal
	var btn = document.getElementById("myBtn");

	// Get the <span> element that closes the modal
	var span = document.getElementsByClassName("close")[0];

	// When the user clicks on <span> (x), close the modal
	span.onclick = function () {
		modal.style.display = "none";
	}

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function (event) {
		if (event.target == modal) {
			modal.style.display = "none";
		}
	}
})


var fade_out = function() {
    $("#paraVideoText").fadeOut().empty();
  }

  setTimeout(fade_out, 10000);
