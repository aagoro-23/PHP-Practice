<?php 

$con=mysqli_connect("", "", "", "")
or die('could not connect to MySQL');

if(isset($_POST['update']))
{
$UpdateQuery = "UPDATE users SET first_name='$_POST[first_name]', last_name='$_POST[last_name]', email='$_POST[email]', pass='$_POST[pass]', reg_date='$_POST[reg_date]'  
WHERE first_name ='$_POST[hidden]'";

mysqli_query($con, $UpdateQuery);
}
$result= mysqli_query($con, "SELECT * FROM users");



if(isset($_POST['delete']))
{
$DeleteQuery = "DELETE FROM users WHERE first_name ='$_POST[hidden]'";
mysqli_query($con, $DeleteQuery);
}
$result= mysqli_query($con, "SELECT * FROM users");




echo "<h2>Control Panel-Users</h2><br><br>";
echo "<table>
<tr>
<td><h4>First name</h4></td>
<td> </td>
<td><h4>Last name</h4></td>
<td><h4>E-mail_address</h4></td>
<td><h4>Password</h4></td>
<td><h4>Reg Date</h4></td>
</tr>";
while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
{
echo "<form action='test.php' method='post'>";
echo "<tr>";
echo "<td>". "<input type='text' name='first_name' value= ".$row['first_name']."></td>";
echo "<td>". "<input type='hidden' name='hidden' value= ". $row['first_name']."> </td>";
echo "<td>". "<input type='text' name='last_name' value= ".$row['last_name']."></td>";
echo "<td>". " <input type='text' name='email' value= ".$row['email']."> </td>";
echo "<td>". " <input type='text' name='pass' value= ".$row['pass']."> </td>";
echo "<td>". " <input type='date' name='reg_date' value= ".$row['reg_date']."> </td>";
echo "<td>" . "<input type='submit' name='update' value= 'update'" . "</td>";
echo "<td>" . "<input type='submit' name='delete' value= 'delete'" . "</td>";
echo "</tr>";
echo "</form>";
}
echo "</table>";



mysqli_close($con);
?>