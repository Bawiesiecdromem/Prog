<?php 
include 'config/serverconfig.php';
$querycat = mysqli_query($con,"SELECT * FROM T_CATEGORIES ORDER BY cat_id");
echo   '<thead>
	<tr>
	<th>ID</th>
	<th>Nazwa</th>
	<th>Opis</th>
	<th>Treści +18</th>
	<th>Usuń kategorie</th>
	</tr>
</thead>';
while ($rowcat = mysqli_fetch_array($querycat, MYSQL_BOTH)){
echo '<tbody>
	<tr>
	<td><span>'.$rowcat['cat_id'].'</span></td>
	<td>'.$rowcat['cat_name'].'</td>
	<td>'.$rowcat['cat_desc'].'</td>	
	<td>'.$rowcat['mature_content'].'</td>	
	<td><a href="f_catdelete.php?cat_id='.$rowcat['cat_id'].'"><span class="glyphicon glyphicon-remove"></span></a></td>
	</tr></tbody>';

}
?>
