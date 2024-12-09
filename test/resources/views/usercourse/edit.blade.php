@extends('layouts.admin_template')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-primary text-white rounded-top">
                    EDIT USER COURSE
                </div>
                <div class="card-body">
                    <form id="editUserCourseForm" action="{{ route('usercourse.update', $usercourse->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="form-group col-md-12">
                                <label>Username</label>
                                <select class="form-control" name="username">
                                    @foreach ($users as $userOption)
                                        <option value="{{ $userOption->id }}"
                                            {{ $user->id == $userOption->id ? 'selected' : '' }}>
                                            {{ $userOption->username }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('username')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="form-group col-md-12">
                                <label>Course</label>
                                <select class="form-control" name="course_id">
                                    @foreach ($courses as $courseOption)
                                        <option value="{{ $courseOption->id }}"
                                            {{ $user->course_id == $courseOption->id ? 'selected' : '' }}>
                                            {{ $courseOption->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('course_id')
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
        $('#editUserCourseForm').on('submit', function(e) {
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
