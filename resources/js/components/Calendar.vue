<template>
   <div>
      <FullCalendar
      :options="options"
      defaultView="dayGridMonth"
      :plugins="calendarPlugins" />
   </div>
</template>

<script>
import FullCalendar from '@fullcalendar/vue'
import dayGridPlugin from '@fullcalendar/daygrid'

export default {
   components: {
      FullCalendar // make the <FullCalendar> tag available
   },
   data() {
      return {
         calendarPlugins: [ dayGridPlugin ],
         options: {
            locale: 'kk',
         }
      }
   }
}

</script>


<style lang='scss'>

@import '~@fullcalendar/core/main.css';
@import '~@fullcalendar/daygrid/main.css';

</style>
