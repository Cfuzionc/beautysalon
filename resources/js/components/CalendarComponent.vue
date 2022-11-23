<template>
    <FullCalendar :options="calendarOptions" />

</template>
<script>
import FullCalendar from '@fullcalendar/vue3'
import dayGridPlugin from '@fullcalendar/daygrid'
import interactionPlugin from '@fullcalendar/interaction'

export default

    {

        props: [],
        components: {
            FullCalendar // make the <FullCalendar> tag available
        },
        data()
        {
            return {
                begin_date: "",
                end_date: "",
                messages: [],
                calendarOptions: {
                    plugins: [dayGridPlugin, interactionPlugin],
                    initialView: 'dayGridMonth'
                }
            }
        },
        created()
        {
            this.fetchReservations()
        },
        methods: {
            fetchReservations: function ()
            {
                axios.post('/api/reservation/active').then(response =>
                {
                    this.activeReservations = response.data
                })
                console.log(this.activeReservations)
            },

            createReservation: function ()
            {
                const data =
                {
                    begin_date: this.begin_date,
                    end_date: this.end_date
                }
                axios.post('/api/reservation/create', data).then(response =>
                {
                    this.messages = response.data
                })
                console.log(this.messages)
            }
        }
    }

</script>
