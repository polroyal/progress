
<?php echo '<script type="text/javascript">'; ?>
function  init_calendar() {
	if( typeof ($.fn.fullCalendar) === 'undefined'){ return; }
	console.log('init_calendar');
		
	var date = new Date(),
		d = date.getDate(),
		m = date.getMonth(),
		y = date.getFullYear(),
		started,
		categoryClass;

	var calendar = $('#calendar').fullCalendar({
	  header: {
		left: 'prev,next today',
		center: 'title',
		right: 'month,agendaWeek,agendaDay,listMonth'
	  },
	  selectable: true,
	  selectHelper: true,
	  select: function(start, end, allDay) {
		$('#fc_create').click();

		started = start;
		ended = end;

		$(".antosubmit").on("click", function() {
		  var title = $("#title").val();
		  if (end) {
			ended = end;
		  }

		  categoryClass = $("#event_type").val();

		  if (title) {
			calendar.fullCalendar('renderEvent', {
				title: title,
				start: started,
				end: end,
				allDay: allDay
			  },
			  true // make the event "stick"
			);
		  }

		  $('#title').val('');

		  calendar.fullCalendar('unselect');

		  $('.antoclose').click();

		  return false;
		});
	  },
	  eventClick: function(calEvent, jsEvent, view) {		  
		$('#fc_edit').click();
		$('#title2').val(calEvent.title);

		categoryClass = $("#event_type").val();
		$(".antosubmit2").on("click", function() {
		  calEvent.title = $("#title2").val();
		  calendar.fullCalendar('updateEvent', calEvent);
		  $('.antoclose2').click();
		});

		calendar.fullCalendar('unselect');
	  },
	  editable: true,
	  events: [
	  <?php
	  $query = "SELECT * FROM request_v WHERE true ";
	  if (strtolower($_SESSION['leave_group']) == 'admin'){
		  
	  } else {
		  $query .= " AND user_id like '$_SESSION[leave_pj]'";
	  }
	  if (isset($_GET['st'])){
		  $query .= " AND status like '$_GET[st]' ";
	  }
	  $result = mysqli_query($conn, $query);
	  while ($row = mysqli_fetch_assoc($result)){ 
		  ?>
		  {
			title: '<?php echo $row['leave_type'] . ' (' . $row['fullname'] . ') ' . (($row['description'] == '') ? '' : ('for ' . $row['description'])); ?>',
			start: '<?php echo $row['start_date']; ?>',
			end: '<?php echo $row['end_date']; ?>'
		  },
		  <?php
	  }
	  ?>
	  ]
	});
};
	   
$(document).ready(function() {
	  init_calendar();
});
<?php echo '</script>'; ?>