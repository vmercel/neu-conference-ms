	</div>
</div>
<div>
	<footer class="nav navbar-inverse">
		<p class="navbar-text">Developed by Mercel Vubangsi</p>
	</footer>
</div>
		<div id="abt_douphix" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h3>About Developer</h3>
					</div>
					<div class="modal-body" style="font-weight:bold;">
						<div class="text-center">
							<p class="text-center">
							<img src="images/mercel.jpg" class="img-responsive img-circle" width="150px" height="200px"/>
							</p>
							<p>Name: Mercel Vubangsi</p>
							<p>Country: Cameroon</p>
							<p>State of Origin: North West</p>
							<p>Email: mercel.vubangsi@uniba.cm</p>
							<p>Phone:+237677761884</p>
						</div>
					</div>
					<div class="modal-footer">
					</div>
				</div>
			</div>
		</div>
</div>
<script type="text/javascript" src="Js/jquery-3.1.1.min.js"></script>
<?php
if($page_title == "Student Registeration Form"){
 echo "<script type=\"text/javascript\" src=\"Js/bootsvalid.min.js\"></script>
 <script type=\"text/javascript\" src=\"Js/validate_reg.js\"></script>";
}
?>
<script type="text/javascript" src="Js/bootstrap.min.js"></script>
		<script>
		$(document).ready(function(){
			$("#submt").click(function(){
				var response = confirm("Are you sure you want to submit?");
				if(response == true){
					return true;
				}
				else{
					return false;
				}
				event.preventDefault();
			});
		});
		function print_result(){
			window.print();
		}
		</script>
</body>
</html>