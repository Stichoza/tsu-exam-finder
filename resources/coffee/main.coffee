# Floatlabels
$ '.floatlabel'
    .floatlabel()

# Because floatlabels disable default functionality
$ '[autofocus]'
    .focus()

# Space key handling
$ '#input-name'
    .keypress (event) ->
        if (event.keyCode == 32)
            $ '#input-last'
                .focus()
            event.preventDefault()

# Timepicker
$ '.ui-clickable.time'
    .click (event) ->
        swal
            title: 'მიუთითე დრო'
            text: $('.timer-source').html()
            html: yes

GeoKBD.mapFields(document.querySelectorAll('#input-name, #input-last'), 'KA')
