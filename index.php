<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Generate Install Magento Command line</title>
<link rel="stylesheet" type="text/css" media="all" href="css/style.css" />
<link rel="stylesheet" type="text/css" media="all" href="js/jquery-ui-1.11.4.custom/jquery-ui.min.css" />
<link rel="stylesheet" type="text/css" media="all" href="css/tooltipster.css" />
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.11.4.custom/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/jquery.tooltipster.min.js"></script>

</head>
<body>
	<div class="wrapper" id="main">
		<h1>Generation command line string for installing Magento 2</h1>
		<form id="generate-input" method="post" action="action.php">
			<div class="col">
				<h3>Admin info:</h3>
				<ul class="list">
					<li class="items"><label>Base Url:</label> <input type="text"
						name="base-url" class="require" />
						<p class="note">
							Example:<br>http://127.0.0.1/your_Magento_install_dir
						</p></li>
					<li class="items">
						<label>Backend Frontname:</label>
						<input type="text" name="backend-frontname" class="require" value="admin" />
						<p class="note">Example: admin, backend...</p>
					</li>
					<li class="items"><label>Admin User:</label> <input type="text"
						name="admin-user" class="require" /></li>
					<li class="items"><label>Admin password:</label> <input type="text"
						name="admin-password" class="require" /></li>
					<li>
						<h3>Optional:</h3>
						<ul class="sub-list optional-list">
							<li class="items"><label>Admin First name:</label> <input
								type="text" name="admin-firstname" class="require" value="Admin" />
							</li>
							<li class="items"><label>Admin last name:</label> <input
								type="text" name="admin-lastname" class="require" value="User" />
							</li>
							<li class="items"><label>Admin Email:</label> <input type="text"
								name="admin-email" class="require" value="someone@admin.com" /></li>
						</ul>
					</li>
				</ul>
				<h3>Database Info:</h3>
				<ul class="list">
					<li class="items"><label>Host:</label> <input type="text"
						name="db-host" class="require" value="localhost" />
						<p class="note">
							<span class="code">localhost</span> is default if your database
							server is on the same host as your web server.
						</p></li>
					<li class="items"><label>Database name:</label> <input type="text"
						name="db-name" class="require" value="magento2" />
						<p class="note">
							Default is <span class="code">magento2</span>
						</p></li>
					<li class="items"><label>Database User:</label> <input type="text"
						name="db-user" class="require" value="root" />
						<p class="note">
							User name of the Magento database instance owner. Default is <span
								class="code">root</span>.
						</p></li>
					<li class="items"><label>Database Password:</label> <input
						type="text" name="db-password" class="require" /></li>
					<li class="items"><label>Database Prefix:</label> <input type="text"
						name="db-prefix" />
						<p class="note">
							Use only if you're installing the Magento database tables in a
							database instance that has Magento tables in it already.
							<br /> In that case, use a prefix to identify the Magento tables for this
							installation. Some customers have more than one Magento instance
							running on a server with all tables in the same database.
							<br /> This option enables those customers to share the database server
							with more than one Magento installation.
						</p></li>
				</ul>
			</div>
			<div class="col">
				<ul class="list">
					<li class="items"><label>Language:</label> <input type="text"
						name="language" class="require" value="en_US" />
						<p class="note">
							Language code to use in the Admin and storefront.
							<br/>
							You can view the list of language codes by entering
							<span class="code">php bin/magento info:language:list</span>
							from your root magento folder.
						</p>
					</li>
					<li class="items"><label>Currency:</label> <input type="text"
						name="currency" class="require" value="USD" />
						<p class="note">
							Default currency to use in the storefront.
							<br/>
							you can view the list of currencies by entering 
							<span class="code">php bin/magento info:currency:list</span>
							from your root magento folder.
						</p>
					</li>
					<li class="items"><label>Timezone:</label> <input type="text"
						name="timezone" class="require" value="America/New_York" />
						<p class="note">
							Default time zone to use in the Admin and storefront
							<br/>
							You can view the list of timezone codes by entering
							<span class="code">php bin/magento info:timezone:list</span>
							from your root magento folder.
						</p>
					</li>
					<li class="items"><label>Use rewrites:</label>
						<input type="checkbox" checked="checked" name="use-rewrites" class="checkbox" value="1" />
						<p class="note">
							<span class="code">1</span> means you use web server rewrites for generated links in the storefront and Admin.
							<br>
							<span class="code">0</span> disables the use of web server rewrites. This is the default.
						</p>
					</li>
					<li class="items"><label>Use Sample data:</label>
						<input type="checkbox" checked="checked" name="use-sample-data" class="checkbox" value="1" />
					</li>
					<li class="items"><label>Cleanup database:</label>
						<input type="checkbox" checked="checked" name="cleanup-database" class="checkbox" value="1" />
					</li>
					<li class="items"><label>Use secure:</label>
						<input type="checkbox" name="use-secure" class="checkbox" value="1" />
						<p class="note">
							<span class="code">1</span> enables the use of Secure Sockets Layer (SSL) in all URLs (both Admin and storefront). Make sure your web server supports SSL before you select this option.
							<br>
							<span class="code">0</span> disables the use of SSL with Magento. This is the default.
						</p>
					</li>
				</ul>
			</div>
			<button type="submit">Generate</button>
			<button type="reset">Load Default Configuration</button>
		</form>
	</div>
	<script type="text/javascript">
	$.widget("ui.tooltip", $.ui.tooltip, {
	    options: {
	        content: function () {
	            return $(this).prop('title');
	        }
	    }
	});
	$("input").attr('title',function(){
			$(this).next('.note').hide();
			return $(this).next('.note').html();
	});
	$(document).tooltip();

	$('.require').prev("label").append("<em>*</em>");
	$('#generate-input').submit(function(event){
		event.preventDefault();
		var hasError = 0;
		$('.require').removeClass("error");
		var form = $(event.currentTarget);
		$('.require').each(function(i,e){
			var e = $(e);
			if(e.val() == "" || e.val() == 0){
				e.addClass("error", 200);
				hasError = 1;
			}
		});
		if(hasError == 0){
			$( "#dialog-message" ).remove();
			$.ajax({
				url: form.attr('action'),
				type: form.attr("method"),
				data: form.serialize(),
				dataType: "json",
				success: function(resp){
					if(resp.error == 0){
						$("body").append(resp.html);
						$('#setup_string').focus(function(event){
							$(this).select();
							event.preventDefault();
						});
						$( "#dialog-message" ).dialog({
					      modal: true,
					      width: 1024,
					      buttons: {
					        "Select All": function() {
					        	$('#setup_string').focus();
					        },
					        "Close": function(){
					        	$( "#dialog-message" ).dialog( "close" );
					        }
					      }
					    });
					}
				}
			});
		}else
			return false;
	});
	
</script>
</body>
</html>
