@extends('layouts.app')

@section('content')
<div class="container mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card-header pb-3 d-flex justify-content-between">
                <span>{{ __('Add new room') }}</span>
                <a href="/room-management" class="btn btn-info btn-sm">Cancel</a>
            </div>


            <form method="post" action="/room-management/{{ $room->id }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group row">
                    <label for="room_number" class="col-12 col-form-label">Room Number</label>
                    <div class="col-12">
                        <input value="{{ old('room_number') ?? $room->room_number }}" id="room_number"
                            name="room_number" placeholder="Room number"
                            class="form-control  @error('room_number') is-invalid @enderror" type="text">
                        @error('room_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="price" class="col-12 col-form-label">Price</label>
                    <div class="col-12">
                        <input value="{{ old('price') ?? $room->price }}" id="price" name="price" placeholder="Price"
                            class="form-control  @error('price') is-invalid @enderror" type="number">
                        @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="category_type" class="col-12 col-form-label">Category type</label>
                    <div class="col-12">
                        <input value="{{ old('category_type') ?? $room->category_type }}" id="category_type"
                            name="category_type" placeholder="Category type like presidential, resident..."
                            class="form-control  @error('category_type') is-invalid @enderror" type="text">
                        @error('category_type')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                {{-- room_detail_type --}}
                <div class="form-group row">
                    <label for="editor" class="col-12 col-form-label">Room detail description</label>
                    <div class="col-12">
                        <textarea name="room_detail_type" class="editor" rows="10"
                            value="{!! old('room_detail_type') ?? $room->room_detail_type !!}"></textarea>
                    </div>
                    @error('room_detail_type')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="input-group row p-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Image</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="inputGroupFile01">
                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    </div>
                    @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <div class="col-12">
                        <button name="submit" type="submit" class="btn btn-primary">Update Room</button>
                    </div>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection
