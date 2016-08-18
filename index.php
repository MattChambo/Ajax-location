<html>
	<head>
		<meta charset="utf-8">
		<title>Ajax Location Select</title>
	</head>
	<body>
		<h1>Where do you Live?</h1>


		<select id="Country">
			<option>Please select a country</option>
			<?php 
				$dbc = new mysqli('localhost', 'root', '', 'ajax-new');

				$sql = "SELECT CountryName, CountryID FROM Country";

				$result = $dbc->query($sql);

				while($country = $result->fetch_assoc() ) : ?>

					<option value="<?= $country['CountryID'] ?>"><?= $country['CountryName'] ?></option>
					
				<?php endwhile; ?>
		</select>

		<select id="cities" name="cities">
			
		</select>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="countries-cities.js"></script>
	</body>
</html>