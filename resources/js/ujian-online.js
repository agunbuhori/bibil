var formNow = '';
(function() {
    window.formNow = $('form[data-remote]');

    if ($(window).scrollTop() > 116) {
        $('.navbar-soal').show()
    } else {
        $('.navbar-soal').hide()
    }

    $('.btn-panel-soal').on('click', function () {
        if (parseInt($(this).attr('buka')) == 1) {
            $(this).attr('buka', 0)
                   .find('i')
                   .removeClass('ion-ios-arrow-back')
                   .addClass('ion-ios-arrow-forward')
            $('.list-daftar-soal').animate({right: '-10px'});   
        } else {
            $(this).attr('buka', 1)
                   .find('i')
                   .removeClass('ion-ios-arrow-forward')
                   .addClass('ion-ios-arrow-back')
            $('.list-daftar-soal').animate({right: '-335px'});
        }
    })

    var countDownDate = new Date(window.timeUjianEnd).getTime();
    let x = setInterval(function() {
        let now = new Date().getTime();
        let distance = countDownDate - now;
        let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        
        if (hours < 10) hours = '0' + hours;
        if (minutes < 10) minutes = '0' + minutes;

        $('.waktu').text(hours + ":" + minutes)

        if (distance < 0) {
            clearInterval(x);
            
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': window.TOKEN_WEB
                },
                type: "GET",
                url: url,
                dataType: 'json',
                success: (response) => {
                    if (response.status) {
                        Swal.fire({
                            title: 'Waktu Anda Telah Habis',
                            text: 'Terima Kasih Sudah Melakukan Ujian Ini',
                            type: 'info',
                            focusConfirm: false,
                            allowOutsideClick: false
                        }).then((result) => {
                            window.location.replace(window.BASE_URL)
                        })
                    } else {
                        Swal.fire("Gagal", response.message, "error");
                    }
                },
                error: (response) => {
                    Swal.fire(response.statusText, "Error Code " + response.status, "error");
                }
            })
        }
    }, 1000);

    $('.box-body').slick({
        dots: false,
        infinite: false,
        speed: 100,
        fade: true,
        swipe: false,
        cssEase: 'linear',
        adaptiveHeight: true,
        prevArrow: $('.btn-previous'),
        nextArrow: $('.btn-next')
    })
})()

$(window).scroll(function () {
    if ($(window).scrollTop() > 116) {
        $('.navbar-soal').show()
    } else {
        $('.navbar-soal').hide()
    }
})

function sizeFont(that, sizeFont) {
    $('.text-12').removeClass('active')
    $('.text-14').removeClass('active')
    $('.text-16').removeClass('active')

    $(that).addClass('active')
    
    $('.soal').css('font-size', sizeFont + 'px')
    $('.jawaban').css('font-size', sizeFont + 'px')
}

$('.box-body').on('beforeChange', function(event, slick, currentSlide, nextSlide){
    let form = $(slick.$slides[currentSlide]),
        data = CKEDITOR.instances.jawabanessay.getData()
    
    CKEDITOR.instances.jawabanessay.setData(null)

    form.find('[name="jawaban_essay"]').val(data)
    form.submit()
})

$('.box-body').on('afterChange', function(event, slick, currentSlide){
    let form  = $(slick.$slides[currentSlide]),
        id    = form.data('remote'),
        jenis = form.data('jenis'),
        ragu  = form.find('[name="ragu"]').val(),
        jawab = form.find('[name="jawaban_essay"]').val(),
        btn   = $('.btn-confuse').find('input:checkbox')

    if (ragu == 1) {        
        btn.prop('checked', true)
    } else {
        btn.prop('checked', false)
    }

    if (jenis == 'ganda') {
        $('.box-jawaban-essay').hide();
    } else {
        $('.box-jawaban-essay').show();
        CKEDITOR.instances.jawabanessay.setData(jawab)
    }

    window.formNow = form
    
    $('.nomor').text(currentSlide + 1)
    $('[id^="btn-soal"]').removeClass('saat-ini')
    $('#btn-soal-' + id).addClass('saat-ini')

    if (slick.slideCount - 1 == currentSlide) {
        $('#col-next').hide()
        $('#col-selesai').show()
    } else {
        $('#col-next').show()
        $('#col-selesai').hide()
    }
})

$('.btn-confuse').on('click', function() {
    let ragu = $(this).find('input:checkbox')
    
    if (ragu.prop('checked')) {
        ragu.prop('checked', false)
        window.formNow.find('[name="ragu"]').val(0)
    } else {
        ragu.prop('checked', true)
        window.formNow.find('[name="ragu"]').val(1)
    }
})

$('form[data-remote]').on('submit', function (e) {
    e.preventDefault()

    let form  = $(this),
        id    = form.data('remote'),
        jenis = form.data('jenis'),
        url   = window.BASE_URL + '/ujian/online/' + id,
        data  = new FormData(this)

    Swal.fire({
        customClass: {
            actions: 'swal2-icon-size',
            popup: 'swal2-bg'
        },
        onBeforeOpen: () => {
            Swal.showLoading()
            
            let checkJenis = (jenis == 'ganda') ? null : '';

            if (data.get('jawaban_' + jenis) !== checkJenis) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': window.TOKEN_WEB
                    },
                    type: "POST",
                    url: url,
                    data: data,
                    dataType: 'json',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: (response) => {
                        if (response.data.ragu == 0) {
                            let btnSoal = $('#btn-soal-' + response.data.soal_id)
                                    .removeClass('ragu')
                                    .addClass('terjawab')

                            if (response.data.jenis_soal == 'ganda')
                            btnSoal.find('.btn-soal-jawaban').text(response.data.jawaban_ganda.toUpperCase());
                        } else {
                            let btnSoal = $('#btn-soal-' + response.data.soal_id)
                                    .removeClass('terjawab')
                                    .addClass('ragu')

                            if (response.data.jenis_soal == 'ganda')
                            btnSoal.find('.btn-soal-jawaban').text(response.data.jawaban_ganda.toUpperCase());
                        }
                        
                        swal.close()
                    },
                    error: (response) => {
                        Swal.fire(response.statusText, "Error Code " + response.status, "error");
                    }
                })
            } else {
                swal.close()
            }
        }
    })
})

$('button[data-slide]').click(function(e) {
    e.preventDefault();
    let slideno = $(this).data('slide');
    $('.box-body').slick('slickGoTo', slideno - 1);
})

$('.btn-selesai').on('click', function () {
    let id = $(this).data('jawaban')
    checkAllJawaban(id)
})

function checkAllJawaban(id) {
    let data = CKEDITOR.instances.jawabanessay.getData(),
        dataForm = window.formNow.find('[name="jawaban_essay"]').val(),
        ajaxComplete = false
    
    if (data != dataForm && data != '') {
        window.formNow.find('[name="jawaban_essay"]').val(data)
        window.formNow.submit()
        console.log('beda');
    } else {
        console.log('sama');
        ajaxComplete = true
    }

    let result = 0
    $('form[name^="soal-ganda"]').each(function() {
        let ganda = $(this).find('[name="jawaban_ganda"]').val(),
            ragu  = $(this).find('[name="ragu"]').val()
        if (ganda === null || ragu == 1) {
            result = 1
            return false
        }
    })

    $('form[name^="soal-essay"]').each(function() {
        let essay = $(this).find('[name="jawaban_essay"]').val(),
            ragu  = $(this).find('[name="ragu"]').val()
        if (essay === '' || ragu == 1) {
            result = 1
            return false
        }
    })

    if (result !== 1) {
        if (ajaxComplete) {
            selesaiSemua(id)
        } else {
            $(document).ajaxComplete(function(e) {
                $(e.currentTarget).unbind('ajaxComplete')
                selesaiSemua(id)
            })   
        }
    } else {
        Swal.fire('Belum Selesai', 'Soal masih ada yang belum di jawab atau masih ragu - ragu, silahkan cek kembali', 'error');
    }
}

function selesaiSemua(id) {
    Swal.fire({
        title: 'Kirim Jawaban Anda ?',
        text: 'Jika anda sudah yakin dengan seluruh jawaban anda, silahkan kirim jawaban dengan click OK',
        type: 'info',
        showCancelButton: true,
        focusConfirm: false,
        allowOutsideClick: false
    }).then((result) => {
        let url = window.BASE_URL + '/ujian/online/selesai/' + id

        if (result.value) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': window.TOKEN_WEB
                },
                type: "GET",
                url: url,
                dataType: 'json',
                success: (response) => {
                    Swal.fire({
                        customClass: {
                            actions: 'swal2-icon-size',
                            popup: 'swal2-bg'
                        },
                        onBeforeOpen: () => {
                            Swal.showLoading()
                        }
                    })

                    if (response.status) {
                        window.location.replace(window.BASE_URL)
                    } else {
                        Swal.fire("Gagal", response.message, "error");
                    }
                },
                error: (response) => {
                    Swal.fire(response.statusText, "Error Code " + response.status, "error");
                }
            })
        }
    })
}