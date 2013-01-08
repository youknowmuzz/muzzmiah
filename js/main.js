$(document).ready(function(){
	$('#submit_findemp_search').click(function(e) {
		e.preventDefault();
		var fname = $('#firstname').val();
		var lname = $('#lastname').val();
		var dept_name = $('#dept').val();
		var title = $('#title').val();

		$.getJSON(
			'/w1290976/index.php/find/findemp',
			{firstname: fname, lastname: lname, dept: dept_name, jobtitle: title},
			function(data) {
				console.log(data);
				$('.findemp_results').remove();
				var table = "<table class=\"findemp_results\"><thead><tr><th>Employee No</th><th>First Name</th><th>Last Name</th><th>Department</th><th>Title</th></tr></thead>";
				$.each(data.results, function(i, emp) {
					table += "<tr>" +
						"<td>" + emp.emp_no + "</td>" +
						"<td>" + emp.firstname + "</td>" +
						"<td>" + emp.lastname + "</td>" +
						"<td>" + emp.dept + "</td>" +
						"<td>" + emp.jobtitle + "</td>" +
						"</tr>"
						});
					table += "</table>";
				$('.searchResults').append(table);
			});
	});
});