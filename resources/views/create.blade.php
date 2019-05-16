@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Quote</div>

                    <div class="card-body">
                        <form action="/api/quotes" method="POST">
                            @csrf
                            <label for="">Author</label>
                            <input type="text" name="author">
                            <label for="quote">Quote</label>
                            <textarea name="quote" id="" cols="10" rows="4"></textarea>
                            <input type="text" name="user_id" value="{{ auth()->id() }}" hidden>
                            <button type="submit">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
