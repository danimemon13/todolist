
<!DOCTYPE html>
<html>
<head>
	<title>ToDo List Application PHP and MySQL</title>
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/style.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>  
</head>
<body>
	<div class="heading">
		<h2 style="font-style: 'Hervetica';">ToDo List Application PHP and MySQL database</h2>
	</div>
	<form class="form-inline" type="post" action="#" id="form_submit">
	  <label for="task">Task:</label>
	  <input type="text" required="required" id="task" placeholder="Enter Task" name="task">
	  <label for="Date">Date:</label>
	  <input type="date" id="date" placeholder="Select Date" name="date" value="<?=date('Y-m-d')?>">
	  <button type="submit">Submit</button>
	</form>
	<table>
		<thead>
			<tr>
				<th>#</th>
				<th>Tasks</th>
				<th>Date</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$count = 0;
			foreach($list as $lists){
			?>
			<tr>
				<td class="counter"> <?=$lists['id'];?> </td>
				<td class="task"> <?=$lists['task']?></td>
				<td><?=date_format(date_create($lists['date']),'m-d-Y')?></td>
				
			</tr>
			<?php
			}
			?>
		</tbody>
	</table>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>
		$("#form_submit").submit(function(e){
			e.preventDefault();
			var form_data = $("#form_submit").serializeArray();
			$.ajax({
				type:'POST',
		        data:form_data,
		        url: "<?=base_url()?>home/list_add",
		        success:function(response){
		        	var resp = '';
		        	var stringified = JSON.stringify(response);
		            var obj = JSON.parse(response);
		            var len = response.length;
		            $("tbody").empty();
		            for( var i = 0; i<len; i++){
		                //var id = obj[i]['id'];
		                //var name = obj[i]['name'];
		                var first_date = moment(obj[i]['date']).format('MM-DD-YYYY');  
		                	resp = '<tr>';
		                	resp += '<td>';
		                	resp += obj[i]['id']
		                	resp += '</td>'; 
		                	resp += '<td>';
		                	resp += obj[i]['task']
		                	resp += '</td>'; 
		                	resp += '<td>';
		                	resp += first_date
		                	resp += '</td>';  
		                	resp += '</tr>';    
		                $("tbody").append(resp);	
		                
		            }
		            
		        }
			});
		})
	</script>
</body>
</html>