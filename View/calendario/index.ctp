<?php
echo $this->Javascript->link('jquery-1.8.3.min.js');
echo $this->Javascript->link('select2.min.js');
echo $this->Javascript->link('select2_locale_es.js');
echo $this->Html->css('select2/select2.css', 'stylesheet', array("media"=>"all" ));
echo $this->Html->css('botones_bonitos');


$.getScript('http://arshaw.com/js/fullcalendar-1.6.4/fullcalendar/fullcalendar.min.js',function(){
  
  var date = new Date();
  var d = date.getDate();
  var m = date.getMonth();
  var y = date.getFullYear();
  
  $('#calendar').fullCalendar({
    header: {
      left: 'prev,next today',
      center: 'title',
      right: 'month,agendaWeek,agendaDay'
    },
    editable: true,
    events: [
      {
        title: 'All Day Event',
        start: new Date(y, m, 1)
      },
      {
        title: 'Long Event',
        start: new Date(y, m, d-5),
        end: new Date(y, m, d-2)
      },
      {
        id: 999,
        title: 'Repeating Event',
        start: new Date(y, m, d-3, 16, 0),
        allDay: false
      },
      {
        id: 999,
        title: 'Repeating Event',
        start: new Date(y, m, d+4, 16, 0),
        allDay: false
      },
      {
        title: 'Meeting',
        start: new Date(y, m, d, 10, 30),
        allDay: false
      },
      {
        title: 'Lunch',
        start: new Date(y, m, d, 12, 0),
        end: new Date(y, m, d, 14, 0),
        allDay: false
      },
      {
        title: 'Birthday Party',
        start: new Date(y, m, d+1, 19, 0),
        end: new Date(y, m, d+1, 22, 30),
        allDay: false
      },
      {
        title: 'Click for Google',
        start: new Date(y, m, 28),
        end: new Date(y, m, 29),
        url: 'http://google.com/'
      }
    ]
  });
})
?>

<?php $this->Paginator->options(array('url' => $this->passedArgs)); ?>
<div class="Buscars index">
        <ul id="navexp">
 
        </ul>
        <br/>
        <div class="Buscars buscar">
           <div class="container">
    <hr>
	<div id="calendar"></div>
</div>
        </div>
      
 	
</div>


		