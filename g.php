<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>AutoViewer</title>
<!-- Download AutoViewer at www.airtightinteractive.com/projects/autoviewer -->
<script type="text/javascript" src="swfobject.js"></script>
<style type="text/css">	
	/* hide from ie on mac \*/
	html {
		height: 100%;
		overflow: hidden;
	}	
	#flashcontent {
		height: 100%;
	}
	/* end hide */
	body {
		height: 100%;
		margin: 0;
		padding: 0;
		background-color: #181818;
		color:#ffffff;
		font-family:sans-serif;
		font-size:40;
	}	
	a {	
		color:#cccccc;
	}
</style>
</head>
<body>
	<div id="flashcontent">AutoViewer requires JavaScript and the Flash Player. <a href="http://www.macromedia.com/go/getflashplayer/">Get Flash here.</a> </div>	
	<script type="text/javascript">
		var fo = new SWFObject("autoviewer.swf", "autoviewer", "100%", "100%", "8", "#181818");		
				
		fo.addVariable("xmlURL", "gallery.xml.php?g=<?php echo urlencode($_REQUEST['g']); ?>");					
		
		fo.write("flashcontent");	
		
	</script>	
</body>
</html>
