		<footer class="sticky-footer bg-dark">
			<div class="container my-auto">
				<div class="copyright text-center my-auto text-success">
					<span>Copyright &copy; 2022 - Developed by
						<b><a href="#" target="_blank" class="text-success">Bertu/Barkin/Baran/Cemal</a></b>
					</span>
				</div>
			</div>
		</footer>

		<script src="{{asset('admin/vendor/jquery/jquery.min.js')}}"></script>
		<script src="{{asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
		<script src="{{asset('admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
		<script src="{{asset('admin/js/ruang-admin.min.js')}}"></script>
		<script src="{{asset('admin/vendor/chart.js/Chart.min.js')}}"></script>
		<script src="{{asset('admin/js/demo/chart-area-demo.js')}}"></script>  

		<!-- Datatables -->
		<script src="{{asset('admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
		<script src="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

		<script>
			$(document).ready(function () {
				$('#dataTable').DataTable(); // ID From dataTable 
				$('#dataTableHover').DataTable(); // ID From dataTable with Hover
			});
		</script>

		<script>
			function confirmDelete(){
				return confirm('Are you sure you want to delete this?')
			}
		</script>
	</body>

</html>