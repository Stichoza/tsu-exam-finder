jQuery (_) ->
    # Floatlabels
    _ '.floatlabel'
        .floatlabel()

    # Because floatlabels disable default functionality
    _ '[autofocus]'
        .focus()

    # Space key handling
    _ '#input-name'
        .keypress (event) ->
            if (event.keyCode == 32)
                _ '#input-last'
                    .focus()
                event.preventDefault()

    # Timepicker
    _ '.ui-clickable.time'
        .click (event) ->
            swal
                title: 'მიუთითე დრო'
                text: _('.timer-source').html()
                html: yes

    # GeoKBD
    GeoKBD.mapFields document.querySelectorAll('#input-name, #input-last'), 'KA'

    _ '.ui-clickable.date'
        .click (event) ->
            _(@)
                .find '.hidden'
                .addClass 'tmp'
                .parent()
                .find '.active'
                .addClass 'hidden'
                .removeClass 'active'
                .parent()
                .find '.tmp'
                .addClass 'active'
                .removeClass 'hidden'
                .removeClass 'tmp'

            _ '.input-dynamic-date'
                .val _(@).find('.active').data 'value'