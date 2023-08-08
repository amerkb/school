<div>
    <div>
        <div id='calendar-container' wire:ignore>
            <div id='calendar'></div>
        </div>
    </div>
    @push('scripts')
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.3.1/main.min.js'></script>

        <script>
            document.addEventListener('livewire:load', function() {
                var Calendar = FullCalendar.Calendar;
                var Draggable = FullCalendar.Draggable;
                var calendarEl = document.getElementById('calendar');
                var checkbox = document.getElementById('drop-remove');
                var data =   @this.events;
                var x=0;
                var calendar = new Calendar(calendarEl, {
                    events: JSON.parse(data),
                    dateClick(info)  {
                        var title = prompt('ادخل عنوان الحدث ');
                        var description = prompt('ادخل وصف الحدث ');
                        var dateFormat = /^(\d{4})-(\d{1,2})-(\d{1,2})$/; // define the desired date format
                        var end = prompt('Enter the event end date and time (format:  2023-06-04'); // prompt the user to enter the end date and time

// validate the input date format and create a Date object
                        if (dateFormat.test(end)) {
                            var endDate = new Date(end.replace(/(\d{4})-(\d{1,2})-(\d{1,2})/, '$1-$2-$3')); // convert the input date to a Date object

                            // check if the Date object was successfully created
                            if (!isNaN(endDate.getTime())) {
                                console.log('The event end date is:', endDate);
                                // perform other actions using the endDate variable
                            } else {
                                x=1
                                alert('Invalid date format. Please enter a valid date and time in the format: MM/DD/YYYY HH:MM:SS');
                            }
                        } else {
                            x=1
                            alert('Invalid date format. Please enter the date and time in the format:y-m-d');
                        }
                        var date = new Date(info.dateStr);
                        if(title != null && title != '' && description != null && description != ''&& x==0){
                            calendar.addEvent({
                                title: title,
                                start: date,
                                allDay: true
                            });
                            var eventAdd = {title: title,start: date,description:description,end:end};
                        @this.addevent(eventAdd);
                            alert('تم اضافة الحدث بنجاح');
                        }else{
                            x=0
                            alert('هناك خطا بادخال البيانيات');
                        }
                    },
                    editable: true,
                    selectable: true,
                    displayEventTime: false,
                    droppable: true, // this allows things to be dropped onto the calendar
                    drop: function(info) {
                        // is the "remove after drop" checkbox checked?
                        if (checkbox.checked) {
                            // if so, remove the element from the "Draggable Events" list
                            info.draggedEl.parentNode.removeChild(info.draggedEl);
                        }
                    },
                    eventDrop: info => @this.eventDrop(info.event, info.oldEvent),
                    loading: function(isLoading) {
                        if (!isLoading) {
                            // Reset custom events
                            this.getEvents().forEach(function(e){
                                if (e.source === null) {
                                    e.remove();
                                }
                            });
                        }
                    }
                });
                calendar.render();
            @this.on(`refreshCalendar`, () => {
                calendar.refetchEvents()
            });
            });
        </script>
        <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.3.1/main.min.css' rel='stylesheet' />
    @endpush
</div>
