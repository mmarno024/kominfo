@extends('layouts.admin_template')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-primary text-white rounded-top">
                    USER COURSE
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-lg-12 col-sm-12">
                            <a href="{{ url('users/create') }}" class="btn btn-info"><i class="fa fa-plus"></i> Tambah User
                                Course</a>
                        </div>
                    </div>
                    <table id="usercourseTable" class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>User</th>
                                <th>Course</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="userDetailModal" tabindex="-1" role="dialog" aria-labelledby="userDetailModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="userDetailModalLabel">User Course Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <tr>
                            <td><strong>User</strong></td>
                            <td align="center">:</td>
                            <td><span id="xUser"></span></td>
                        </tr>
                        <tr>
                            <td><strong>Course</strong></td>
                            <td align="center">:</td>
                            <td><span id="xCourse"></span></td>
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
        $('#usercourseTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('users.index') }}',
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false,
                    className: 'text-center'
                },
                {
                    data: 'user',
                    name: 'user'
                },
                {
                    data: 'course',
                    name: 'course'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ]
        });

        $('#usercourseTable').on('click', '.btn-detail', function() {
            var userId = $(this).data('id');
            $.ajax({
                url: '/usercourses/' + userId,
                method: 'GET',
                success: function(data) {
                    $('#xUser').text(data.id_user);
                    $('#xCourse').text(data.id_course);
                    $('#userDetailModal').modal('show');
                }
            });
        });
    });
</script>
