function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#formpic')
                .attr('src', e.target.result)
                .width(900)
                .height(300);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

function courseClick(id) {
  var courseid = id;
  var queryString = "?courseid=" + courseid;
  window.location.href = "allunits.php" + queryString;
}

function newUnit(id) {
  var courseid = id;
  var queryString = "?courseid=" + courseid;
  window.location.href = "newunit.php" + queryString;
}

$('input.typeahead').typeahead({
	    source:  function (query, process) {
        return $.get('/ajaxpro.php', { query: query }, function (data) {
        		console.log(data);
        		data = $.parseJSON(data);
	            return process(data);
	        });
	    }
	});
