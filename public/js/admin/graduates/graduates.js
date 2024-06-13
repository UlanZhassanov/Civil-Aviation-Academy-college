function typeFunc() {
	if (document.getElementById('type').value === "1") {

		document.getElementById('groupeBlock').classList.remove('disabled')
		document.getElementById('groupe').value = "";

		document.getElementById('specialityBlock').classList.remove('disabled')
		document.getElementById('speciality').value = "";

        document.getElementById('edu_programBlock').classList.remove('disabled')
		document.getElementById('edu_program').value = "";

		document.getElementById('edu_directionBlock').classList.add('disabled')
		document.getElementById('edu_direction').value = "";

		document.getElementById('op_groupBlock').classList.add('disabled')
		document.getElementById('op_group').value = "";

		document.getElementById('international_grantBlock').classList.remove('disabled')
		document.getElementById('international_grant').value = "0";
        document.getElementById('international_grant').required = true

		document.getElementById('edu_formBlock').classList.remove('disabled')
		document.getElementById('edu_form').value = "";

		document.getElementById('continue_educationBlock').classList.remove('disabled')
		document.getElementById('continue_education').value = "";

		document.getElementById('employment_typeBlock').classList.remove('disabled')
		document.getElementById('employment_type').value = "";

		document.getElementById('have_portfolioBlock').classList.remove('disabled')
		document.getElementById('have_portfolio').value = "";

		document.getElementById('portfolio_docBlock').classList.remove('disabled')
		document.getElementById('portfolio_doc').value = "";

		document.getElementById('directionBlock').classList.remove('disabled')
		document.getElementById('direction').value = "0";

		document.getElementById('direction_place1Block').classList.remove('disabled')
		document.getElementById('direction_place1').value = "";

		document.getElementById('direction_place2Block').classList.remove('disabled')
		document.getElementById('direction_place2').value = "";

		document.getElementById('direction_place3Block').classList.remove('disabled')
		document.getElementById('direction_place3').value = "";
	}
	else if (document.getElementById('type').value === "2") {

		document.getElementById('groupeBlock').classList.remove('disabled')
		document.getElementById('groupe').value = "";

		document.getElementById('specialityBlock').classList.add('disabled')
		document.getElementById('speciality').value = "";

        document.getElementById('edu_programBlock').classList.add('disabled')
		document.getElementById('edu_program').value = "";

		document.getElementById('edu_directionBlock').classList.remove('disabled')
		document.getElementById('edu_direction').value = "";

		document.getElementById('op_groupBlock').classList.remove('disabled')
		document.getElementById('op_group').value = "";

		document.getElementById('international_grantBlock').classList.add('disabled')
		document.getElementById('international_grant').value = "0";
        document.getElementById('international_grant').required = false

		document.getElementById('edu_formBlock').classList.add('disabled')
		document.getElementById('edu_form').value = "";

		document.getElementById('continue_educationBlock').classList.remove('disabled')
		document.getElementById('continue_education').value = "";

		document.getElementById('employment_typeBlock').classList.remove('disabled')
		document.getElementById('employment_type').value = "";

		document.getElementById('have_portfolioBlock').classList.remove('disabled')
		document.getElementById('have_portfolio').value = "";

		document.getElementById('portfolio_docBlock').classList.remove('disabled')
		document.getElementById('portfolio_doc').value = "";

		document.getElementById('directionBlock').classList.remove('disabled')
		document.getElementById('direction').value = "0";

		document.getElementById('direction_place1Block').classList.remove('disabled')
		document.getElementById('direction_place1').value = "";

		document.getElementById('direction_place2Block').classList.remove('disabled')
		document.getElementById('direction_place2').value = "";

		document.getElementById('direction_place3Block').classList.remove('disabled')
		document.getElementById('direction_place3').value = "";
	}
	else if (document.getElementById('type').value === "3") {

		document.getElementById('groupeBlock').classList.add('disabled')
		document.getElementById('groupe').value = "";

		document.getElementById('specialityBlock').classList.add('disabled')
		document.getElementById('speciality').value = "";

        document.getElementById('edu_programBlock').classList.remove('disabled')
		document.getElementById('edu_program').value = "";

		document.getElementById('edu_directionBlock').classList.add('disabled')
		document.getElementById('edu_direction').value = "";

		document.getElementById('op_groupBlock').classList.add('disabled')
		document.getElementById('op_group').value = "";

		document.getElementById('international_grantBlock').classList.add('disabled')
		document.getElementById('international_grant').value = "0";
        document.getElementById('international_grant').required = false

		document.getElementById('edu_formBlock').classList.add('disabled')
		document.getElementById('edu_form').value = "";

		document.getElementById('continue_educationBlock').classList.add('disabled')
		document.getElementById('continue_education').value = "";

		document.getElementById('employment_typeBlock').classList.add('disabled')
		document.getElementById('employment_type').value = "";

		document.getElementById('have_portfolioBlock').classList.add('disabled')
		document.getElementById('have_portfolio').value = "";

		document.getElementById('portfolio_docBlock').classList.add('disabled')
		document.getElementById('portfolio_doc').value = "";

		document.getElementById('directionBlock').classList.add('disabled')
		document.getElementById('direction').value = "0";

		document.getElementById('direction_place1Block').classList.add('disabled')
		document.getElementById('direction_place1').value = "";

		document.getElementById('direction_place2Block').classList.add('disabled')
		document.getElementById('direction_place2').value = "";

		document.getElementById('direction_place3Block').classList.add('disabled')
		document.getElementById('direction_place3').value = "";
	}
}
