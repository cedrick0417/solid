<?php

require_once('Database.php');

?>
<!DOCTYPE html>
<html>
<head>
	<title>Consuming PHP CRUD API</title>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
	<h1>Consuming PHP CRUD API</h1>
	<div>
		<label for="name">Name:</label>
		<input type="text" id="name">
		<label for="email">Email:</label>
		<input type="email" id="email">
		<button id="create">Create</button>
	</div>
	<div id="output"></div>
	<script>
		$(document).ready(function(){
			// Create new record
			$("#create").click(function(){
				var name = $("#name").val();
				var email = $("#email").val();
				var data = {
					"name": name,
					"email": email
				};
				$.ajax({
					url: "http://localhost/solid/CRUDApi.php/",
					type: "POST",
					data: JSON.stringify(data),
					success: function(result){
						$("#output").html(result);
					},
					error: function(error){
						console.log(error);
					}
				});
			});

			// Read all records
			// $.ajax({
			// 	url: "http://example.com/api.php",
			// 	type: "GET",
			// 	success: function(result){
			// 		$("#output").html(result);
			// 	},
			// 	error: function(error){
			// 		console.log(error);
			// 	}
			// });
		});
	</script>
</body>
</html>

<!--

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Document</title>
</head>
<body>
<h1>My CRUD App</h1>

<form id="myForm">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name">
    <br>
    <label for="email">Email:</label>
    <input type="email" name="email" id="email">
    <br>
    <input type="hidden" name="id" id="id">
    <button type="submit" id="submitBtn">Submit</button>
</form>

<table id="dataTable" border="1">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody></tbody>
</table>

<script>
    $(document).ready(function() {
        // Load initial data
        loadData();

        // Handle form submission
        $("#myForm").submit(function(event) {
            event.preventDefault();
            saveData();
        });
    });

    function loadData() {
        $.get("api.php", function(data) {
            $("#dataTable tbody").html("");
            data.forEach(function(row) {
                var tr = $("<tr>");
                tr.append($("<td>").text(row.name));
                tr.append($("<td>").text(row.email));
                tr.append($("<td>").html(`
                    <button onclick="editData(${row.id})">Edit</button>
                    <button onclick="deleteData(${row.id})">Delete</button>
                `));
                $("#dataTable tbody").append(tr);
            });
        });
    }

    function saveData() {
        var data = $("#myForm").serialize();
        $.post("api.php", data, function(response) {
            if (response.success) {
                $("#myForm")[0].reset();
                loadData();
            } else {
                alert(response.message);
            }
        }, "json");
    }

    function editData(id) {
        $.get("api.php?id=" + id, function(data) {
            $("#name").val(data.name);
            $("#email").val(data.email);
            $("#id").val(data.id);
            $("#submitBtn").text("Update");
        });
    }

    function deleteData(id) {
        if (confirm("Are you sure you want to delete this record?")) {
            $.ajax({
                url: "api.php?id=" + id,
                type: "DELETE",
                success: function(response) {
                    loadData();
                },
                error: function(xhr, status, error) {
                    alert(error);
                }
            });
        }
    }
</script>
</body>
</html> -->