@extends('layouts.admin_template')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-primary text-white rounded-top">
                    MASTER COURSE
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-lg-12 col-sm-12">
                            <a href="{{ url('courses/create') }}" class="btn btn-info"><i class="fa fa-plus"></i> Tambah Course</a>
                        </div>
                    </div>
                    <table id="coursesTable" class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Course</th>
                                <th>Mentor</th>
                                <th>Title</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="courseDetailModal" tabindex="-1" role="dialog" aria-labelledby="courseDetailModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="courseDetailModalLabel">Course Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <tr>
                            <td><strong>Course</strong></td>
                            <td align="center">:</td>
                            <td><span id="xCourse"></span></td>
                        </tr>
                        <tr>
                            <td><strong>Mentor</strong></td>
                            <td align="center">:</td>
                            <td><span id="xMentor"></span></td>
                        </tr>
                        <tr>
                            <td><strong>Title</strong></td>
                            <td align="center">:</td>
                            <td><span id="xTitle"></span></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    function confirmDelete(event, form) {
        event.preventDefault();
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    }

    jQuery.noConflict();
    jQuery(document).ready(function($) {
        $('#coursesTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('courses.index') }}',
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false,
                    className: 'text-center'
                },
                {
                    data: 'course',
                    name: 'course'
                },
                {
                    data: 'mentor',
                    name: 'mentor'
                },
                {
                    data: 'title',
                    name: 'title'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ]
        });

        $('#coursesTable').on('click', '.btn-detail', function() {
            var courseId = $(this).data('id');
            $.ajax({
                url: '/courses/' + courseId,
                method: 'GET',
                success: function(data) {
                    $('#xCourse').text(data.course);
                    $('#xMentor').text(data.mentor);
                    $('#xTitle').text(data.title);
                    $('#courseDetailModal').modal('show');
                }
            });
        });
    });
</script>
