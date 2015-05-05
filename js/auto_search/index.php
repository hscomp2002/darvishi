<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
    <link href="styles.css" rel="stylesheet" />
</head>

<body>
	<div class="container">
        <h1>Ajax Autocomplete Demo</h1>
        <h1>باکس بالا</h1>
        <h2>Ajax Lookup</h2>
        <p>Type country name in english:</p>
        <div style="position: relative; height: 80px;">
            <input type="text" name="country" id="autocomplete-ajax" style="position: absolute; z-index: 2; background: transparent;"/>
            <input type="text" name="country" id="autocomplete-ajax-x" disabled="disabled" style="color: #CCC; position: absolute; background: transparent; z-index: 1;"/>
        </div>
        <div id="selction-ajax"></div>
        
        
        <h1>باکس وسط</h1>
        <h2>Local Lookup and Grouping</h2>
        <p>Type NHL or NBA team name:</p>
        <div>
            <input type="text" name="country" id="autocomplete"/>
        </div>
        <div id="selection"></div>

        
        <h1>باکس پایین</h1>
        <h2>Custom Lookup Container</h2>
        <p>Type country name in english:</p>
        <div>
            <input type="text" name="country" id="autocomplete-custom-append" style="float: left;"/>
            <div id="suggestions-container" style="position: relative; float: left; width: 400px; margin: 10px;"></div>
        </div>
	</div>
    
        
    <div style="width: 50%; margin: 0 auto; clear: both;">
        <h2>Dynamic Width</h2>
        <p>Type country name in english:</p>
        <div>
            <input type="text" name="country" id="autocomplete-dynamic" style="width: 100%; border-width: 5px;"/>
        </div>
    </div><br><br><br><br><br><br>
    <script type="text/javascript" src="jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="countries.js"></script>
    <script type="text/javascript" src="jquery.autocomplete.js"></script>
    <script type="text/javascript" src="jquery.mockjax.js"></script>
    <script type="text/javascript" src="demo.js"></script>
</body>
</html>