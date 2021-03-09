<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">

	*{ margin: 0; padding: 0; font-family: 'Muli', sans-serif; box-sizing: border-box; }

	.divider-text
	{
		position: relative;
		text-align: center;
		margin-top: 15px;
		margin-bottom: 15px;
	}

	.divider-text span
	{
		padding: 7px;
		font-size: 12px;
		position: relative;
		z-index: 2;
	}

	.divider-text: after
	{
		content: "";
		position: absolute;
		width: 100%
		border-bottom: 1px solid #ddd;
		top: 55%;
		left: 0;
		z-index: 1;
	}

	.btn-facebook
	{
		background-color: #405D9D!important;
		color: #fff!important;
	}

	.btn-gmail
	{
		background-color: #ea4335!important;
		color: #fff!important;
	}
	.cookie-container
	{
		position:fixed;
		bottom: -100%;
		left: 0;
		right: 0;
		background:#2f3640;
		color: #f5f6fa;
		padding: 0 32px;
		box-shadow: 0 -2px 16px rgba(47,54,64,39);
		transition: 5000ms;
	}

	.cookie-container.active
	{
		bottom: 0;
	}

	.cookie-container a
	{
		color: #f5f6fa;
	}

	.cookie-btn
	{
		background: #e84118;
		border: 0;
		color: #f5f6fa;
		padding: 12px 48px;
		font-size: 15px;
		margin-bottom: 16px;
		border-radius: 8px;
		cursor: pointer;
	}



	</style>
</head>
<body>

</body>
</html>