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
            if event.keyCode is 32
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

                timeInput.focus()

            , 300 # End timeout

    # Timepicker handling
    _ document
        .on 'change', '.sweet-alert .input-sweetalert-time', (event) ->

            newTime = _('.sweet-alert .input-sweetalert-time').val()

            _ '.input-dynamic-time'
                .not '.sweet-alert .input-sweetalert-time'
                .val newTime

            _ '.timer-source .input-dynamic-time'
                .attr 'value', newTime

            _ '.time.ui-clickable'
                .text newTime

    _ document
        .on 'click touchend', '.sweet-alert .btn-spinner', (event) ->
            event.preventDefault()
            input   = _('.sweet-alert .input-sweetalert-time')
            current = input.val()
            hours   = parseInt current.substr 0, 2
            minutes = parseInt current.substr 3, 2
            # TODO
            switch _(event.target).data 'spinner-fn'
                when 'h+'
                    hours = if hours < 20 then ++hours else 8
                    console.log hours
                when 'h-'
                    hours = if hours > 8  then --hours else 20
                    console.log hours
                when 'm+'
                    minutes = if minutes < 45 then minutes + 15 else 0
                    console.log minutes
                when 'm-'
                    minutes = if minutes >= 15 then minutes - 15 else 45
                    console.log minutes

            hours = '0' + hours if hours < 10
            minutes = '0' + minutes if minutes < 10

            input.val "#{hours}:#{minutes}"
                .trigger 'change'
            

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

    _ '#main-form'
        .submit (event) ->
            event.preventDefault()
            form = _ event.target
            swal
                title: 'ვეძებ :3'
                text: '<div class="timer-loader">'
                html: yes
                showConfirmButton: no
            _.post form.attr('action'), form.serialize(), (response) ->
                switch response.status
                    when 'error', 'not_found'
                        titles =
                            error: 'ცხრილი არ დევს'
                            not_found: 'ცხრილში ვერ გიპოვე'
                        texts =
                            error: '<b>თარიღი ხომ არ შეგეშალა?</b> შეიძლება ჯერ არ დადებულა ინფორმაცია, მოგვიანებით ნახე.'
                            not_found: 'სახელი და გვარი გადაამოწმე, ან იქნებ დრო მიუთითე შეცდომით? იმიტომ, რომ ცხრილში ვერ გნახე.'
                        swal
                            type: 'error'
                            title: titles[response.status]
                            text: texts[response.status] + """<br><br><span class="small-hint">
                                თუ ფიქრობ, რომ რამე შეცდომაა, მაშინ აბა
                                <a href="https://www.tsu.ge/ge/government/administration/departments/examcenter/semesterexam/exam_timetable"
                                target="_blank">აქ ნახე</a>, შეიძლება მანდ ეწეროს.</span>"""
                            html: yes
                    when 'found_one'
                        student = response.results[0]
                        swal
                            type: 'success'
                            title: "სექტორი #{student.sector}, ადგილი #{student.seat}"
                            text: "საგანი: <b>#{student.subject}</b><br>აბა წარმატებები!"
                            html: yes
                    when 'found_many'
                        text = ''
                        for i, student of response.results
                            text += "<hr><b>#{student.subject}</b><br>სექტორი #{student.sector}, ადგილი #{student.seat}"
                        swal
                            type: 'success'
                            title: "სეხნია/მოგვარე გყოლია :)"
                            text: "ნახე აბა რომელ საგანს წერ შენ:" + text
                            html: yes
            .fail () ->
                swal
                    type: 'error'
                    title: 'არ ვიცი რა მოხდა O.o'
                    text: 'მგონი ინტერნეტის პრობლემა უნდა იყოს. ხელახლა სცადე'
                        

