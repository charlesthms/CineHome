@extends('layouts.main')

@section('content')
    <section class="border-b border-gray-700">
        <div class="container mx-auto px-6 py-12 text-white">
            <video id="example">
                <source src="{{ route('stream', $id . '.mp4') }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>

            <script>
                let demo = new Moovie({
                    selector: "#example",
                    dimensions: {
                        width: "100%"
                    },
                    icons: {
                        path : '{{ asset('icons') }}/'
                    }
                });
            </script>
        </div>
    </section>
@endsection
