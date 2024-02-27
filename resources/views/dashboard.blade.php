<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

<<<<<<< HEAD
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
=======
	<title>Student Information System</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <!-- End fonts -->

	<!-- core:css -->
	<link rel="stylesheet" href="../assets/vendors/core/core.css">
	<!-- endinject -->

	<!-- Plugin css for this page -->
	<link rel="stylesheet" href="../assets/vendors/flatpickr/flatpickr.min.css">
	<!-- End plugin css for this page -->

	<!-- inject:css -->
	<link rel="stylesheet" href="../assets/fonts/feather-font/css/iconfont.css">
	<link rel="stylesheet" href="../assets/vendors/flag-icon-css/css/flag-icon.min.css">
	<!-- endinject -->

    <!-- Layout styles -->  
    <link rel="stylesheet" href="../assets/css/demo2/style.css">
    <!-- End layout styles -->

	<!-- Custom css for pages that has data-table  -->
    <link rel="stylesheet" href="../../../assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css">
    <!-- End plugin css for this page -->
  

  <link rel="shortcut icon" href="../assets/images/favicon.png" />
</head>
<body>

        @include('custom-layouts.sidebar');
		<!-- partial -->
	
		<div class="page-wrapper">
					
            @include('custom-layouts.header');
            
            @yield('content');

            @include('custom-layouts.footer')
		
		</div>
	</div>

	<!-- core:js -->
	<script src="../assets/vendors/core/core.js"></script>
	<!-- endinject -->

	<!-- Plugin js for this page -->
    <script src="../assets/vendors/flatpickr/flatpickr.min.js"></script>
    <script src="../assets/vendors/apexcharts/apexcharts.min.js"></script>
	<!-- End plugin js for this page -->

	<!-- inject:js -->
	<script src="../assets/vendors/feather-icons/feather.min.js"></script>
	<script src="../assets/js/template.js"></script>
	<!-- endinject -->

	<!-- Custom js for this page -->
    <script src="../assets/js/dashboard-dark.js"></script>
	<!-- End custom js for this page -->

    <!-- Plugin js for this page -->
    <script src="../../../assets/vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="../../../assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js"></script>
	<!-- End plugin js for this page -->


	<!-- Custom js for pages that has data-table  -->
    <script src="../../../assets/js/data-table.js"></script>
	<!-- End custom js for this page -->

	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
	
</body>
</html>    
>>>>>>> 143a8355eb706acff66e24a54a1521c4fcfea443
