$(function () {

    // calc propertly vh
    let vh = window.innerHeight * 0.01;
    document.documentElement.style.setProperty('--vh', `${vh}px`);

    window.addEventListener('resize', () => {
        let vh = window.innerHeight * 0.01;
        document.documentElement.style.setProperty('--vh', `${vh}px`);
    });


    let phone = document.querySelector('input#phone');
    phone ? IMask(phone, {mask: '+{375}(00)000-00-00'}) : '';
    let mapBox = $("#mapBox").length ? $("#mapBox") : false, map,
        geoJson = {
            type: 'offices list',
            features: [
                {
                    type: 'office',
                    geometry: {
                        type: 'Point',
                        coordinates: [27.594750456034035, 53.93496402080706]
                    },
                    properties: {
                        title: 'Benjamin Moore Minsk'
                    }
                }
            ]
        }, formValidate = function (email) {
            return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email)
        };
    if (mapBox) {
        mapboxgl.accessToken = 'pk.eyJ1IjoiYnZ2ZWxsIiwiYSI6ImNraWx3NDFrcTBucG8yeXFqeGhvMjB4YTkifQ.5_bUEW5RptAvNz7g0Np_Jg';
        map = new mapboxgl.Map({
            container: 'mapBox',
            style: 'mapbox://styles/tsapch/ck4nrvfqb1fp71crzhx9so76k',
            center: [27.594750456034035, 53.93496402080706],
            zoom: 17
        });

        geoJson.features.forEach(function (marker) {
            let el = document.createElement('div');
            el.className = 'custom-marker';
            el.title = marker.properties.title
            new mapboxgl.Marker(el)
                .setLngLat(marker.geometry.coordinates)
                .addTo(map);
        });
    }

    $('.form').on('click', 'button', function (e) {
        e.preventDefault();
        let currentForm = $(this).parents('.form');
        let formData = currentForm.serializeArray();
        let emptyCount = 0;
        formData.forEach((formField) => {
            if (formField.name === 'name' && formField.value === '') {
                emptyCount += 1;
                $(this).parents('.form').find('.name__error').show()
            } else if (formField.name === 'name' && formField.value !== '') {
                $(this).parents('.form').find('.name__error').hide()
            }
            if (formField.name === 'email' && (formField.value === '' || !formValidate(formField.value))) {
                emptyCount += 1;
                $(this).parents('.form').find('.email__error').show()
            } else if (formField.name === 'email' && (formField.value !== '' || formValidate(formField.value))) {
                $(this).parents('.form').find('.email__error').hide()
            }

            if (formField.name === 'message' && formField.value === '') {
                emptyCount += 1;
                $(this).parents('.form').find('.message__error').show()
            } else if (formField.name === 'message' && formField.value !== '') {
                $(this).parents('.form').find('.message__error').hide()
            }
            if (formField.name === 'phone' && formField.value === '') {
                emptyCount += 1;
                $(this).parents('.form').find('.phone__error').show()
            } else if (formField.name === 'phone' && formField.value !== '') {
                $(this).parents('.form').find('.phone__error').hide()
            }
        });

        if (emptyCount === 0) {
            let data = {
                name: $('#name').val(),
                email: $('#email').val(),
                message: $('#message').val(),
                phone: $('#phone').val(),
                action: 'mail_before_submit',
                toemail: $('#contacmail').val(),
                _ajax_nonce: $('#my_email_ajax_nonce').data('nonce'),
            };
            jQuery.post(window.location.origin + "/wp-admin/admin-ajax.php", data, function (response) {
                $('#my_email_ajax_nonce').removeAttr('disabled');
                if (response === "email sent") {
                    $('.modal-contact').fadeOut();
                    $('.modal-success').fadeIn();
                    currentForm.trigger("reset");
                } else {
                    $('.tooltip').fadeIn();
                    setTimeout(function () {
                        $('.tooltip').fadeOut();
                    }, 5000)
                }
            });
        } else {
            console.warn('empty fields')
        }

        return false;
    })

    $('.modal-success .close-button').on('click', function () {
        $('html').removeClass('modal-open');
        $('.modal-success').fadeOut();
    });

    $('.images-selector-button').on('click', function () {
        $('.images-selector-button').removeClass('active')
        $(this).addClass('active');
        $('.images-list .image').hide();
        $('.images-list .image-' + $(this).data('image-id')).fadeIn();
		$('.images-selector .texts').hide();
        $('.images-selector .text-' + $(this).data('image-id')).fadeIn();
		let color =$(this).data('color');
		$('.select-color').css('color', color);
    })
	if($('.select-color').length){
		$('.select-color').css('color',$('.images-selector-button:first-child').data('color'));
	}
    $('.close-modal').on('click', function () {
        let iframe = $(this).parents('.modal').find('iframe');
        let iframeUrl = '';
        let form = $(this).parents('.modal').find('.form');
        form ? form.trigger("reset") : '';
        if (iframe) {
            iframeUrl = iframe.attr('src');
            setTimeout(function () {
                iframe.attr('src', '');
            }, 200)
            setTimeout(function () {
                iframe.attr('src', '');
                iframe.attr('src', iframeUrl);
            }, 500)
        }
        $('html').removeClass('modal-open');
        $('.modal').fadeOut();
    })
    $('.play-video').on('click', function () {
        $('html').addClass('modal-open');
        $('.modal-video').fadeIn();
    })

    $('.request-call').on('click', function () {
        $('html').addClass('modal-open');
        $('.modal-contact').fadeIn();
    })

    $('.menu-toggle').on('click', function () {
        $('html').addClass('modal-open');
        $('.modal-nav').fadeIn();
    })

    let transfer = ($('.product__price').data('usd') + $('.product__price').data('usd') * .015);
    let changeSum = function (a) {

        let count = $('.product__price').data('count');
        a ? count++ : count--;
        if (count <= 1) {
            $('.increment').attr("disabled", true);
        } else {
            $('.increment').attr("disabled", false);
        }
        $('.product__price').data('count', count);
        $('.count_val').val(count)
        $('.price__item').each(function () {
            let curPrice = $(this).data('price')
            let curPriceType = $(this).data('type');
            if (curPriceType === 'byn') {
                $(this).find('.ruble').html(Math.round(curPrice * count));
                transfer ? '' : $(this).find('.ruble').hide();
                transfer ? '' : $(this).find('.ruble-lav').hide();
                $(this).find('.usd').html(curPrice * count);
            } else {
                $(this).find('.ruble').html(Math.round(transfer * curPrice * count));
                transfer ? '' : $(this).find('.ruble').hide();
                transfer ? '' : $(this).find('.ruble-lav').hide();
                $(this).find('.usd').html(curPrice * count);
            }

        })
    }

    $('.increment').on('click', function () {
        changeSum(false);
    })

    $('.decrement').on('click', function () {
        changeSum(true);
    })

    changeSum(false);


    $('.select-type-button').on("click", function () {
        $('.select-type-button').removeClass('active')
        $(this).addClass('active');
        $('.price__item').hide();
        $('.price__item.' + $(this).data('price')).show();
    })
    $('.select-type-button:first-child').trigger('click');

    $('.tab-select').on('click', function () {
        $('.tab-select').removeClass('active')
        $(this).addClass('active')
        $(".tab").hide();
        $("#" + $(this).data('tab')).show();
    })

    $('.filter-content .close-modal').on('click', function () {
        $('.catalog__filter').fadeOut();
        $('html').removeClass('modal-open');
    });
    $('button.show-filter').on('click', function () {
        $('.catalog__filter').fadeIn();
        $('html').addClass('modal-open');

    });

    //calculator page
    let isSquare = false;
    $('.select-square').on('click', function () {
        $('.select-square').removeClass('active');
        $(this).addClass('active');
        if ($(this).data('square')) {
            isSquare = true;
            $('.squareRoom').show();
            $('.squareWidth').hide();
        } else {
            isSquare = false;
            $('.squareRoom').hide();
            $('.squareWidth').show();
        }
    })
    $('.calc_check').on('click', function () {
        let width = Number($('#width').val()),
            height = Number($('#height').val()),
            doors = Number($('#door').val()),
            windows = Number($('#window').val()),
            curSquare = Number($('#squareRoom').val());

        if (isSquare) {
            calculatorPaint(true, curSquare, doors, windows)
        } else {

            if (width !== 0 && height !== 0) {
                calculatorPaint(false, 0, doors, windows, width, height)
            }

        }


    })

    function pluralHelper(number, words) {
        return number % 10 === 1 && number % 100 !== 11 ? words[0] : number % 10 >= 2 && number % 10 <= 4 && (number % 100 < 10 || number % 100 >= 20) ? words[1] : words[2];
    }

    function calculatorPaint(formId, valSquare, valDoor, valWindow, valLength, valHeight) {
        /*
            площадь двери и окна
         */
        var squareDoor = 1.8;
        var squareWindow = 1.95;

        /*
            расход 1галлона и 1кварты
         */
        var squareGallon = 20;
        var squareQuart = 5;

        /*
                количество дверей
                площадь дверей
             */
        var amountDoor = Math.round(valDoor);
        var currentSquareDoor = amountDoor * squareDoor;

        /*
            количество окон
            площадь окон
         */
        var amountWindow = Math.round(valWindow);
        var currentSquareWindow = amountWindow * squareWindow;

        /*
            получение площади в зависимости от выбранного таба
         */
        var userSquare = 0;
        if (formId) {
            /*
                введенная площадь
                площадь за вычетов площади дверей и окон
             */
            userSquare = valSquare;
        } else {
            /*
                введенная длина
                введенная высота
                вычисленная площадь
             */
            var userLength = valLength;
            var userHeight = valHeight;
            userSquare = userLength * userHeight;
        }

        /*
            площадь за вычетов площади дверей и окон
         */
        var currentSquare = Math.round((userSquare - (currentSquareDoor + currentSquareWindow)) * 100) / 100;
        var currentQuartRound = 0;
        var currentGallonRound = 0;

        $('.squareUS').text(currentSquare);
        $('.labelUS').text(pluralHelper(currentSquare, ['квадратный метр', 'квадратных метра', 'квадратных метров']));

        if (currentSquare % 20 === 0) {
            currentGallonRound = Math.trunc(currentSquare / 20);
        } else {
            currentGallonRound = Math.trunc(currentSquare / 20)
            if (currentSquare % 20 >= 11) {
                currentGallonRound++
            } else if (currentSquare % 20 >= 6 && currentSquare % 20 <= 10) {
                currentQuartRound = 2;
            } else if (currentSquare % 20 >= 1 && currentSquare % 20 <= 5) {
                currentQuartRound = 1;
            }

        }

        if (currentQuartRound !== 0) {
            $('.quartus-wr').show();
            $('.quartus-wr .res_val').text(currentQuartRound);
            $('.quartus-wr .res_label').text(pluralHelper(currentQuartRound, ['кварта', 'кварты', 'квартов']));
        } else {
            $('.quartus-wr').hide();
        }

        if (currentGallonRound !== 0) {
            $('.gallon-wr').show();
            $('.gallon-wr .res_val').text(currentGallonRound);
            $('.gallon-wr .res_label').text(pluralHelper(currentGallonRound, ['галлон', 'галлона', 'галлонов']));
        } else {
            $('.gallon-wr').hide();
        }

    }

    $('.menu-item-has-children>a').on('click', function (e) {
        e.preventDefault();
        $(this).parents('.menu-item-has-children').toggleClass('open');
        $('.sub-menu').fadeToggle();
    })
    if ($('.catalog__content-text p').length > 1) {
        $('.show-more').addClass('visible')
    } else {
        $('.show-more').remove('visible')
    }
    $('.show-more').on('click', function () {
        $(this).toggleClass('open');
        $('.catalog__content-text').toggleClass('more');
    })
    $(window).scroll(function () {
        var scroll = $(window).scrollTop();
        var useElement = document.querySelector('header .logo').getElementsByTagName("use")[0];
        if (scroll >= 10) {
            $("header").addClass("darkHeader");
            if ($('header').hasClass('main')) {
                useElement.setAttributeNS('http://www.w3.org/1999/xlink', 'href', '#logo');
            }
        } else {
            $("header").removeClass("darkHeader");
            if ($('header').hasClass('main')) {
                useElement.setAttributeNS('http://www.w3.org/1999/xlink', 'href', '#logo-white');
            }
        }
    });
	    let cropText=$('.insta').text().replace('https://www.instagram.com/','@');
    $('.insta').text(cropText);
})
