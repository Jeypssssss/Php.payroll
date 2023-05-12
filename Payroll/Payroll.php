<!DOCTYPE html>
<html>
<head>
	<title>Payroll PHP</title>
    <style>
        form {
  max-width: 30%;
  margin: 0 auto;
  padding: 20px;
  background-color: #f5f5f5;
  border: 1px solid #ddd;
  border-radius: 5px;
}

label {
  display: block;
  margin-bottom: 10px;
  font-weight: bold;
}

input[type="text"],
input[type="number"] {
  display: block;
  width: 90%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 3px;
  margin-bottom: 20px;
}

input[type="submit"] {
  background-color: #4CAF50;
  color: white;
  border: none;
  padding: 10px 20px;
  border-radius: 3px;
  cursor: pointer;
  transition: background-color 0.2s ease-in-out;
}

input[type="submit"]:hover {
  background-color: #3e8e41;
}
h1{
    text-align: center;
}
    </style>
</head>
<body>
    <!--eto yung form-->
	<h1>Payroll PHP</h1>
	<form method="POST">
		<label for="name">Employee Name:</label>
		<input type="text" name="name" id="name" required><br>

		<label for="position">Position:</label>
		<input type="text" name="position" id="position" required><br>

		<label for="rate">Daily Rate:</label>
		<input type="number" name="rate" id="rate" min="1" required><br>

		<label for="days_worked">Days Worked:</label>
		<input type="number" name="days_worked" id="days_worked" min="1" required><br>

		<input type="submit" value="Calculate Payroll">
	</form>
<!--end ng form-->
	<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		/*eto part din ng form pero php sya, ginamit to para mag function yung ginawang form sa html*/
		$name = $_POST["name"];
		$position = $_POST["position"];
		$rate = $_POST["rate"];
		$days_worked = $_POST["days_worked"];

		/*eto ginamit pang compute*/
		$salary = $rate * $days_worked;
		$sss_deduction = $salary * 0.005; /* tig .5% lang ng sahod nila binabawas dito*/
		$philhealth_deduction = $salary * 0.005; /* tig .5% lang ng sahod nila binabawas dito*/
		$BIR_deduction = $salary * 0.005; /* tig .5% lang ng sahod nila binabawas dito*/
		$total_deductions = $sss_deduction + $philhealth_deduction + $BIR_deduction;
		$net_pay = $salary - $total_deductions;

		/*output*/
		echo "<hr>";
		echo "<h2>Payroll for $name</h2>";
		echo "<p>Position: $position</p>";
		echo "<p>Rate: ₱$rate per day</p>";
		echo "<p>Days Worked: $days_worked</p>";
		echo "<hr>";
		echo "<p>Salary: ₱$salary</p>";
		echo "<p>SSS Deduction: ₱$sss_deduction</p>";
		echo "<p>Philhealth Deduction: ₱$philhealth_deduction</p>";
		echo "<p>BIR Deduction: ₱$BIR_deduction</p>";
		echo "<hr>";
		echo "<h3>Net Pay: ₱$net_pay</h3>";
	}
	?>
</body>
</html>