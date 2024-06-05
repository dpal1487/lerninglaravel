"use strict";

// Class definition
var KTSigninGeneral = function() {
    // Elements
    var form = document.getElementById('banner_form');
    var submitButton =document.getElementById('submit');

    var validator;





    // Handle form
    var handleForm = function(e) {
        validator = FormValidation.formValidation(
			form,
			{
				fields: {
                    title: {
                        validators: {
                            notEmpty: {
                                message: 'The Title field is required'
                            }
                        }
                    },

                    description: {
                        validators: {
                            notEmpty: {
                                message: 'The Description field is required'
                            }
                        }
                    },
                    url: {
                        validators: {
                            notEmpty: {
                                message: 'The Url field is required'
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
                    blockUI.block();

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
                            if(result.value){
                                window.location.assign('/banner');
                            }
                        })
                    }).catch((error)=>{
                        if (error.response.status == 400) {
                            toastr.error(error.response.data.message);
                          }
                    }).finally(()=>{
                        submitButton.disabled = false
                        submitButton.setAttribute('data-kt-indicator', 'off');
                    blockUI.release();

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
            form = document.querySelector('#banner_form');
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
"use strict";

// Class definition
var KTAttributeGeneral = function () {
    // Elements
    var form = document.getElementById('agent_form');
    var submitButton = document.getElementById('submit');

    var validator;

    const initRuleFormRepeater = () => {
        $('#add_rule_conditions').repeater({
            initEmpty: false,

            defaultValues: {
                'text-input': 'foo'
            },

            show: function () {
                $(this).slideDown();

                // Init select2 on new repeated items
                initConditionsSelect2();
            },

            hide: function (deleteElement) {
                $(this).slideUp(deleteElement);
            }
        });
    }


    // Handle form
    var handleForm = function (e) {
        validator = FormValidation.formValidation(
            form, {
                fields: {
                    customer_name: {
                        validators: {
                            notEmpty: {
                                message: 'The  Customer Name field is required'
                            }
                        }
                    },
                    company_cost: {
                        validators: {
                            notEmpty: {
                                message: 'The Company Cost is required'
                            }
                        }
                    },

                    mark_up: {
                        validators: {
                            notEmpty: {
                                message: 'The mark up field is required'
                            }
                        }
                    },
                    services: {
                        validators: {
                            notEmpty: {
                                message: 'The Services field is required'
                            }
                        }
                    },

                    date_of_travel: {
                        validators: {
                            notEmpty: {
                                message: 'The travel dates is required'
                            }
                        }
                    },

                },
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

                    submitButton.disabled = true;
                    axios.post(form.getAttribute("action"), new FormData(form)).then((response) => {
                        Swal.fire({
                            text: response.data.message,
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        }).then(function (result) {
                            if (result.value) {
                                window.location.assign('/agents');
                            }
                        })
                    }).catch((error) => {
                        if (error.response.status == 400) {
                            toastr.error(error.response.data.message);
                        }
                    }).finally(() => {
                        submitButton.disabled = false
                        submitButton.setAttribute('data-kt-indicator', 'off');
                        // blockUI.release();

                    })
                } else {
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
        init: function () {
            form = document.querySelector('#agent_form');
            submitButton = document.querySelector('#submit');

            handleForm();
            initRuleFormRepeater();
            initConditionsSelect2();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTAttributeGeneral.init();

});

const servicesContainer = document.getElementById('services');
const addServicesButton = document.getElementById('add-services');

const removeIcon = `
<svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" width="1.2em" height="1.2em" xmlns="http://www.w3.org/2000/svg"><path fill="none" d="M0 0h24v24H0z"></path><path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"></path></svg>
`;

const addIcon = `
<svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path fill="none" stroke-linecap="square" stroke-linejoin="round" stroke-width="32" d="M256 112v288m144-144H112"></path></svg>
`;

addServicesButton.addEventListener('click', addServicesCard);
iteneryForm.addEventListener('submit', handleSubmit);


addServicesButton.click();


function addServicesCard() {
    const servicesCard = document.createElement('div');
    servicesCard.className = 'services-card';

    const servicesIndex = servicesContainer.children.length;

    servicesCard.innerHTML = `
        <div class="card border-0 position-relative">
          <div class="card-header p-0 d-flex align-items-center justify-content-between" style="min-height:0">
            <div class="card-title m-0">Services ${servicesIndex +1}</div>
            <button type="button" class="remove-services btn text-danger">
              ${removeIcon}
            </button>
          </div>
          <div class="card-body p-0">
            <div class="row">
                <div class="col-md-6 w-100">
                    <div class="form-group">
                        <input class="form-control" type="text" name="services[${servicesIndex}][service_name]" required />
                    </div>
                </div>
            </div>
          </div>
        </div>
    `;

    servicesContainer.appendChild(servicesCard);

    const removeServicesButton = servicesCard.querySelector('.remove-services');

    removeServicesButton.addEventListener('click', () => servicesCard.remove());
}
