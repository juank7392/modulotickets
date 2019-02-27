<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/">Sistema de Tickets</a>
		</div>
		<!-- Navbar right-->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right"> 
				<li><a href="/tickets">Listar Tickets</a></li>
				<li><a href="/contact">Crear nuevo Ticket</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Miembro
						<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="/users/register">Register</a></li>
							<li><a href="/users/login">Login</a></li>
						</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>