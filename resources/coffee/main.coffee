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

    _ '#main-form'
        .submit (event) ->
            event.preventDefault()
            form = _ event.target
            swal
                title: '...'
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
                        

