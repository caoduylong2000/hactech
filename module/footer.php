
	</div>
	<!-- End page main -->
	</div>
</div>
<script>
		function toggleMenu() {
			let toggle = document.querySelector('.toggle');
			let navigation = document.querySelector('.navigation');
			let main = document.querySelector('.main');
			toggle.classList.toggle('active');
			navigation.classList.toggle('active');
			main.classList.toggle('active');
		}

		function clock() {
			let hour = document.getElementById('hour');
			let minute = document.getElementById('minute');
			let second = document.getElementById('second');
			let ampm = document.getElementById('ampm');

			let h = new Date().getHours();
			let m = new Date().getMinutes();
			let s = new Date().getSeconds();
			var am = 'AM';

			if (h > 12) {
				h = h - 12;
				var am = ' PM'
			}

			h = (h < 10 ) ? '0' + h : h;
			m = (m < 10 ) ? '0' + m : m;
			s = (s < 10 ) ? '0' + s : s;

			hour.innerHTML = h;
			minute.innerHTML = m;
			second.innerHTML = s;
			ampm.innerHTML = am;
		}
		var interval = setInterval(clock, 1000);

	$(document).ready(function() {
    	$('#navigation').load("../module/navigation.html");
    });
    $(document).ready(function() {
    	$('#topbar').load("../module/topbar.html");
    });
     $(document).ready(function() {
    	$('pageMenu').load("../module/pagebar.html");
    });
	</script>
	<script>
  $(document).ready(function(){

    load_data(1);

    function load_data(page, query = '')
    {
      $.ajax({
        url:"fetch.php",
        method:"POST",
        data:{page:page, query:query},
        success:function(data)
        {
          $('#dynamic_content').html(data);
        }
      });
    }

    $(document).on('click', '.page-link', function(){
      var page = $(this).data('page_number');
      var query = $('#search_box').val();
      load_data(page, query);
    });

    $('#search_box').keyup(function(){
      var query = $('#search_box').val();
      load_data(1, query);
    });

  });
</script>
</body>
</html>