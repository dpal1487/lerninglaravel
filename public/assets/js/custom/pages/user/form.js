"use strict";

// Class definition
var KTSigninGeneral = function() {
    // Elements
    var form = document.getElementById('user_form');
    var submitButton =document.getElementById('submit');

    var validator;




    // const form = document.getElementById('kt_ecommerce_add_category_form');
    // const submitButton = document.getElementById('submit');


    // Handle form
    var handleForm = function(e) {
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validator = FormValidation.formValidation(
			form,
			{
				fields: {
                    name: {
                        validators: {
                            notEmpty: {
                                message: 'The Name field is required'
                            }
                        }
                    },

                    email: {
                        validators: {
                            notEmpty: {
                                message: 'The Email field is required'
                            }
                        }
                    },
                    // password: {
                    //     validators: {
                    //         notEmpty: {
                    //             message: 'The Password field is required'
                    //         }
                    //     }
                    // },
                    shift_time:{
                        validators: {
                            notEmpty: {
                                message: 'The shift time field is required'
                            }
                        }
                    }
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
                        eleInvalidClass: '',  // comment to enable invalid state icons
                        eleValidClass: '' // comment to enable valid state icons
                    })
				}
			}
		);

        // Handle form submit
        submitButton.addEventListener('click', function (e) {
            // Prevent button default action



            e.preventDefault();

            validator.validate().then(function (status) {
                if (status == 'Valid') {
                    // blockUI.block();

                    // Show loading indication
                    submitButton.setAttribute('data-kt-indicator', 'on');

                    // Disable button to avoid multiple click
                    submitButton.disabled = true;
                    axios.post(form.getAttribute("action"), new FormData(form)).then((response)=>{
                        Swal.fire({
                            text: response.data.message,
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        }).then(function (result) {
                            // console.log(result);
                            if(result.value){
                                window.location.assign('/user');
                            }
                        })
                    }).catch((error)=>{

                        if (error.response.status === 422) {  // Validation error
                            let errorMessages = error.response.data.errors;
                            for (let field in errorMessages) {
                                errorMessages[field].forEach(error => {
                                    toastr.error(error);
                                });
                            }
                        } else {
                            toastr.error('An unexpected error occurred. Please try again.');
                        }
                    }).finally(()=>{
                        submitButton.disabled = false
                        submitButton.setAttribute('data-kt-indicator', 'off');
                    // blockUI.release();

                    })
                } else {
                    // Show error popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                    Swal.fire({
                        text: "Sorry, looks like there are some errors detected, please try again.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    });
                }
            });
		});
    }

    // Public functions
    return {
        // Initialization
        init: function() {
            form = document.querySelector('#user_form');
            submitButton = document.querySelector('#submit');

            handleForm();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function() {
    KTSigninGeneral.init();

    $('#imageInput').change(async function () {
        const file = this.files[0];
        console.log("see event", file);
        const data = new FormData();

        data.append('image', file);
        blockUI.block();
        try {
            let response = await axios.post('/upload/banner',
                data, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }).then((response) => {
                $("#image_id").val(response.data.data.id)
            }).finally(()=>{
                blockUI.release()
            });

            // window.location.reload();
        } catch (error) {
            console.log(error);
        }
        console.log("see response", response.data);
    });


});
