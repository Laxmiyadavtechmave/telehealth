<script>
    /***************************** clinic schedules *******************/
    let applyAllSourceDay = null;

    $(document).ready(function() {
        const isEditPage = $('.time-slot').length > 0;
        const days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];

        // Apply All Checkbox
        $(document).on('change', '.apply-all', function() {
            const dayId = $(this).closest('.day-row').attr('id');

            if ($(this).is(':checked')) {
                applyAllSourceDay = dayId;

                setTimeout(() => {
                    copyTimeSlotsToAllDays(dayId);
                    // Check Apply on all other days too (visually only)
                    days.forEach(day => {
                        if (day !== dayId && !$('#NotAvailable' + (days.indexOf(day) +
                                1)).is(':checked')) {
                            $('#applyAll' + capitalize(day)).prop('checked', true);
                        }
                    });
                }, 100); // Delay in milliseconds
            } else {
                applyAllSourceDay = null;

                // Uncheck apply-all everywhere
                days.forEach(day => {
                    $('#applyAll' + capitalize(day)).prop('checked', false);
                });
            }
        });

        // Handle Not Available checkbox
        days.forEach((day, index) => {
            // Conditionally add default slot only for create
            if (!isEditPage) {
                addSlot(day);
            }
            $('#NotAvailable' + (index + 1)).on('change', function() {
                const $slots = $('#' + day + '-slots');
                const $addButton = $('#' + day + ' .addMultislot_button');
                const $applyAll = $('#applyAll' + capitalize(day));

                if ($(this).is(':checked')) {
                    $slots.hide();
                    $addButton.prop('disabled', true);
                    $applyAll.prop('checked', false).prop('disabled', true);
                } else {
                    $slots.show();
                    $addButton.prop('disabled', false);
                    $applyAll.prop('disabled', false);
                }
            });
        });


        $('.from-time, .to-time').each(function() {
            initializeTimePickers($(this));
        });

    });

    // Copy slots from sourceDay to other days except those marked Not Available
    function copyTimeSlotsToAllDays(sourceDay) {
        const days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];

        const $sourceSlots = $('#' + sourceDay + '-slots .time-slot');
        const slotsData = [];

        // Extract actual time values from the Flatpickr fields
        $sourceSlots.each(function() {
            const fromTime = $(this).find('.from-time').val();
            const toTime = $(this).find('.to-time').val();
            slotsData.push({
                from: fromTime,
                to: toTime
            });
        });


        // Apply to all other days
        days.forEach((day, index) => {
            if (day !== sourceDay && !$('#NotAvailable' + (index + 1)).is(':checked')) {
                const $target = $('#' + day + '-slots');
                $target.empty(); // Clear old slots
                slotsData.forEach((slot, idx) => {
                    const slotHTML = `
                    <div class="time-slot">
                        <input type="text" class="form-control from-time" value="${slot.from}" name="working_hours[${day}][slots][${idx}][from]"> to
                        <input type="text" class="form-control to-time" value="${slot.to}" name="working_hours[${day}][slots][${idx}][to]">
                        <button type="button" class="deleteslot" onclick="removeSlot(this)">
                            <iconify-icon icon="proicons:delete"></iconify-icon>
                        </button>
                    </div>
                `;
                    $target.append(slotHTML);
                });
            }
        });

        $('.from-time, .to-time').each(function() {
            initializeTimePickers($(this));
        });
    }



    // Add new time slot respecting Not Available
    function addSlot(day) {
        const days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
        const index = days.indexOf(day) + 1;

        if ($('#NotAvailable' + index).is(':checked')) {
            Swal.fire({
                toast: true,
                icon: 'error',
                title: `${capitalize(day)} is marked as Not Available.`,
                position: 'top-end',
                showConfirmButton: false,
                timer: 1500,
                timerProgressBar: true,
                background: '#fff',
                color: '#333',
            });
            return;
        }

        applyAllSourceDay = null;
        days.forEach(d => {
            $('#applyAll' + capitalize(d)).prop('checked', false);
        });


        const $container = $('#' + day + '-slots');
        const slotIndex = $container.find('.time-slot').length;
        const timeSlot = $(`
             <div class="time-slot">
            <input type="text" class="flatpickr-input form-control from-time" name="working_hours[${day}][slots][${slotIndex}][from]"> to
            <input type="text" class="flatpickr-input form-control to-time" name="working_hours[${day}][slots][${slotIndex}][to]">
            <button type="button" class="deleteslot" onclick="removeSlot(this)"><iconify-icon icon="proicons:delete"></iconify-icon></button>
        </div>
        `);
        $container.append(timeSlot);
        initializeTimePickers(timeSlot.find('.from-time'));
        initializeTimePickers(timeSlot.find('.to-time'));

        // If apply-all is active and current day is the source, propagate to others
        if (applyAllSourceDay === day) {
            copyTimeSlotsToAllDays(day);
        }
    }

    function removeSlot(button) {
        const $btn = $(button);
        const $slot = $btn.closest('.time-slot');
        const $dayRow = $btn.closest('.day-row');
        const dayId = $dayRow.attr('id'); // e.g. "monday"

        // Check if 'apply all' checkbox is checked on this day
        const applyAllChecked = $('#applyAll' + capitalize(dayId)).is(':checked');

        if (applyAllChecked) {
            // Remove the slot with the same index in all days
            const slotIndex = $slot.index();

            const days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];

            days.forEach(day => {
                const $daySlots = $('#' + day + '-slots');
                const $slotToRemove = $daySlots.find('.time-slot').eq(slotIndex);
                if ($slotToRemove.length) {
                    $slotToRemove.remove();
                }
            });
        } else {
            // Remove slot only in current day
            $slot.remove();
        }
    }

    function capitalize(word) {
        return word.charAt(0).toUpperCase() + word.slice(1);
    }

    // Initialize flatpickr on all inputs not yet initialized
    function initializeTimePickers(input) {
        if (!input || input.length === 0) return; // <-- prevent error if input is empty

        if (!input[0]._flatpickr) {
            flatpickr(input[0], {
                enableTime: true,
                noCalendar: true,
                dateFormat: "h:i K",
                defaultDate: input.val() ? input.val() : "09:00",
                minuteIncrement: 1,
                onChange: validateTimeSlot
            });
        }
    }

    function validateTimeSlot(selectedDates, dateStr, instance) {
        const $slot = $(instance.element).closest('.time-slot');
        const from = $slot.find('.from-time').val();
        const to = $slot.find('.to-time').val();

        if (from && to) {
            const fromTime = parseTime(from);
            const toTime = parseTime(to);

            if (fromTime >= toTime) {
                Swal.fire({
                    toast: true,
                    icon: 'error',
                    title: 'End time must be after start time!',
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                    background: '#fff',
                    color: '#333',
                });
                $(instance.element).val('');
            }
        }
    }

    function parseTime(timeStr) {
        const [time, meridian] = timeStr.split(' ');
        let [hours, minutes] = time.split(':').map(Number);

        if (meridian === 'PM' && hours !== 12) hours += 12;
        if (meridian === 'AM' && hours === 12) hours = 0;

        return hours * 60 + minutes;
    }

    const dayToCheckboxId = {
        monday: '#NotAvailable1',
        tuesday: '#NotAvailable2',
        wednesday: '#NotAvailable3',
        thursday: '#NotAvailable4',
        friday: '#NotAvailable5',
        saturday: '#NotAvailable6',
        sunday: '#NotAvailable7'
    };

    const days = Object.keys(dayToCheckboxId);

    let debounceTimer = null;

    $(document).on('change', '.from-time, .to-time', function() {
        const $input = $(this);
        const isFrom = $input.hasClass('from-time');
        const $timeSlot = $input.closest('.time-slot');
        const timeIndex = $timeSlot.index();
        const newValue = $input.val();

        const $dayRow = $input.closest('.day-row');
        const sourceDay = $dayRow.attr('id'); // e.g., "wednesday"

        // Ensure Apply All is checked on this source day
        if (!$(`#applyAll${capitalize(sourceDay)}`).is(':checked')) return;

        clearTimeout(debounceTimer);
        debounceTimer = setTimeout(() => {
            days.forEach(day => {
                if (day === sourceDay) return;

                const applyAllChecked = $(`#applyAll${capitalize(day)}`).is(':checked');
                const notAvailableChecked = $(dayToCheckboxId[day]).is(':checked');

                if (applyAllChecked && !notAvailableChecked) {
                    const $targetSlot = $('#' + day + '-slots .time-slot').eq(timeIndex);

                    if ($targetSlot.length) {
                        const $targetInput = isFrom ?
                            $targetSlot.find('.from-time') :
                            $targetSlot.find('.to-time');

                        $targetInput.val(newValue); // Set raw value
                    }
                }
            });
        }, 200);
    });

    $('form').on('submit', function(e) {
        const days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
        let valid = true;
        let errorDays = [];

        let timeSlotErrors = [];

        days.forEach(day => {
            const slots = $('#' + day + '-slots .time-slot');
            const notAvailableChecked = $('#NotAvailable' + (days.indexOf(day) + 1)).is(':checked');

            if (slots.length === 0 && !notAvailableChecked) {
                valid = false;
                errorDays.push(day.charAt(0).toUpperCase() + day.slice(1));
            }

            // Time slot overlap and sequence check
            const slotTimes = [];
            let timeFormatError = false;

            slots.each(function(index) {
                if (notAvailableChecked) return;
                const from = $(this).find('.from-time').val();
                const to = $(this).find('.to-time').val();

                if (!from || !to) return;

                const fromMinutes = convertToMinutes(from);
                const toMinutes = convertToMinutes(to);

                if (fromMinutes >= toMinutes) {
                    valid = false;
                    timeSlotErrors.push(
                        `${capitalize(day)} slot : "From" time must be before "To" time.`
                    );
                    timeFormatError = true;
                }

                for (let prev of slotTimes) {
                    if (!(toMinutes <= prev.from || fromMinutes >= prev.to)) {
                        valid = false;
                        timeSlotErrors.push(
                            `${capitalize(day)}: ${from} - ${to} overlaps with ${prev.originalFrom} - ${prev.originalTo}`
                        );
                        timeFormatError = true;
                    }
                }

                slotTimes.push({
                    from: fromMinutes,
                    to: toMinutes,
                    originalFrom: from,
                    originalTo: to
                });
            });
        });

        if (!valid) {
            e.preventDefault(); // prevent form submission

            let message = "";

            if (errorDays.length > 0) {
                message += `Please add time slots or select "Not Available" for: ${errorDays.join(', ')}.\n`;
            }

            if (timeSlotErrors.length > 0) {
                message += timeSlotErrors.join('\n');
            }

            Swal.fire({
                icon: 'error',
                title: 'Validation Error',
                html: message.replace(/\n/g, '<br>'),
                confirmButtonText: 'OK',
                background: '#fff',
                color: '#333'
            });
        }
    });

    // Utility: Convert time string (e.g. 9:00 AM) to total minutes
    function convertToMinutes(timeStr) {
        const date = new Date("1970-01-01 " + timeStr);
        return date.getHours() * 60 + date.getMinutes();
    }
</script>
