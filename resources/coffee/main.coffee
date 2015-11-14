$ '.ui-clickable.time'
    .click (event) ->
        swal
            title: 'მიუთითე დრო'
            text: $('.timer-source').html()
            html: yes

$ '.floatlabel'
    .floatlabel()