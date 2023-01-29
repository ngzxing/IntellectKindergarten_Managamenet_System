<!DOCTYPE html>
<html>

<head>

	<style>
		.container {
			height: 80px;
			width: 250px;
			border: 2px solid black;
			background-color: green;
			color: white;
		}
	</style>
</head>

<body>
	<div class="container">
		<h1>GeeksforGeeks</h1>
	</div>

	
<p>
		Click the buttons to show or hide the green box
	</p>


	<button onclick="showElement()">
			Show Element
	</button>

	<button onclick="hideElement()">
			Hide Element
	</button>

	<script type="text/javascript">
		function showElement() {
			element = document.querySelector('.container');
			element.style.visibility = 'visible';
		}

		function hideElement() {
			element = document.querySelector('.container');
			element.style.visibility = 'hidden';
		}
	</script>
</body>

</html>
