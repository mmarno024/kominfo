@extends('layouts.admin_template')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-primary text-white rounded-top">
                    EDIT USER COURSE
                </div>
                <div class="card-body">
                    <form id="editUserForm" action="{{ route('usercourse.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="form-group col-md-12">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username" value="{{ $user->username }}"
                                    placeholder="Nama">
                                @error('username')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="form-group col-md-12">
                                <label>Course</label>
                                <input type="text" class="form-control" name="course" value="{{ $user->course }}"
                                    placeholder="Course">
                                @error('course')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="form-group col-md-12">
                                <a href="{{ route('usercourse.index') }}" class="btn btn-danger"><i
                                        class="fa fa-arrow-left"></i>
                                    Kembali</a>
                                <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Perbarui
                                    User</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#editUserForm').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function(response) {
                    window.location.href = "{{ route('usercourse.index') }}";
                },
                error: function(xhr) {
                    let errors = xhr.responseJSON.errors;
                    $.each(errors, function(key, value) {
                        $(`input[name="${key}"], select[name="${key}"]`).next(
                            '.text-danger').remove();
                        $(`input[name="${key}"], select[name="${key}"]`).after(
                            `<span class="text-danger">${value[0]}</span>`);
                    });
                }
            });
        });
    });
</script>
