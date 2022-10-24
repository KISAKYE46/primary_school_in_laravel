
<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="public/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="public/dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="public/dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="public/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="public/plugins/raphael/raphael.min.js"></script>
<script src="public/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="public/plugins/jquery-mapael/maps/world_countries.min.js"></script>
<!-- ChartJS -->
<script src="public/plugins/chart.js/Chart.min.js"></script>


<!-- ChartJS -->
<script src="public/plugins/chart.js/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
{{-- <script src="public/dist/js/pages/dashboard.js"></script> --}}

{{-- <script src="public/dist/js/pages/dashboard3.js"></script> --}}

<script src="public/plugins/flot/jquery.flot.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="public/plugins/flot-old/jquery.flot.resize.min.js"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="public/plugins/flot-old/jquery.flot.pie.min.js"></script>
<script src="public/plugins/chart.js/Chart.min.js"></script>
<script src="public/plugins/jquery-knob/jquery.knob.min.js"></script>

<!-- jQuery UI -->
<script src="public/plugins/jquery-ui/jquery-ui.min.js"></script>


<!-- DataTables -->
<script src="public/plugins/datatables/jquery.dataTables.js"></script>
<script src="public/plugins/datatables/dataTables.bootstrap4.js"></script>

<!-- Sparkline -->
<script src="public/plugins/sparklines/sparkline.js"></script>

<!-- FastClick -->
<script src="public/plugins/fastclick/fastclick.js"></script>

<!-- SweetAlert2 -->
<script src="public/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="public/plugins/toastr/toastr.min.js"></script>

<script src="public/dist/js/pages/pie.js"></script>
<script src="public/dist/js/custom.js"></script>

{{-- Full Calendar --}}
<script src="public/plugins/moment/moment.min.js"></script>
<script src="public/plugins/fullcalendar/main.min.js"></script>
<script src="public/plugins/fullcalendar-daygrid/main.min.js"></script>
<script src="public/plugins/fullcalendar-timegrid/main.min.js"></script>
<script src="public/plugins/fullcalendar-interaction/main.min.js"></script>
<script src="public/plugins/fullcalendar-bootstrap/main.min.js"></script>


</body>
</html>


 {{-- data-id="{{$payment->payment_id}}" data-table="payments" data-column="payment_id"--}}


<script>
  
  $(function () {
    // $(".table").DataTable();

    $(".table").addClass("text-sm data-table table-bordered border-dark");
    $(".btn").addClass("btn-sm");


    $(".btn").addClass("btn-sm");
    $(".form-control").addClass("input-sm");
  

   $(".modal-content,.card").css(
    {
      "border-radius":"max(1%,14px)"
    }
   );


   $("a").addClass("text-dark");
   $(".table").css({
    "min-height":"200px",
    "width":"100%"
   });

   $(".content-wrapper").css({
    "background-color":"white"
   })


    var tableOptions = {
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": true,
    };

    if(window.location.href.includes("marks")){
      tableOptions = {
      "paging": false,
      "lengthChange":false,
      "searching": false,
      "ordering": false,
      "info": false,
      "autoWidth": true,
    }

    }


    // $("#example3").DataTable(tableOptions);

    // $("#example4").DataTable(tableOptions);
    // $("#example1").DataTable(tableOptions);
    
    // $('#example2').DataTable({
    //   "paging": true,
    //   "lengthChange": false,
    //   "searching": false,
    //   "ordering": true,
    //   "info": true,
    //   "autoWidth": false,
    // });


    // $('#example2').DataTable();

   // $("#example2").DataTable();
    // $("#example5").DataTable(tableOptions);
    // $("#example6").DataTable(tableOptions);
    // $("#example7").DataTable(tableOptions);
    // $("#example8").DataTable(tableOptions);
    // $("#example10").DataTable(tableOptions);
    // $("#example9").DataTable(tableOptions);
    // $("#example11").DataTable(tableOptions);
    // $("#example12").DataTable(tableOptions);
    $(".data-table").DataTable(tableOptions);

  });
</script>



<script>

  var events = [];

  let count = 0;

</script>


@isset($events)
@foreach ($events as $event )
<script>

  events.push(
   {

    title:@json($event->event_name),
    start:@json($event->start_date),
    end:@json($event->end_date),
    backgroundColor: 'lightgreen', //red
    borderColor    : 'lightgreen' //red


   }
    
    );
</script>
@endforeach
@endisset

<script>
  $(function(){
    $(".loader-container").css({
      "display":"none"
    })
  })
</script>



<script>
  $(function () {

    /* initialize the external events
     -----------------------------------------------------------------*/
    function ini_events(ele) {
      ele.each(function () {

        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        }

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject)

        // make the event draggable using jQuery UI
        $(this).draggable({
          zIndex        : 1070,
          revert        : true, // will cause the event to go back to its
          revertDuration: 0  //  original position after the drag
        })

      })
    }

    ini_events($('#external-events div.external-event'))

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()

    var Calendar = FullCalendar.Calendar;
    var Draggable = FullCalendarInteraction.Draggable;

    var containerEl = document.getElementById('external-events');
    var checkbox = document.getElementById('drop-remove');
    var calendarEl = document.getElementById('calendar');

    // initialize the external events
    // -----------------------------------------------------------------

    new Draggable(containerEl, {
      itemSelector: '.external-event',
      eventData: function(eventEl) {
        console.log(eventEl);
        return {
          title: eventEl.innerText,
          backgroundColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
          borderColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
          textColor: window.getComputedStyle( eventEl ,null).getPropertyValue('color'),
        };
      }
    });

    var calendar = new Calendar(calendarEl, {
      plugins: [ 'bootstrap', 'interaction', 'dayGrid', 'timeGrid' ],
      header    : {
        left  : 'prev,next today',
        center: 'title',
        right : 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      //Random default events
      // events    : [
      //   {
      //     title          : 'All Day Event',
      //     start          : new Date(y, m, 1),
      //     backgroundColor: '#f56954', //red
      //     borderColor    : '#f56954' //red
      //   },
      //   {
      //     title          : 'Long Event',
      //     start          : new Date(y, m, d - 5),
      //     end            : new Date(y, m, d - 2),
         
      //   },
      //   {
      //     title          : 'Meeting',
      //     start          : new Date(y, m, d, 10, 30),
      //     allDay         : false,
      //     backgroundColor: '#0073b7', //Blue
      //     borderColor    : '#0073b7' //Blue
      //   },
      //   {
      //     title          : 'Lunch',
      //     start          : new Date(y, m, d, 12, 0),
      //     end            : new Date(y, m, d, 14, 0),
      //     allDay         : false,
      //     backgroundColor: '#00c0ef', //Info (aqua)
      //     borderColor    : '#00c0ef' //Info (aqua)
      //   },
      //   {
      //     title          : 'Birthday Party',
      //     start          : new Date(y, m, d + 1, 19, 0),
      //     end            : new Date(y, m, d + 1, 22, 30),
      //     allDay         : false,
      //     backgroundColor: '#00a65a', //Success (green)
      //     borderColor    : '#00a65a' //Success (green)
      //   },
      //   {
      //     title          : 'Click for Google',
      //     start          : new Date(y, m, 28),
      //     end            : new Date(y, m, 29),
      //     url            : 'http://google.com/',
      //     backgroundColor: '#3c8dbc', //Primary (light-blue)
      //     borderColor    : '#3c8dbc' //Primary (light-blue)
      //   }
      events :events,
      editable  : true,
      droppable : true, // this allows things to be dropped onto the calendar !!!
      drop      : function(info) {
        // is the "remove after drop" checkbox checked?
        if (checkbox.checked) {
          // if so, remove the element from the "Draggable Events" list
          info.draggedEl.parentNode.removeChild(info.draggedEl);



         
        }

        console.log(info.start);
        
      } ,
      
      edit:function(info){
        console.log(info);
      }
    });

    calendar.render();
    // $('#calendar').fullCalendar()

    /* ADDING EVENTS */
    var currColor = '#3c8dbc' //Red by default
    //Color chooser button
    var colorChooser = $('#color-chooser-btn')
    $('#color-chooser > li > a').click(function (e) {
      e.preventDefault()
      //Save color
      currColor = $(this).css('color')
      //Add color effect to button
      $('#add-new-event').css({
        'background-color': currColor,
        'border-color'    : currColor
      })
    })
    $('#add-new-event').click(function (e) {
      e.preventDefault()
      //Get value and make sure it is not null
      var val = $('#new-event').val()
      if (val.length == 0) {
        return
      }

      //Create events
      var event = $('<div />')
      event.css({
        'background-color': currColor,
        'border-color'    : currColor,
        'color'           : '#fff'
      }).addClass('external-event')
      event.html(val)
      $('#external-events').prepend(event)

      //Add draggable funtionality
      ini_events(event)

      //Remove event from text input
      $('#new-event').val('')
    })
  })
</script>

<script>
(function(){
const Toast = Swal.mixin({
      toast: true,
      position: 'top',
      showConfirmButton: false,
      timer: 4000
    });

    @if(Session::has("success"))
      Toast.fire({
      type: 'success',
      title: "{{Session::get('success')}}"
      })
    @endif

    @if(Session::has("error"))
      Toast.fire({
      type: 'error',
      title: "{{Session::get('error')}}"
      })
    @endif


    @if(Session::has("info"))
      Toast.fire({
      type: 'info',
      title: "{{Session::get('info')}}"
      })
    @endif

  })();

</script>

{{
  Session::remove("success")
}}
{{
  Session::remove("error")
}}

{{
  Session::remove("info")
}}

<script>
    window.history.pushState(null, null, window.location.href);
    window.onpopstate = function () {
    window.history.go(1);
};
</script>


<script>
(function(){
  let submitAdmins = $("#submitAdmins");
  let adminsForm  = $("#adminsForm");

  let submitStudents = $("#submitStudents");
  let studentsForm  = $("#studentsForm");

  let submitClasses = $("#submitClasses");
  let classesForm  = $("#classesForm");


  let submitLevels = $("#submitLevels");
  let levelsForm  = $("#levelsForm");

  let submitTeachers = $("#submitTeachers");
  let teachersForm  = $("#teachersForm");


  let submitSubjects = $("#submitSubjects");
  let subjectsForm  = $("#subjectsForm");


  let submitSubjectCategories = $("#submitSubjectCategories");
  let subjectCategoriesForm  = $("#subjectCategoriesForm");

  let submitStudentCategories = $("#submitStudentCategories");
  let studentCategoriesForm  = $("#studentCategoriesForm");


  let submitTimeTables = $("#submitTimeTables");
  let timeTablesForm  = $("#timeTablesForm");

  let submitStudyTimes = $("#submitStudyTimes");
  let studyTimesForm  = $("#studyTimesForm");

  let submitStudyDays = $("#submitStudyDays");
  let studyDaysForm  = $("#studyDaysForm");

  let submitFees = $("#submitFees");
  let feesForm  = $("#feesForm");

  let submitTerm = $("#submitTerm");
  let termForm  = $("#termForm");


  let submitEvent = $("#submitEvent");
  let eventForm  = $("#eventForm");


  let submitCurrentTerm = $("#submitCurrentTerm");
  let currentTermForm  = $("#currentTermForm");

  let submitMark = $("#submitMark");
  let markForm  = $("#markForm");

  let submitPayments = $("#submitPayments");
  let paymentsForm  = $("#paymentsForm");


  let submitExamSet = $("#submitExamSet");
  let examSetsForm  = $("#examSetsForm");

  let roleForm  = $("#roleForm");

  let submitRole = $("#submitRole");
  let logoutBtn  = $("#logoutBtn");

  submitRole.on("click",ev=>{
      adminsForm.trigger("submit");
  });

  submitAdmins.on("click",ev=>{
      adminsForm.trigger("submit");
  });


  submitStudents.on("click",ev=>{
      studentsForm.trigger("submit");
  });

  submitTeachers.on("click",ev=>{
      teachersForm.trigger("submit");
  });


  submitClasses.on("click",ev=>{
      classesForm.trigger("submit");
  });

  submitLevels.on("click",ev=>{
      levelsForm.trigger("submit");
  });

  submitSubjects.on("click",ev=>{
      subjectsForm.trigger("submit");
  });


  submitSubjectCategories.on("click",ev=>{
      subjectCategoriesForm.trigger("submit");
  });

  submitStudentCategories.on("click",ev=>{
      studentCategoriesForm.trigger("submit");
  });


  submitTimeTables.on("click",ev=>{
      timeTablesForm.trigger("submit");
  });


  submitStudyDays.on("click",ev=>{
      studyDaysForm.trigger("submit");
  });

  submitStudyTimes.on("click",ev=>{
      studyTimesForm.trigger("submit");
  });


  submitFees.on("click",ev=>{
      feesForm.trigger("submit");
  });


  submitTerm.on("click",ev=>{
      termForm.trigger("submit");
  });


  submitEvent.on("click",ev=>{
      eventForm.trigger("submit");
  });


  submitMark.on("click",ev=>{
      markForm.trigger("submit");
  });

  submitPayments.on("click",ev=>{
      paymentsForm.trigger("submit");
  });


  submitCurrentTerm.on("click",ev=>{
      currentTermForm.trigger("submit");
  });

  submitExamSet.on("click",ev=>{
      examSetsForm.trigger("submit");
  });
}());
</script>


<script>
  $(function(){

       

       let receiptBtns = document.querySelectorAll(".receiptBtn");
       


       receiptBtns.forEach(btn=>{


        btn.addEventListener("click",ev=>{

       let $name = $("#receipt_name");
       let $amount = $("#receipt_amount");
       let $payment = $("#payment_name");
       let $balance = $("#payment_balance");
       let $date = $("#date");
       let $pay_id = $("#receipt_id");
       $name.text(ev.target.getAttribute("data-std-name"));
       $balance.text(ev.target.getAttribute("data-balance"));
       $date.text(ev.target.getAttribute("data-date"));
       $amount.text(ev.target.getAttribute("data-amount"));
       $pay_id.text(ev.target.getAttribute("data-pay-id"));
      
       //window.location.href="receipt/"+$pay_id;

        })

       })



    $("#print").on("click",function(ev){

      $(".receipt").trigger("print");

    });
  })
</script>



<script>
  $(function(){


    $navLinks = $(".nav-link");

    currLink = window.location.href;
      
     array = (currLink.split("/"));

     lastLink = array[array.length-1]
    
    $navLinks.each((index,linkItem)=>{

      currentNavLink = $(linkItem).attr("href");

      if(lastLink.includes(currentNavLink)){
        $($(linkItem).parent().parent().attr("for")).removeClass("text-dark");
      $($(linkItem).parent().parent().attr("for")).addClass("menu-open text-success");
      icon = $($(linkItem).children()[0]);
      $(linkItem).addClass("text-success blink");
      icon.removeClass("far");
      icon.addClass("fa text-success");
      }
    });
    $(".loading-image").removeClass(".loading-image");
  });



</script>



<script>

  (function(){

    $(function(){

     $forms =  $("form");

     $forms.each((index,form)=>{

       $(form).on("submit",ev=>{
        // ev.preventDefault();
        children =  $(form).children();
        console.log(children);
       });

     })


    // $(window).on("contextmenu",(ev)=>{
    //   ev.preventDefault();
    //   console.log(ev.clientX);
    //   console.log(ev.clientY);
    // });

    });





   

  }())




</script>





