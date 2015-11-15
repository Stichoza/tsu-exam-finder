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

            # Inputmask
            setTimeout ->
                timeInput = _ '.sweet-alert .input-sweetalert-time'
                timeInput.inputmask 'hh:mm' # Initialize inputmask
                timeInput = document.querySelector '.sweet-alert .input-sweetalert-time'

                if timeInput.createTextRange
                    part = timeInput.createTextRange()
                    part.move 'character', 0
                    part.select()
                else if timeInput.setSelectionRange
                    timeInput.setSelectionRange 0, 1

                console.log timeInput.createTextRange
                console.log timeInput.setSelectionRange

                timeInput.focus()

            , 300 # End timeout

    # Timepicker handling
    _ document
        .on 'change', '.sweet-alert .input-sweetalert-time', (event) ->

            newTime = _('.sweet-alert .input-sweetalert-time').val()

            _ '.input-dynamic-time'
                .not '.sweet-alert .input-sweetalert-time'
                .val newTime

            _ '.time.ui-clickable'
                .text newTime

    # GeoKBD
    GeoKBD.mapFields document.querySelectorAll('#input-name, #input-last'), 'KA'

    # Date switcher
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

