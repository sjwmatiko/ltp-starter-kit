@extends(config('system.paths.backend.layout') . 'master')

@section('title', 'Page 2')

@section('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/daterangepicker/daterangepicker.css') }}">

    <!-- Image Upload -->
    <style>
        /* Dropzone Styles */
        #dropzone-container {
            border: 2px dashed #ccc;
            padding: 20px;
            text-align: center;
            background-color: #f9f9f9;
            cursor: pointer;
        }

        /* Hide the input file type */
        #dropzone-container input[type=file] {
            display: none;
        }

        /* Image Preview Styles */
        #image-preview {
            margin-top: 20px;
        }

        .thumbnail {
            width: 100px;
            height: 100px;
            margin-right: 10px;
        }
    </style>

    <style>
        #mySelect option:first-child {
            color: transparent;
            /* Hide the text by making it transparent */
            display: none;
        }
    </style>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="my-1 float-left"><i class="fas fa-info-circle text-blue"></i>&nbsp;{{ 'Add New Record' }}</h3>
            <div class="btn-group btn-group-sm float-right" role="group">
                {{-- @can('categories.create') --}}
                <a href="#" class="btn btn-outline-success" title="Add New Category">
                    <i class="fas fa-fw fa-plus-circle" aria-hidden="true"></i> Add Category
                </a>
                {{-- @endcan --}}
                {{-- @can('package-images.create') --}}
                <a href="#" class="btn btn-outline-dark" title="Add New Image">
                    <i class="fas fa-fw fa-plus-circle" aria-hidden="true"></i> Add Images
                </a>
                {{-- @endcan --}}
                {{-- @can('packages.index') --}}
                <a href="#" class="btn btn-outline-primary" title="List All">
                    <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                </a>
                {{-- @endcan --}}
            </div>
        </div>
        <!-- /.card-header -->

        <div class="card-body">
            <form action="#" method="post" class="form" enctype="multipart/form-data">
                @csrf
                @include(config('system.paths.backend.page') . 'page2.form')
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection

@section('js')
    <!-- Select2 -->
    <script src="{{ asset('adminlte/plugins/select2/js/select2.full.min.js') }}"></script>
    <!-- date-range-picker -->
    <script src="{{ asset('adminlte/plugins/daterangepicker/daterangepicker.js') }}"></script>

    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        });
    </script>

    <!-- Simpe Js for Image Upload -->
    <script>
        // Add click event listener to the dropzone container
        document.getElementById("dropzone-container").addEventListener("click", () => document.getElementById("images")
            .click());

        // Add change event listener to the input file field
        document.getElementById("images").addEventListener("change", function() {
            const imagePreviewContainer = document.getElementById("image-preview");

            // Clear existing image previews
            imagePreviewContainer.innerHTML = "";

            // Loop through selected files and create image previews
            Array.from(this.files).forEach(file => {
                const reader = new FileReader();

                // Read the file as data URL
                reader.readAsDataURL(file);

                // When reading is complete
                reader.onload = () => {
                    // Create image element
                    const image = document.createElement("img");
                    image.src = reader.result;
                    image.classList.add("thumbnail");

                    // Append image to image preview container
                    imagePreviewContainer.appendChild(image);
                };
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var selectDropdowns = document.querySelectorAll('.mySelect');
            selectDropdowns.forEach(function(selectDropdown) {
                var firstOption = selectDropdown.querySelector('option');
                firstOption.style.display = 'none';
            });
        });
    </script>
@endsection