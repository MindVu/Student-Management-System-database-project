<!DOCTYPE HTML>
<html>

<head>
</head>
<body>
	<h1>Add student</h1>
	<form action="includes/addstudent.inc.php" method="post">
		<input type="text" name="StudentName" placeholder="Tên"> 
		
		<p>Giới tính:</p>
		<input type="radio" id="gender1" name="StudentGender" value="M">
		<label for="gender1">Nam</label><br>
		<input type="radio" id="gender2" name="StudentGender" value="F">
		<label for="gender2">Nữ</label><br>  
		<input type="radio" id="gender3" name="StudentGender" value="U">
		<label for="gender3">Không xác định</label><br>
		
		<label for="birthday">Ngày sinh:</label>
		<input type="date" id="birthday" name="StudentDob">
		<br>
		
		<input type="tel" name="StudentPhone" placeholder="Số điện thoại" pattern="[0-9]{8}" required><br><br>
		<button type="submit" name="addstudent-submit">Submit</button>
	</form>
</body>