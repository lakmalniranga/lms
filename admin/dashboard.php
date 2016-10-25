<div class="student">
	<h3 class="group-title blue-b">Dashboard</h3>
	<div class="column column-12 main side-padding margin">
		<table class="table left">
			<tbody>
				<tr>
					<td>Students</td>
					<td><?php echo $db->get('users', ['role', '=', 1])->count(); ?></td>
				</tr>
				<tr>
					<td>Teachers</td>
					<td><?php echo $db->get('users', ['role', '=', 3])->count(); ?></td>
				</tr>
				<tr>
					<td>Coursers</td>
					<td><?php echo $db->query("SELECT * FROM course")->count(); ?></td>
				</tr>
				<tr>
					<td>Modules</td>
					<td><?php echo $db->query("SELECT * FROM module")->count(); ?></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
